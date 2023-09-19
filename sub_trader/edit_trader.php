<?php

function sub_trader_data_edit() {
	global $wpdb;
    $table_name = $wpdb->prefix . 'Sub_Trader_Data';
   
    if (isset($_POST['submit'])){
        $year=$_POST['year'];
        $trader_id=$_POST['trader_id'];
        $id=$_POST['id'];
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
 
      $wpdb->update($table_name, array(
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
    ),
    array('id' => $id)
            );
  wp_redirect(admin_url('admin.php?page=add_trader&id='.$trader_id));
exit; 
    }
    else{
      echo "something wrong";
    }
	
	}

add_action( 'admin_post_nopriv_trader_id', 'sub_trader_data_edit' );
add_action( 'admin_post_sub_trader_data_edit', 'sub_trader_data_edit' );
function edit_data_trader(){
    global $wpdb;

    $id = $_GET['id'];
     
     $table_name = $wpdb->prefix . 'Sub_Trader_Data';
     $show_data = $wpdb->get_results( "SELECT * FROM $table_name Where id=$id");
    ?>
<div class="container">
    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title text-center">Sub Trader Edit Data</div>

            </div>
            <div class="panel-body">
                <?php foreach($show_data as $result){?>
                <form class="sub_trader" method="post" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>"
                    enctype="multipart/form-data">
                    <input type="hidden" name="action" value="sub_trader_data_edit">
                    <input type="hidden" name="id" value="<?php echo $result->id; ?>">
                    <input type="hidden" name="trader_id" value="<?php echo $result->trader_id; ?>">
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="text" class="form-control " id="year" name="year"
                            value="<?php echo $result->Year; ?>">

                    </div>

                    <div class="form-group">
                        <label for="jan ">Jan</label>
                        <input type="text" class="form-control input" id="jan" name="jan"
                            value="<?php echo $result->Jan; ?>">

                    </div>

                    <div class="form-group">
                        <label for="feb">Feb</label>
                        <input type="text" class="form-control input" id="feb" name="feb"
                            value="<?php echo $result->Feb; ?>">

                    </div>
                    <div class="form-group">
                        <label for="mar">Mar</label>
                        <input type="text" class="form-control input" id="mar" name="mar"
                            value="<?php echo $result->Mar; ?>">

                    </div>
                    <div class="form-group">
                        <label for="apr">Apr</label>
                        <input type="text" class="form-control input" id="apr" name="apr"
                            value="<?php echo $result->Apr; ?>">

                    </div>
                    <div class="form-group">
                        <label for="may">May</label>
                        <input type="text" class="form-control input" id="may" name="may"
                            value="<?php echo $result->May; ?>">

                    </div>
                    <div class="form-group">
                        <label for="jun">Jun</label>
                        <input type="text" class="form-control input" id="jun" name="jun"
                            value="<?php echo $result->Jun; ?>">

                    </div>
                    <div class="form-group">
                        <label for="jul">Jul</label>
                        <input type="text" class="form-control input" id="jul" name="jul"
                            value="<?php echo $result->Jul; ?>">

                    </div>
                    <div class="form-group">
                        <label for="aug">Aug</label>
                        <input type="text" class="form-control input" id="aug" name="aug"
                            value="<?php echo $result->Aug; ?>">

                    </div>
                    <div class="form-group">
                        <label for="sep">Sep</label>
                        <input type="text" class="form-control input" id="sep" name="sep"
                            value="<?php echo $result->Sep; ?>">

                    </div>
                    <div class="form-group">
                        <label for="oct">Oct</label>
                        <input type="text" class="form-control input" id="oct" name="oct"
                            value="<?php echo $result->Oct; ?>">

                    </div>
                    <div class="form-group">
                        <label for="nov">Nov</label>
                        <input type="text" class="form-control input" id="nov" name="nov"
                            value="<?php echo $result->Nov; ?>">

                    </div>
                    <div class="form-group">
                        <label for="dec">Dec</label>
                        <input type="text" class="form-control input" id="dec" name="dec"
                            value="<?php echo $result->Dece ; ?>">

                    </div>
                    <div class="form-group">
                        <label for="total">Total</label>
                        <input readonly class="form-control total" id="total" name="total"
                            value="<?php echo $result->Total; ?>">

                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-default" name="submit">Submit</button>

                    </div>


                </form>
                <?php }; ?>
            </div>
        </div>
    </div>
</div>


<?php 
}