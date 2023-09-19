<?php


function import_data() {
	global $wpdb;
    $table_name = $wpdb->prefix . 'trader';
   
    if (isset($_POST['submit'])){
        $trader=$_POST['trader'];
        /* $fixed_risk=$_POST['fixed_risk'];
        $compounding=$_POST['compounding'];
        $max_drawdown=$_POST['max_drawdown']; */
        $Invest=$_POST['invest'];
        $risk=$_POST['risk'];
        /* $Balance_Drawdown=$_POST['Balance_Drawdown'];
        $Equity_Drawdown=$_POST['Equity_Drawdown']; */
         


        
   
    $wpdb->insert($table_name, array(
      'Tradername' => $trader,
      /* 'Fixed' => $fixed_risk,
      'Compounding' => $compounding,
      'Max_Drawdown' => $max_drawdown, */
      'Invest' => $Invest, 
      'risk' => $risk,
      /* 'Balance_Drawdown' => $Balance_Drawdown,
      'Equity_Drawdown' => $Equity_Drawdown, */
     
  ));
  wp_redirect(admin_url('admin.php?page=trader-info'));
exit; 
    }
    else{
      echo "something wrong";
    }

	
	
		
			

		
	}
		

    
    //die;

add_action( 'admin_post_nopriv_import_data', 'import_data' );
add_action( 'admin_post_import_data', 'import_data' );



function chart_maker_trader(){
    
   

    ?>
     <div class="container">
    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title text-center">Trader</div>
                <!-- <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="/accounts/login/"></a></div> -->
            </div>  
            <div class="panel-body" >
           <form method="post" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" enctype="multipart/form-data">
           <input type="hidden" name="action" value="import_data">
           <div class="form-group">
             <label for="trader">Trader name</label>
             <input type="text" class="form-control" id="trader" name="trader">
           
           </div>
           
           <!-- <div class="form-group">
             <label for="Fixed Risk % P/L ">Fixed Risk % P/L </label>
             <input type="text" class="form-control" id="fixed_risk" name="fixed_risk">
          
           </div> -->
           
           <!-- <div class="form-group">
             <label for="Total $ P/L Compounding">Total $ P/L Compounding</label>
             <input type="text" class="form-control" id="compounding" name="compounding">
           </div> -->
           
           
          <!--  <div class="form-group">
             <label for="Max Drawdown %">Max Drawdown % </label>
             <input type="text" class="form-control" id="max_drawdown" name="max_drawdown">
           
           </div> -->
          
           <div class="form-group">
             <label for="Minimum to invest">Minimum to invest</label>
             <input type="text" class="form-control" id="Invest " name="invest">
           
           </div>
           <div class="form-group">
             <label for="Risk coefficient">Risk coefficient</label>
             <input type="text" class="form-control" id="risk" name="risk">
           
           </div>
           <!-- <div class="form-group">
             <label for="Maximum Balance Drawdown ">Maximum Balance Drawdown  </label>
             <input type="text" class="form-control" id="Balance_Drawdown" name="Balance_Drawdown">
           
           </div> -->
           <!-- <div class="form-group">
             <label for="Maximum Equity Drawdown">Maximum Equity Drawdown </label>
             <input type="text" class="form-control" id="Equity_Drawdown" name="Equity_Drawdown">
           
           </div> -->
           
           <div class="form-group">
           <button type="submit" class="btn btn-default" name="submit">Submit</button>
           
           </div>
       
       
    </form>
    </div>
    </div>
    </div> 
  </div> 
  

<?php 

}
