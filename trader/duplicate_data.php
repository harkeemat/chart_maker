<?php 


function duplicate_data(){
    $id=$_GET['id'];
    global $wpdb;
    
    $table_name = $wpdb->prefix . 'trader';
    $data = $wpdb->get_results( "SELECT * FROM $table_name Where id=$id");
    $table_name_sub = $wpdb->prefix . 'Sub_Trader_Data';
    $sub_data = $wpdb->get_results( "SELECT * FROM $table_name_sub Where trader_id=$id");
    foreach($data as $result){
    $trader= $result->Tradername;
        $fixed_risk=$result->Fixed;
        $compounding=  $result->Compounding;
        $max_drawdown=  $result->Max_Drawdown;
        $Invest= $result->Invest;
        $risk=$result->risk;
        $Balance_Drawdown= $result->Balance_Drawdown;
        $Equity_Drawdown=$result->Equity_Drawdown;
         
    }
    $wpdb->insert($table_name, array(
      'Tradername' => $trader,
      'Fixed' => $fixed_risk,
      'Compounding' => $compounding,
      'Max_Drawdown' => $max_drawdown,
      'Invest' => $Invest, 
      'risk' => $risk,
      'Balance_Drawdown' => $Balance_Drawdown,
      'Equity_Drawdown' => $Equity_Drawdown,
  ));
    $lastid = $wpdb->insert_id;
    foreach($sub_data as $value){
      $wpdb->insert($table_name_sub, array(
        'trader_id' => $lastid,
        'Year' => $value->Year,
        'Jan' => $value->Jan,
        'Feb' => $value->Feb,
        'Mar' => $value->Mar,
        'Apr' => $value->Apr,
        'May' => $value->May,
        'Jun' => $value->Jun,
        'Jul' => $value->Jul,
        'Aug' => $value->Aug,
        'Sep' => $value->Sep,
        'Oct' => $value->Oct,
        'Nov' => $value->Nov,
        'Dece' => $value->Dece,
        'Total' => $value->Total,
       
    ));
    }

    
  wp_redirect(admin_url('admin.php?page=trader-info'));
exit; 
}