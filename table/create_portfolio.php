<?php

add_action( 'wp_ajax_create_portfolio', 'create_portfolio' );
    add_action( 'wp_ajax_nopriv_create_portfolio', 'create_portfolio' );
function create_portfolio(){
    
    ob_start();
      //$words = explode(' ', $_SERVER['REQUEST_URI']);
   
   global $wpdb,$current_user,$wp;
   $name=$_GET['name'];
  //$name='abc';
   $value=$_POST['values'];
   $araay_invest_value=explode(",",$_POST['invest']);
   $parts=explode(",",$value);
   $sign=$_POST['sign'];
      
     
    
    //$main_id=$current_user->id;
    $table_port = $wpdb->prefix . 'user_portfolio';
    $table_name = $wpdb->prefix . 'Sub_Trader_Data';
    $port_table_data = $wpdb->get_results( "SELECT * FROM $table_port WHERE portfolio_name='$name' ");
     
     $x=count($port_table_data);
     $y=count($port_table_data);
     $printrisk=[];
    $table_name_2 = $wpdb->prefix . 'trader';
    
        $risk_define=1; 
        $months=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dece'];
        $pl=[];
       
      for($c=0; $c <= $x-1; $c++){
        $pl_C[$c]=null;
        
        if($value){
            
             $risk[$c]=$parts[$c];
             $printrisk[]=$risk[$c];
             
             $invest_amount[]=$araay_invest_value[$c];
         }else{
         $risk[$c]=$port_table_data[$c]->risk;
         $invest_amount[]=$port_table_data[$c]->invest;
         $printrisk[]=$risk[$c];
         }
 
        $month_name=[];
        $show_trader_name[$c] = $wpdb->get_results( "SELECT Tradername FROM $table_name_2 WHERE id=".$port_table_data[$c]->trader_id);
        $trader_name_front[$c]=$show_trader_name[$c][0]->Tradername;
        $show[$c] = $wpdb->get_results( "SELECT * FROM $table_name WHERE trader_id=".$port_table_data[$c]->trader_id);
        $show_trader_data[$c]=cvf_convert_object_to_array($show[$c]);
        foreach($show_trader_data[$c] as $result)
        {
            
           foreach($months as $month)
          {
            if($result[$month]!='')
                {
                    
                  $month_name= $month."-".$result['Year'];
                  $month_data[]= $month."-".$result['Year'];    
                  $pl_C[$c]=$risk_define*$result[$month];
                  $trader[$c][$month_name]=$pl_C[$c];
                  $trader_data[$c][$month_name]=$pl_C[$c]*$risk[$c];
                  
                  
                  
                }
            }

        }
      }
      /* echo "<pre>";
      print_r($trader_data[0]);
      die; */
       /* $b=0;
       foreach(array_unique($month_data) as $value)
{
    
    
     $test[]=$sum; 
}         
      echo"<pre>";
     print_r($test); 
     die; */
     
        
    
    /* $show_2 = $wpdb->get_results( "SELECT * FROM $table_name WHERE trader_id=$id_2");
    $show_3 = $wpdb->get_results( "SELECT * FROM $table_name WHERE trader_id=$id_3");
    $show_trader_data=cvf_convert_object_to_array($show);
    $show_trader_data_2=cvf_convert_object_to_array($show_2);
    $show_trader_data_3=cvf_convert_object_to_array($show_3);
 
        
        $pl_C_1=null;
        $pl_C_1=null;
        $pl_C_1=null;
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
                  $pl_C_1=$risk_define*$result[$month];
                  $trader_1[$month_name]=$pl_C_1;
                  
                }
            }

        } */
        /* foreach($show_trader_data_2 as $result)
        {
           foreach($months as $month)
          {
            if($result[$month]!='')
                {
                  $month_name= $month."-".$result['Year'];    
                  $pl_C_2=$risk_define*$result[$month];
                  $trader_2[$month_name]=$pl_C_2;
                  
                }
            }

        } */
       /*  foreach($show_trader_data_3 as $result)
        {
           foreach($months as $month)
          {
            if($result[$month]!='')
                {
                  $month_name= $month."-".$result['Year'];
                  
                  $pl_C_3=$risk_define*$result[$month];
                  $trader_3[$month_name]=$pl_C_3;

                   
                }
            }

        } */
        
?>

<div class="container chart_maker">
    <div class="col-md-12">

        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Id </th>
                    <th>Period</th>
                    
                    <th>Total</th>
                    <th>Drawdown</th>
                    <th>$ P/L</th>
                    <th>Balance Fixed Risk</th>
                    <th>Cummulative %</th>
                    <th>Monthly %</th>
                    <th>$ P/L</th>
                    <th>Compounding</th>
                    <th>Cummulative Compounding %</th>
                    <th>Monthly</th>
                </tr>
            </thead>
            <tbody>

                <?php 
                $pl_1=null;
                
                $pl_total_data=null;
        $i=1;
        
        
        
            $invest=0;
           for($m=0;$m<$x; $m++){
            $invest +=$invest_amount[$m];
                
                 }
               
         $risk_sum=0;
        for($k=0;$k<$x; $k++){
            $risk_sum +=$risk[$k];
                
                 }
                 
        $risk_data= round(($risk_sum)/$x,2);
        $ng_value=null;
        $pl_C=null;
        $p_l_first=null;
        $p_l_colum=[];
        $Balance_Fixed_Risk='';
        $Cummulative=null;
        $Compounding_L='';
        $P_l_K='';
        $Cummulative_M=null;
        $monthly_N=[];
        $month_value='';
        $monthly_I=[];
        $monthy_value_i='';
        $Balance_Fixed_Risk_last_G='';
        $drop_down_min=[];
        $commulative_graph=[];
        $commulative_compounding_graph=[];
        $Balance_Fixed_Graph=[];
        $Compounding_grapg_L=[];
        $month_name=[];
        $monthly_data=[];
        $table_value=[];
        
        //$months_da=array_merge($data['trader_1'],$data['trader_2'],$data['trader_3']);
       
        foreach(array_unique($month_data) as $value){ ?>
        
       
            
       <?php 
        
        
           

                 $month_name[]= $value;
                 $monthly_data[]=$trader_data[0][$value]
                  
             ?>

                <tr>

                    <td><?php echo $i++; ?></td>

                   
                    <td><?php echo $value; ?></td>
                    
                    <td><?php 
                     $sum=0;
                     for($d=0;$d<$x; $d++){
                $sum +=$trader_data[$d][$value];
                    
                     }
                    $pl_total_data=$sum;
                    echo round($pl_total_data,2);
                    $name = mb_substr($value, 0, 3);
                    $newstring = substr($value, -4);
                    $p_l_colum[]=round($pl_total_data,2);
                    $table_value[$newstring][$name]=round($pl_total_data,2);
                    
                    
                     ?></td>
                    
        
                    
                   
                    <!-- J -->
                    <td>
                        <?php 
                      
                 if($pl_total_data<0){
                    $drop_value=$pl_total_data;
                   $ng_value ? $drop_value=$drop_value+$ng_value: '';
                   $ng_value = $drop_value;
                   echo round($drop_value,2);
                   $drop_down_min[]=round($ng_value,2);
                   $drow_month[]=$value;
                   
                } else{
                    $drop_value=$pl_total_data;
                    
                    if($pl_total_data<abs($ng_value)){
                        $ng_value= $drop_value+$ng_value;
                        echo round($ng_value,2);
                        if($ng_value<0){
                        $drop_down_min[]=round($ng_value,2);
                        $drow_month[]=$value;
                        
                        }
                    }
                    else{
                        $ng_value=null;
                    }

                }  
                
                 ?>
                 
                    </td>
                    <!-- L -->
                    <td>
                        <?php $p_l_first=$invest*($pl_total_data/100);
                echo $p_l_first; ?>
                    </td>
                    
                    <!-- M -->
                    <td>
                        <?php
                $Balance_Fixed_Risk = $Balance_Fixed_Risk=='' ? $p_l_first+$invest : $Balance_Fixed_Risk+$p_l_first;
                echo $Balance_Fixed_Risk;
                $Balance_Fixed_Risk_last_G=$Balance_Fixed_Risk;
                $Balance_Fixed_Graph[]=round($Balance_Fixed_Risk,2);
        
                 ?>
                    </td>
                    
                    <!-- N -->
                    <td>
                       
                        <?php
                 $Cummulative=($Balance_Fixed_Risk-$invest)/$invest*100;
                echo $Cummulative;
                $commulative_graph[]=round($Cummulative,2);
                ?>
                    </td>
                    <!-- O -->
                    <td>
                        <?php
                
                $result = mb_substr($value, 0, 4);
                
                //echo $month=='Dece' ? $Cummulative : '';
                if($result=='Dece'){
                    
                    if($monthy_value_i==''){
                        $monthy_value_i=$Cummulative;
                        echo round($monthy_value_i,2);
                        
                    }
                    else{
                        $monthy_value_i=$Cummulative-$monthy_value_i;
                   echo round($monthy_value_i,2);

                    }
                    
                    $monthly_I[] =$monthy_value_i;
                    $monthy_value_i=round($Cummulative,2);
                    

                }
                 
                ?>
                    </td>
                    <!-- Q -->
                    
                    <td>
                        <?php
                   if($P_l_K==''){
                    $P_l_K=$invest*($pl_total_data/100);
                    echo $P_l_K;
                   }
                   else{
                    
                     echo round($Compounding_L*($pl_total_data/100),2);
                   }
  
                    ?>

                    </td>
                    <!-- R -->

                    <td>

                        <?php
                $Compounding_L = $Compounding_L=='' ? $P_l_K+$invest : $Compounding_L+$Compounding_L*($pl_total_data/100);
                echo round($Compounding_L,2);
                $Compounding_grapg_L[]=round($Compounding_L,2);
                 ?>
                    </td>
                    <!-- S -->
                    <td>
                       
                        <?php
                 $Cummulative_M=($Compounding_L-$invest)/$invest*100;
                 
                echo round($Cummulative_M,2);
                $commulative_compounding_graph[]=round($Cummulative_M,2);
                 ?>
                    </td>
                    <!-- T -->
                    <td>
                        <?php
                        $result_1 = mb_substr($value, 0, 4);
                if($result_1=='Dece'){
                    
                    if($month_value==''){
                        $month_value=$Cummulative_M;
                        echo round($month_value,2);
                        
                    }
                    else{
                        $month_value=$Cummulative_M-$month_value;
                   echo round($month_value,2);

                    }
                    $monthly_N[]=$month_value;
                    
                    $month_value=round($Cummulative_M,2);
                    

                }
                
                
                 ?>
                    </td>

                </tr>
                 
   

            <?php  };  ?> 

            </tbody>

        </table>
        <?php

?>
    </div>
</div>

<?php 
// Balance_Fixed_Risk Query 
$fixed_pl_risk_trader=round(($Balance_Fixed_Risk_last_G-$invest)/$invest*100,2);

//componding risk % P/L
$compoundin_risk_trader=round(($Compounding_L-$invest)/$invest*100,2);
//Total % P/L
$total_p_L=$sign.round($Balance_Fixed_Risk_last_G-$invest,2);
//Total componding risk % P/L
$total_compounding_risk=$sign.round($Compounding_L-$invest,2);
//max blance drawdown
$max_drow_down=min($drop_down_min);
//return over max dd
$rturn_over_dd=round($fixed_pl_risk_trader/$max_drow_down*-1,2);
//return over max dd Compounding
$rturn_over_dd_copounding=round($compoundin_risk_trader/$max_drow_down*-1,2);

//average monthly
$average_monthly = round(array_sum($monthly_data) / count($monthly_data),2);
//graph commulative graph
$commulative_graph;
//graph commulative graph
$commulative_compounding_graph;
//graph Balance fixed graph
$Balance_Fixed_Graph;
//graph compounding graph
$Compounding_grapg_L;
/* echo "<pre>";
print_r($Compounding_grapg_L);
die; */

 $data_json=['Compounding_grapg_L'=>$Compounding_grapg_L,
'Balance_Fixed_Graph'=>$Balance_Fixed_Graph,
'commulative_compounding_graph'=>$commulative_compounding_graph,
'commulative_graph'=>$commulative_graph,
'average_monthly'=>$average_monthly,
'rturn_over_dd_copounding'=>$rturn_over_dd_copounding,
'rturn_over_dd'=>$rturn_over_dd,

'max_drow_down'=>$max_drow_down,
'total_compounding_risk'=>$total_compounding_risk,
 'total_p_L'=>$total_p_L,
'compoundin_risk_trader'=>$compoundin_risk_trader,
'fixed_pl_risk_trader'=>$fixed_pl_risk_trader,
'month_name'=>$month_name,
'p_l_colum'=>$p_l_colum,

'show_trader_data'=>$show_data_table,
'risk_var'=>$risk_data,
'invest'=>$invest,
'table_value'=>$table_value,
'drop_down_min'=>$drop_down_min,
'drow_month'=>$drow_month,
'printrisk'=>$printrisk,
'trader_name_front'=>$trader_name_front,
'invest_amount'=>$invest_amount
];
 
  ob_end_clean();


 echo json_encode( $data_json );
  die;   
   

 ?>



<?php

}
 add_action( 'wp_ajax_delete_port', 'delete_port' );
    add_action( 'wp_ajax_nopriv_delete_port', 'delete_port' );
function delete_port(){
     
    ob_start();
   
   global $wpdb,$current_user,$wp;
   $name=$_GET['name'];
  
    $table_port = $wpdb->prefix . 'user_portfolio';
    $wpdb->delete( $table_port, array( 'portfolio_name' => $name ) );
    
    ob_end_clean();


 echo json_encode( "Delete Seccussefully");
  die;   
    
} 

?>