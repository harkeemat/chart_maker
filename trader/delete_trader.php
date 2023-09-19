<?php


function delete_trader(){

  $id = $_GET['id'];
  
    $table_name = $_GET['table'];
    global $wpdb;
    
    if($table_name=="wp_Sub_Trader_Data") {
      $query_id= $wpdb->get_results("SELECT trader_id FROM $table_name  Where id=$id");
    }
    if($table_name=="wp_trader") {
      
      $wpdb->delete( 'wp_Sub_Trader_Data', array( 'trader_id' => $id ) );
    }

$wpdb->delete( $table_name, array( 'id' => $id ) );
  if($table_name=="wp_Sub_Trader_Data") {
    wp_redirect(admin_url('admin.php?page=add_trader&id='.$query_id[0]->trader_id));
    exit;
  } else{
 wp_redirect(admin_url('admin.php?page=trader-info'));
exit;     
  }  
    
}

    
    
    


   

    
        
    
    