<?php 
 
 
 function sub_trader_data() {
	global $wpdb;
    $table_name = $wpdb->prefix . 'Sub_Trader_Data';
   
    if (isset($_POST['submit'])){
        $year=$_POST['year'];
        $trader_id=$_POST['trader_id'];
        $jan=$_POST['jan'];
        $feb=$_POST['feb'];
        $mar=$_POST['mar'];
        $apr=$_POST['apr'];
        $may=$_POST['may'];
        $jun=$_POST['jun'];
        $jul=$_POST['jul'];
        $aug=$_POST['aug'];
        $sep=$_POST['sep'];
        $oct=$_POST['oct'];
        $nov=$_POST['nov'];
        $dece=$_POST['dec'];
        $total=$_POST['total'];

    $wpdb->insert($table_name, array(
      'Year' => $year,
      'Jan' => $jan,
      'Feb' => $feb,
      'Mar' => $mar,
      'Apr' => $apr, 
      'May' => $may,
      'Jun' => $jun,
      'Jul' => $jul,
      'Aug' => $aug,
      'Sep' => $sep,
      'Oct' => $oct,
      'Nov' => $nov,
      'Dece' => $dece,
      'Total' => round($total,2),
      'trader_id'=>$trader_id,
  ));
  wp_redirect(admin_url('admin.php?page=add_trader&id='.$trader_id));
exit; 
    }
    else{
      echo "something wrong";
    }
	
	}
		
add_action( 'admin_post_nopriv_sub_trader_data', 'sub_trader_data' );
add_action( 'admin_post_sub_trader_data', 'sub_trader_data' );

function sub_add_trader(){
    $id=$_GET['id'];
    ?>
<div class="container">
    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title text-center">Sub Treader Data</div>
                <!-- <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="/accounts/login/"></a></div> -->
            </div>
            <div class="panel-body">
                <form class="sub_trader" method="post" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>"
                    enctype="multipart/form-data">
                    <input type="hidden" name="action" value="sub_trader_data">
                    <input type="hidden" name="trader_id" value="<?php echo $id; ?>">
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="text" class="form-control " id="year" name="year">

                    </div>

                    <div class="form-group">
                        <label for="jan ">Jan</label>
                        <input type="text" class="form-control input" id="jan" name="jan">

                    </div>

                    <div class="form-group">
                        <label for="feb">Feb</label>
                        <input type="text" class="form-control input" id="feb" name="feb">

                    </div>
                    <div class="form-group">
                        <label for="mar">Mar</label>
                        <input type="text" class="form-control input" id="mar" name="mar">

                    </div>
                    <div class="form-group">
                        <label for="apr">Apr</label>
                        <input type="text" class="form-control input" id="apr" name="apr">

                    </div>
                    <div class="form-group">
                        <label for="may">May</label>
                        <input type="text" class="form-control input" id="may" name="may">

                    </div>
                    <div class="form-group">
                        <label for="jun">Jun</label>
                        <input type="text" class="form-control input" id="jun" name="jun">

                    </div>
                    <div class="form-group">
                        <label for="jul">Jul</label>
                        <input type="text" class="form-control input" id="jul" name="jul">

                    </div>
                    <div class="form-group">
                        <label for="aug">Aug</label>
                        <input type="text" class="form-control input" id="aug" name="aug">

                    </div>
                    <div class="form-group">
                        <label for="sep">Sep</label>
                        <input type="text" class="form-control input" id="sep" name="sep">

                    </div>
                    <div class="form-group">
                        <label for="oct">Oct</label>
                        <input type="text" class="form-control input" id="oct" name="oct">

                    </div>
                    <div class="form-group">
                        <label for="nov">Nov</label>
                        <input type="text" class="form-control input" id="nov" name="nov">

                    </div>
                    <div class="form-group">
                        <label for="dec">Dec</label>
                        <input type="text" class="form-control input" id="dec" name="dec">

                    </div>
                    <div class="form-group">
                        <label for="total">Total</label>
                        <input readonly class="form-control total" id="total" name="total">

                    </div>


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