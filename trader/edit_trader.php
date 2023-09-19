<?php
function edit_trader_data() {
/* 	global $wpdb;
	$table_name = $wpdb->prefix . 'trader';
	if (isset($_POST['submit'])){
        $id=$_POST['id'];
        $trader=$_POST['trader'];
        $fixed_risk=$_POST['fixed_risk'];
        $compounding=$_POST['compounding'];
        $max_drawdown=$_POST['max_drawdown'];
        $Invest=$_POST['Invest'];
        $risk=$_POST['risk'];
        $Balance_Drawdown=$_POST['Balance_Drawdown'];
        $Equity_Drawdown=$_POST['Equity_Drawdown'];
         

        
                $wpdb->update($table_name, array(
                    'Tradername' => $trader,
                    'Fixed' => $fixed_risk,
                    'Compounding' => $compounding,
                    'Max_Drawdown' => $max_drawdown,
                    'Invest' => $Invest, 
                    'risk' => $risk,
                    'Balance_Drawdown' => $Balance_Drawdown,
                    'Equity_Drawdown' => $Equity_Drawdown,
                ),
                array('id' => $id)
            );
            wp_redirect(admin_url('admin.php?page=trader-info'));
            exit;            
                
               
    }
    else
    {
        echo "somethin went wrong";
    } */
	
}
add_action( 'admin_post_nopriv_edit_trader_data', 'edit_trader_data' );
add_action( 'admin_post_edit_trader_data', 'edit_trader_data' );

function edit_trader(){
  global $wpdb;
    $id = $_GET['id'];
    $table_name = $wpdb->prefix . 'trader';
    $show_trader_data = $wpdb->get_results( "SELECT * FROM $table_name Where id=$id");
    $invest=$show_trader_data[0]->Invest;
    $risk=$show_trader_data[0]->risk;
    $data_record=front_value($id,$invest,$risk);
    $wpdb->update($table_name, array(
      
      'Fixed' => $data_record['fixed_pl_risk_trader'],
      'Compounding' => $data_record['compoundin_risk_trader'],
      'Max_Drawdown' => $data_record['rturn_over_dd'],
      
      
      'Balance_Drawdown' => $data_record['max_drow_down'],
      /* 'Equity_Drawdown' => $Equity_Drawdown, */
  ),
  array('id' => $id)
);
wp_redirect(admin_url('admin.php?page=trader-info'));
exit; 
  


    /* $('input[name=invest_amount_copy]').val(results['invest']);
            $('input[name=risk_amount_copy]').val(results['risk_var']);
            $(".diposite").html(results['invest']);
            $(".risk").html(results['risk_var']);
            $(".fixed_pl").html(results['fixed_pl_risk_trader']);
            $(".compounding_risk").html(results['compoundin_risk_trader']);
            $(".total_pl").html(results['total_p_L']);
            $(".total_compounding").html(results['total_compounding_risk']);
            $(".return_max_dd").html(results['rturn_over_dd']);
            $(".return_dd_comp").html(results['rturn_over_dd_copounding']);
            $(".max_balance_drowdown").html(results['max_drow_down']);
            $(".average_monthly").html(results['average_monthly']); */

    /* global $wpdb;

   $id = $_GET['id'];
    
    $table_name = $wpdb->prefix . 'trader';
    $show_trader_data = $wpdb->get_results( "SELECT * FROM $table_name Where id=$id");
 
    ?>
    <div class="container">
   <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
   <div class="panel panel-info">
           <div class="panel-heading">
               <div class="panel-title text-center">Edit Trader</div>
               
           </div>  
           <div class="panel-body" >
           <?php foreach($show_trader_data as $result){?>
          <form method="post" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $result->id; ?>">
          <input type="hidden" name="action" value="edit_trader_data">
          <div class="form-group">
            <label for="trader">Trader name</label>
            <input type="text" class="form-control" id="trader" name="trader" value="<?php echo $result->Tradername; ?>">
          
          </div>
          
          <div class="form-group">
            <label for="Fixed Risk % P/L ">Fixed Risk % P/L </label>
            <input type="text" class="form-control" id="fixed_risk" name="fixed_risk" value="<?php echo $result->Fixed ?>">
         
          </div>
          
          <div class="form-group">
            <label for="Total $ P/L Compounding">Total $ P/L Compounding</label>
            <input type="text" class="form-control" id="compounding" name="compounding" value="<?php echo $result->Compounding; ?>">
          </div>
          
          
          <div class="form-group">
            <label for="Max Drawdown %">Max Drawdown % </label>
            <input type="text" class="form-control" id="max_drawdown" name="max_drawdown" value="<?php echo $result->Max_Drawdown; ?>">
          
          </div>
         
          <div class="form-group">
             <label for="Minimum to invest">Minimum to invest</label>
             <input type="text" class="form-control" id="Invest " name="Invest" value="<?php echo $result->Invest; ?>">
           
           </div>
           <div class="form-group">
             <label for="Risk coefficient">Risk coefficient</label>
             <input type="text" class="form-control" id="risk" name="risk" value="<?php echo $result->risk; ?>">
           
           </div>
           <div class="form-group">
             <label for="Maximum Balance Drawdown ">Maximum Balance Drawdown  </label>
             <input type="text" class="form-control" id="Balance_Drawdown" name="Balance_Drawdown" value="<?php echo $result->Balance_Drawdown; ?>">
           
           </div>
           <div class="form-group">
             <label for="Maximum Equity Drawdown">Maximum Equity Drawdown </label>
             <input type="text" class="form-control" id="Equity_Drawdown" name="Equity_Drawdown" value="<?php echo $result->Equity_Drawdown; ?>">
           
           </div>
           
          
          <div class="form-group">
          <button type="submit" class="btn btn-default" name="submit">Publish</button>
          
          </div>
      
      
   </form>
   <?php }; ?>
   </div>
   </div>
   </div> 
 </div> */ 
 


}

function front_value($id,$invest,$risk){
  
  global $wpdb;
  
  $table_name = $wpdb->prefix . 'Sub_Trader_Data';
  $table_name_2 = $wpdb->prefix . 'trader';
  /* $show_trader_id = $wpdb->get_results( "SELECT id FROM $table_name_2 WHERE Tradername = '$trader' ");
  $show_id=$show_trader_id[0]->id; */
  
  $show = $wpdb->get_results( "SELECT * FROM $table_name WHERE trader_id=$id");
  $show_trader_data=cvf_convert_object_to_array($show);
  $show_data_table= $wpdb->get_results( "SELECT * FROM $table_name WHERE trader_id=$trader ORDER BY Year DESC");

?>

<div class="container chart_maker">
  <div class="col-md-12">

      <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                  <th>Id </th>
                  <th>Period</th>
                  <th>% P/L</th>
                  <th>% P/L with RC</th>
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
      $i=1;
      
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
      $months=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dece'];
      
      foreach($show_trader_data as $result){
          
         ?>

              <?php ?>
              <?php 

      ?>

              <?php  foreach($months as $month){?>

              <?php 
      if($result[$month]!=''){?>

              <?php $month_name[]= $month."-".$result['Year'];
                $only_month_name[]=$month;
           ?>

              <tr>
                  <td><?php echo $i++; ?></td>


                  <td>a<?php echo $month."-".$result['Year']; ?></td>

                  <td>b
                      <?php echo $result[$month]; ?>

                  </td>
                  <td>c
                      <?php 
              $pl_C=$risk*$result[$month];
              $p_l_colum[]=$pl_C;
             
              echo $pl_C; ?>

                  </td>
                  <td>d
                      <?php 
              if($result[$month]<0){
                  $drop_value=$risk*$result[$month];
                 $ng_value ? $drop_value=$drop_value+$ng_value: '';
                 $ng_value = $drop_value;
                 echo $drop_value;
                 $drop_down_min[]=round($ng_value,2);
                 $drow_month[]=$month."-".$result['Year'];
              }else{
                  $drop_value=$risk*$result[$month];
                  
                  if($result[$month]<abs($ng_value)){
                      $ng_value= $drop_value+$ng_value;
                      echo $ng_value;
                      if($ng_value<0){
                      $drop_down_min[]=round($ng_value,2);
                      $drow_month[]=$month."-".$result['Year'];
                      }
                  }
                  else{
                      $ng_value=null;
                  }

              }
              
               ?>

                  </td>
                  <td>f
                      <?php $p_l_first=$invest*($result[$month]/100);
              echo '$'.$p_l_first; ?>
                  </td>
                  <td>
                      <?php
              $Balance_Fixed_Risk = $Balance_Fixed_Risk=='' ? $p_l_first+$invest : $Balance_Fixed_Risk+$p_l_first;
              echo $Balance_Fixed_Risk;
              $Balance_Fixed_Risk_last_G=$Balance_Fixed_Risk;
              $Balance_Fixed_Graph[]=$Balance_Fixed_Risk;
      
               ?>
                  </td>
                  <td>
                      h
                      <?php
               $Cummulative=($Balance_Fixed_Risk-$invest)/$invest*100;
              echo $Cummulative;
              $commulative_graph[]=$Cummulative;
              ?>
                  </td>
                  <td>
                      <?php
              
              //echo $month=='Dece' ? $Cummulative : '';
              if($month=='Dece'){
                  
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
                  <td>
                      <?php
                 if($P_l_K==''){
                  $P_l_K=$invest*($result[$month]/100);
                  echo $P_l_K;
                 }
                 else{
                  
                   echo round($Compounding_L*($pl_C/100),2);
                 }

                  ?>

                  </td>

                  <td>

                      <?php
              $Compounding_L = $Compounding_L=='' ? $P_l_K+$invest : $Compounding_L+$Compounding_L*($pl_C/100);
              echo round($Compounding_L,2);
              $Compounding_grapg_L[]=$Compounding_L;
               ?>
                  </td>
                  <td>
                      m
                      <?php
               $Cummulative_M=($Compounding_L-$invest)/$invest*100;
               
              echo round($Cummulative_M,2);
              $commulative_compounding_graph[]=round($Cummulative_M,2);
               ?>
                  </td>
                  <td>
                      <?php
              if($month=='Dece'){
                  
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
              //echo $month=='Dece' ? round($Cummulative_M,2) : ''; 
              
               ?>
                  </td>

              </tr>
              <?php }
  };?>

              <?php }; ?>

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
$total_p_L=round($Balance_Fixed_Risk_last_G-$invest,2);
//Total componding risk % P/L
$total_compounding_risk=round($Compounding_L-$invest,2);
//max blance drawdown
$max_drow_down=min($drop_down_min);
//return over max dd
$rturn_over_dd=round($fixed_pl_risk_trader/$max_drow_down*-1,2);
//return over max dd Compounding
$rturn_over_dd_copounding=round($compoundin_risk_trader/$max_drow_down*-1,2);

//average monthly
$average_monthly = round(array_sum($p_l_colum) / count($p_l_colum),2);
//graph commulative graph



return [
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
'only_month_name'=>$only_month_name,
'show_trader_data'=>$show_data_table,
'risk_var'=>$risk,
'invest'=>$invest,
'drop_down_min'=>$drop_down_min,
'drow_month'=>$drow_month];

}


