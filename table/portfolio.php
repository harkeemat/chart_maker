<?php


function portfolio_data(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'Sub_Trader_Data';
    $table_name_2 = $wpdb->prefix . 'trader';
    $risk_data = $wpdb->get_results( "SELECT risk,id FROM $table_name_2 ");
        $risk=$risk_data[0]->risk;
        $risk_2=$risk_data[1]->risk;
        $risk_3=$risk_data[2]->risk;
        $id_1=$risk_data[0]->id;
        $id_2=$risk_data[1]->id;
        $id_3=$risk_data[2]->id;

    
    $show = $wpdb->get_results( "SELECT * FROM $table_name WHERE trader_id=$id_1");
    $show_2 = $wpdb->get_results( "SELECT * FROM $table_name WHERE trader_id=$id_2");
    $show_3 = $wpdb->get_results( "SELECT * FROM $table_name WHERE trader_id=$id_3");
    $show_trader_data=cvf_convert_object_to_array($show);
    $show_trader_data_2=cvf_convert_object_to_array($show_2);
    $show_trader_data_3=cvf_convert_object_to_array($show_3);
 
        
        $pl_C=null;
        $p_l_first=null;
        $trader_1=[];
        $trader_2=[];
        $trader_3=[];
        $month_name=[];
        
        $months=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dece'];
        
        foreach($show_trader_data as $result)
        {
           foreach($months as $month)
          {
            if($result[$month]!='')
                {
                  $month_name= $month."-".$result['Year'];
                  $month_data[]= $month."-".$result['Year'];    
                  $pl_C=$risk*$result[$month];
                  $trader_1[$month_name]=$pl_C;
                  
                }
            }

        }
        foreach($show_trader_data_2 as $result)
        {
           foreach($months as $month)
          {
            if($result[$month]!='')
                {
                  $month_name= $month."-".$result['Year'];    
                  $pl_C_2=$risk_2*$result[$month];
                  $trader_2[$month_name]=$pl_C_2;
                  
                }
            }

        }
        foreach($show_trader_data_3 as $result)
        {
           foreach($months as $month)
          {
            if($result[$month]!='')
                {
                  $month_name= $month."-".$result['Year'];
                  
                  $pl_C_3=$risk*$result[$month];
                  $trader_3[$month_name]=$pl_C_3;
                   
                }
            }

        }
                 

     return [
        'trader_1'=>$trader_1,
        'trader_2'=>$trader_2,
        'trader_3'=>$trader_3,
        'risk'=>$risk,
        'risk_2'=>$risk_2,
        'risk_3'=>$risk_3,
        'month_data'=>$month_data,


     ];      
       
   



}