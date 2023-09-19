<?php


function cvf_convert_object_to_array($data) {

    if (is_object($data)) {
        $data = get_object_vars($data);
    }

    if (is_array($data)) {
        return array_map(__FUNCTION__, $data);
    }
    else {
        return $data;
    }
}

    add_action( 'wp_ajax_table_value', 'table_value' );
    add_action( 'wp_ajax_nopriv_table_value', 'table_value' );
function table_value(){
    ob_start();
    global $wpdb;
    $trader=$_POST['trader'];
    $table_name = $wpdb->prefix . 'Sub_Trader_Data';
    $table_name_2 = $wpdb->prefix . 'trader';
    $sign=$_POST['sign'];
    /* $show_trader_id = $wpdb->get_results( "SELECT id FROM $table_name_2 WHERE Tradername = '$trader' ");
    $show_id=$show_trader_id[0]->id; */
    
    $show = $wpdb->get_results( "SELECT * FROM $table_name WHERE trader_id=$trader");
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
        $invest=$_POST['invest'];
        $risk=$_POST['risk'];
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
                $Balance_Fixed_Graph[]=round($Balance_Fixed_Risk,2);
        
                 ?>
                    </td>
                    <td>
                        h
                        <?php
                 $Cummulative=($Balance_Fixed_Risk-$invest)/$invest*100;
                echo $Cummulative;
                $commulative_graph[]=round($Cummulative,2);
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
                $Compounding_grapg_L[]=round($Compounding_L,2);
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
$average_monthly = round(array_sum($p_l_colum) / count($p_l_colum),2);
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
'only_month_name'=>$only_month_name,
'show_trader_data'=>$show_data_table,
'risk_var'=>$risk,
'invest'=>$invest,
'drop_down_min'=>$drop_down_min,
'drow_month'=>$drow_month];
 
 ob_end_clean();


 echo json_encode( $data_json );
  die;  


 ?>



<?php
}
add_action( 'wp_ajax_add_portfolio', 'add_portfolio' );
add_action( 'wp_ajax_nopriv_add_portfolio', 'add_portfolio' );
  function add_portfolio(){
    ob_start();
    global $wpdb;
    $portfolio_name=$_POST['portfolio_name'];
    if($portfolio_name){
    $table_name = $wpdb->prefix . 'user_portfolio';
    $invest=$_POST['invest'];
    $risk=$_POST['risk'];
    $portfolio_name=$_POST['portfolio_name'];
    $trader=$_POST['trader'];
    $user_id=$_POST['user_id'];
    $total_comounding=$_POST['total_comounding'];
    $pl_pixed=$_POST['pl_pixed'];
    $max_drowdown=$_POST['max_drowdown'];
    
    $wpdb->insert($table_name, array(
        'invest' => $invest,
        'risk' => $risk,
        'portfolio_name' => $portfolio_name,
        'trader_id' => $trader,
        'user_id' => $user_id, 
        'total_compounding' => $total_comounding,
        'fixed_risk' => $pl_pixed,
        'max_drawdown' => $max_drowdown,
        
        
    ));
    
    ob_end_clean();

    echo json_encode( "seccefuly add portfolio" );
    die; 
}
else{
    echo json_encode( "Please fill Portfolio name" );
    die; 
}
  
  }