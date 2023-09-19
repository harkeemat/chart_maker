<?php


function add_trader(){
  
    $id=$_GET['id'];
global $wpdb;
$table_name = $wpdb->prefix . 'Sub_Trader_Data';
$show_trader_data = $wpdb->get_results( "SELECT * FROM $table_name  Where trader_id=$id ORDER BY Year ASC");

?>

<div class="container chart_maker">
    <div class="col-md-12">
        <a href="<?php echo admin_url('admin.php?page=sub_add_trader&id='.$id); ?>" class="page-title-action"
            role="button"><span class=""></span> <br />Add Sub Trader</a>
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Year</th>
                        <th>Jan</th>
                        <th>Feb</th>
                        <th>Mar</th>
                        <th>Apr</th>
                        <th>May</th>
                        <th>Jun</th>
                        <th>Jul</th>
                        <th>Aug</th>
                        <th>Sep</th>
                        <th>Oct</th>
                        <th>Nov</th>
                        <th>Dec</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
     $i=1;
      foreach($show_trader_data as $result){?>

                    <?php  ?>
                    <?php ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $result->Year; ?></td>
                        <td><?php echo $result->Jan; ?></td>
                        <td><?php echo $result->Feb; ?></td>
                        <td><?php echo $result->Mar; ?></td>
                        <td><?php echo $result->Apr; ?></td>
                        <td><?php echo $result->May; ?></td>
                        <td><?php echo $result->Jun; ?></td>
                        <td><?php echo $result->Jul; ?></td>
                        <td><?php echo $result->Aug; ?></td>
                        <td><?php echo $result->Sep; ?></td>
                        <td><?php echo $result->Oct; ?></td>
                        <td><?php echo $result->Nov; ?></td>
                        <td><?php echo $result->Dece ; ?></td>
                        <td><?php echo $result->Total; ?></td>
                        <td>
                            <a title="Delete"
                                href="<?php echo  admin_url('admin.php?page=delete_trader&id='.$result->id.'&table='.$table_name) ?>">
                                <i class="fa fa-trash" aria-hidden="true">
                                </i></a>
                            <!-- <a href=" <?php /* echo  admin_url('admin.php?page=add%2Ftrader%2Fadd_trader.php&id='.$result->id) */ ?> ">
             <i class="fas fa-plus"></i></a> -->
                            <a title="edit"
                                href="<?php echo  admin_url('admin.php?page=edit_trader&id='.$result->id) ?>">
                                <i class="far fa-edit">
                                </i></a>
                        </td>
                    </tr>

                    <?php }; ?>

                </tbody>

            </table>
        </div>
    </div>
</div>
<style>

</style>
<script>
jQuery(document).ready(function() {

    jQuery('#example').DataTable();
});
</script>
<?php
}