<?php
/*
Plugin Name: Chat_maker


*/

//include trader Imformation
include('trader.php');

include('trader/add_trader.php');


include('trader/delete_trader.php');

include('trader/duplicate_data.php');

include('trader/edit_trader.php');

include('sub_trader/add_trader.php');

include('sub_trader/edit_trader.php');

include('table/table_value.php');

include('table/portfolio.php');

include('table/create_portfolio.php');

include('optimal/optimal_portfolio.php');

include('mail_send.php');


		
		
		
		

function callback($buffer) {
    // modify buffer here, and then return the updated code
    return $buffer;
}

function buffer_start() {
    ob_start("callback");
}

function buffer_end() {
    ob_end_flush();
}

add_action('init', 'buffer_start');
add_action('wp_footer', 'buffer_end');



/* load_plugin_textdomain('chart_maker_lang', false, basename( dirname( __FILE__ ) ) . '/lang' ); */
add_action( 'admin_menu', 'my_admin_menu' );
function my_admin_menu() {
	 
	 add_menu_page('Chart maker', 'Chart maker', 'manage_options', 'trader-info','trader_info','dashicons-media-code', 6);
	 add_submenu_page('trader-info', 'Optimal','Optimal Portfolio', 'manage_options', 'optimal_port', 'optimal_port'); 
	 add_submenu_page('trader_info', 'port','port', 'manage_options', 'portfolio_data', 'portfolio_data');
	  add_submenu_page(null, 'Trader', 'trader', 'manage_options', 'chart_maker_trader', 'chart_maker_trader');
	 add_submenu_page(null, 'add', 'add', 'manage_options', 'add_trader', 'add_trader'); 
	 add_submenu_page(null, 'delete', 'delete', 'manage_options', 'delete_trader', 'delete_trader'); 
	 add_submenu_page(null, 'edit', 'edit', 'manage_options', 'edit_trader', 'edit_trader');
	 add_submenu_page(null, 'add', 'add', 'manage_options', 'sub_add_trader', 'sub_add_trader');
	 add_submenu_page(null, 'edit_sub_trader', 'edit', 'manage_options', 'edit_data_trader', 'edit_data_trader');  
	 add_submenu_page(null, 'Duplicate', 'Duplicate', 'manage_options', 'duplicate_data', 'duplicate_data');
	 add_submenu_page(null, 'Table','table', 'manage_options', 'table/table/table_value.php', 'table_value');
	 add_submenu_page(null, 'Table','table', 'manage_options', 'create_portfolio', 'create_portfolio');
	 add_submenu_page(null, 'Table','table', 'manage_options', 'mail_send', 'mail_send');
	 
	
}




//include bootstarp
add_action( 'admin_enqueue_scripts', 'load_admin_style' );
function load_admin_style() {
	wp_enqueue_style( 'admin_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', true );
	wp_enqueue_style( 'custom_css', '/wp-content/plugins/chart_maker/css/style.css', true );
	wp_enqueue_style( 'bootsrap', 'https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css', true );
	wp_enqueue_style( 'custom-fa', 'https://use.fontawesome.com/releases/v5.0.6/css/all.css' );
    
	
	wp_enqueue_script( 'bootstrap-js', 'https://code.jquery.com/jquery-3.3.1.js', array('jquery'),  true );
	wp_enqueue_script( 'datatables', 'https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js', array('jquery'),  true );
	wp_enqueue_script( 'bootstraptabel', 'https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js', array('jquery'),  true );
	wp_enqueue_script( 'custom-js', '/wp-content/plugins/chart_maker/js/custom.js', array('jquery'),  true );
	wp_localize_script( 'ajaxHandle', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}



//footer content
function change_admin_footer(){
	echo '<span id="footer-note">For plugin <a href="http://www.ditroinfotech.com/" target="_blank">Ditro Infotech</a>.</span>';
   }
add_filter('admin_footer_text', 'change_admin_footer');
/* short code */
function modifycontent ($atts, $content = null ) {
    $a = shortcode_atts( 
    array(
         'id' => '1',
        ), 
      $atts );
	  return '<input type="hidden" name="trader_id" value="'.$a['id'].'">';
    
}
add_shortcode( 'trader', 'modifycontent' );
function trader_info(){
	?>
	
<div class="col-md-3">
	<div class="wrap">
	<!-- <h1 class="wp-heading-inline">Trader</h1> -->
	                        		
									
	                        
	</div>
	</div>

<?php
global $wpdb;
$table_name = $wpdb->prefix . 'trader';
$show_trader_data = $wpdb->get_results( "SELECT * FROM $table_name");

?>

<div class="chart_maker">
<div class="col-md-12">
<a href="<?php echo admin_url('admin.php?page=chart_maker_trader'); ?>" class="page-title-action" role="button"><span class=""></span> <br/>Add Trader</a>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
			    <th>Id </th>
                <th>Tradername</th>
                <th>Fixed Risk % P/L</th>
                <th>Total $ P/L Compounding</th>
                <th>Max Drawdown %</th>
                <th>Minimum to invest</th>
				<th>Risk</th>
				<th>Maximum Balance Drawdown</th>
				<th>Maximum Equity Drawdown</th>
				<th>Short Code</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
		<?php
		$i=1;
		foreach($show_trader_data as $result){
			$blank = $wpdb->get_results( "SELECT 'id' FROM wp_Sub_Trader_Data WHERE trader_id=$result->id");
			?>
		
		<?php ?>
		<?php ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $result->Tradername; ?></td>
                <td><?php echo $result->Fixed ?></td>
                <td><?php echo $result->Compounding; ?></td>
                <td><?php echo $result->Max_Drawdown; ?></td>
				<td><?php echo $result->Invest; ?></td>
				<td><?php echo $result->risk; ?></td>
				<td><?php echo $result->Balance_Drawdown; ?></td>
				<td><?php echo $result->Equity_Drawdown; ?></td>
				<td><?php echo '[trader id='.$result->id.']'; ?></td>
				
                <td>
				<a title="Delete" href="<?php echo  admin_url('admin.php?page=delete_trader&id='.$result->id.'&table='.$table_name) ?>">
				<i class="fa fa-trash" aria-hidden="true">
				</i></a>
				<a title="Add" href="<?php echo  admin_url('admin.php?page=add_trader&id='.$result->id) ?>">
				<i class="fas fa-plus"></i></a>
				<?php if($blank){?>
				<a title="Calculate values" href="<?php echo  admin_url('admin.php?page=edit_trader&id='.$result->id) ?>">
				<i class="fas fa-calculator"></i></a>
				<?php }?>
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
} );
</script>
<?php

}
