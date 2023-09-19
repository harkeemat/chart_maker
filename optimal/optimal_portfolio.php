<?php 

function optimal_port(){
    
       /*  ?>
        
    <div class="col-md-3">
        <div class="wrap">
                         
        </div>
        </div>
    
    <?php */
  /*   global $wpdb;
    $table_name = $wpdb->prefix . 'user_portfolio';
    $show_trader_data = $wpdb->get_results( "SELECT * FROM $table_name");
    
    ?>
    
    <div class="chart_maker">
    <div class="col-md-12">
    
    <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Id </th>
                    <th>Portfolio name</th>
                    <th>Invest </th>
                    <th>Risk</th>
                    <th>Trader Name</th>
                    <th>Fixed Risk</th>
                    <th>Total compounding</th>
                    <th>Max Drawdown</th>
                    
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
            foreach($show_trader_data as $result){
                $blank = $wpdb->get_results( "SELECT * FROM wp_trader WHERE id=$result->trader_id");

                ?>
            
            <?php ?>
            <?php ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $result->portfolio_name; ?></td>
                    <td><?php echo $result->invest ?></td>
                    <td><?php echo $result->risk; ?></td>
                    <td><?php
                    foreach($blank as $result1){
                     echo $result1->Tradername; }?></td>
                    <td><?php echo $result->fixed_risk; ?></td>
                    <td><?php echo $result->total_compounding; ?></td>
                    <td><?php echo $result->max_drawdown; ?></td>
                    <td><?php echo $result->Equity_Drawdown; ?></td>
           
                    <td>
                   
                    <a title="Duplicate" href="<?php echo  admin_url('admin.php?page=duplicate_data&id='.$result->id) ?>">
                    <i class="fa fa-clone" aria-hidden="true"></i></a>
    
                    </td>
                    
                </tr>
                
            <?php }; ?>
               
            </tbody>
            
        </table>
    </div>
    </div>
    
    <script>
    jQuery(document).ready(function() {
        
        jQuery('#example').DataTable();
    });
    </script> */
    global $wpdb;
      
    
      $invest=['5000','5000','5000'];
      for ($x = 0.5; $x <=3; $x = $x + 0.5) {
      $risk=[$x,$x,$x];
      $data_record=optimal_value($invest,$risk);
       if($data_record['rturn_over_dd']==-28.45){
        echo"<pre>";
        print_r($risk);
        die;
      }  
      
      
      }
      
      
      
    
   
}


  
  function optimal_value($inve,$risk){
     
   
    
    
 
 global $wpdb,$current_user,$wp;
 //$name=$_GET['name'];
$name='abc';
 //$value=$risk_1;
 $araay_invest_value=$inve;
 //$parts=explode(",",$value);
 $sign='$';
    
 
 
  //$main_id=$current_user->id;
  $table_port = $wpdb->prefix . 'user_portfolio';
  $table_name = $wpdb->prefix . 'Sub_Trader_Data';
  $port_table_data = $wpdb->get_results( "SELECT * FROM $table_port WHERE portfolio_name='$name' ");
   
   $x=count($port_table_data);
   if($x>3){
       $x=3;
   }
   
   $printrisk=[];
  $table_name_2 = $wpdb->prefix . 'trader';
  
      $risk_define=1; 
      $months=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dece'];
      $pl=[];
     
    for($c=0; $c < $x; $c++){
      $pl_C[$c]=null;
      
      /* if($value){ */
          
           
           $printrisk[]=$risk[$c];
           
           $invest_amount[]=$araay_invest_value[$c];
       /* }else{
       $risk[$c]=$port_table_data[$c]->risk;
       $invest_amount[]=$port_table_data[$c]->invest;
       $printrisk[]=$risk[$c];
       } */

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

              <?php  $i++; ?>

                 
                  <?php  $value; ?>
                  
                  <?php 
                   $sum=0;
                   for($d=0;$d<$x; $d++){
              $sum +=$trader_data[$d][$value];
                  
                   }
                  $pl_total_data=$sum;
                   round($pl_total_data,2);
                  $name = mb_substr($value, 0, 3);
                  $newstring = substr($value, -4);
                  $p_l_colum[]=round($pl_total_data,2);
                  $table_value[$newstring][$name]=round($pl_total_data,2);
                  
                  
                   ?>
                  
      
                  
                 
                 
                      <?php 
                    
               if($pl_total_data<0){
                  $drop_value=$pl_total_data;
                 $ng_value ? $drop_value=$drop_value+$ng_value: '';
                 $ng_value = $drop_value;
                  round($drop_value,2);
                 $drop_down_min[]=round($ng_value,2);
                 $drow_month[]=$value;
                 
              } else{
                  $drop_value=$pl_total_data;
                  
                  if($pl_total_data<abs($ng_value)){
                      $ng_value= $drop_value+$ng_value;
                       round($ng_value,2);
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
               
                 
 

          <?php  };  ?> 

         

      
      
  

<?php 

//max blance drawdown

//return over max dd




return [

//'average_monthly'=>$average_monthly,
//'rturn_over_dd_copounding'=>$rturn_over_dd_copounding,

'max_drow_down'=>$max_drow_down

//'total_compounding_risk'=>$total_compounding_risk,
//'total_p_L'=>$total_p_L,
//'compoundin_risk_trader'=>$compoundin_risk_trader,
//'fixed_pl_risk_trader'=>$fixed_pl_risk_trader,
//'month_name'=>$month_name,
//'p_l_colum'=>$p_l_colum,

//'show_trader_data'=>$show_data_table,
//'risk_var'=>$risk_data,
//'invest'=>$invest,
//'table_value'=>$table_value,
//'drop_down_min'=>$drop_down_min,
//'drow_month'=>$drow_month,
//'printrisk'=>$printrisk,
//'trader_name_front'=>$trader_name_front,
///'invest_amount'=>$invest_amount
];

  
}