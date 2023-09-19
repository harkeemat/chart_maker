<?php
/* Template Name: Templet Chart */



wp_head();

 
  
?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<style type="text/css">

</style>
<?php
/* add_action( 'admin_enqueue_scripts', 'load_front_style' );
function load_front_style() {
	
	wp_enqueue_style( 'custom_css', '/wp-content/plugins/chart_maker/css/front_end.css', true );
	
} */
?>
<?php echo do_shortcode("[wp_user]"); 

?>
<div class="bg_class">
    <div class="col-md-12 ">
        <div class="col-md-4">
            <div class="text_graph">
                <!-- dipositite -->
                <div class="col-md-12 border_bottom">
                    <div class="col-md-9">
                        Deposite
                    </div>
                    <div class="col-md-3 ">
                        <div class="diposite">
                            10000
                        </div>
                    </div>
                </div>
                <!-- Risk -->
                <div class="col-md-12 border_bottom">
                    <div class="col-md-9">
                        Risk
                    </div>
                    <div class="col-md-3 ">
                        <div contenteditable="true" class="risk">
                            1
                        </div>
                    </div>
                </div>
                <!-- Fixed %p/l -->
                <div class="col-md-12 border_bottom">
                    <div class="col-md-9 ">
                        Fixed %P/L Risk
                    </div>
                    <div class="col-md-3 ">
                        <div class="fixed_pl">

                        </div>
                    </div>
                </div>
                <!-- Compounding %p/l -->
                <div class="col-md-12 border_bottom">
                    <div class="col-md-9 ">
                        Compounding Risk %P/L
                    </div>
                    <div class="col-md-3 ">
                        <div class="compounding_risk">

                        </div>
                    </div>
                </div>
                <div class="col-md-12 border_bottom">
                    <div class="col-md-9 ">
                        Total $ %P/L
                    </div>
                    <div class="col-md-3 ">
                        <div class="total_pl">

                        </div>
                    </div>
                </div>
                <!-- Total $%p/lcfirst -->
                <div class="col-md-12 border_bottom">
                    <div class="col-md-9 ">
                        Total $ %P/L Compounding
                    </div>
                    <div class="col-md-3 ">
                        <div class="total_compounding">

                        </div>
                    </div>
                </div>
                <!--  Return over -->
                <div class="col-md-12 border_bottom">
                    <div class="col-md-9 ">
                        Return over Max DD
                    </div>
                    <div class="col-md-3 ">
                        <div class="return_max_dd">

                        </div>
                    </div>
                </div>
                <!-- Return over dd comp -->
                <div class="col-md-12 border_bottom">
                    <div class="col-md-9 ">
                        Return over Max DD Comp
                    </div>
                    <div class="col-md-3 ">
                        <div class="return_dd_comp">

                        </div>
                    </div>
                </div>
                <!-- Average Daily -->
                <div class="col-md-12 border_bottom">
                    <div class="col-md-9 ">
                        Average Daily %
                    </div>
                    <div class="col-md-3 ">
                        <div class="average_daily ">

                        </div>
                    </div>
                </div>
                <!-- Average Monthly -->
                <div class="col-md-12 border_bottom">
                    <div class="col-md-9 ">
                        Average Monthly %
                    </div>
                    <div class="col-md-3 ">
                        <div class="average_monthly">

                        </div>
                    </div>
                </div>
                <!-- Max balance -->
                <div class="col-md-12 border_bottom">
                    <div class="col-md-9 ">
                        Max Balance Drawdown
                    </div>
                    <div class="col-md-3 ">
                        <div class="max_balance_drowdown">

                        </div>
                    </div>
                </div>
                <!-- Max Equity -->
                <div class="col-md-12 ">
                    <div class="col-md-9 ">
                        Max Equity Drawdown
                    </div>
                    <div class="col-md-3 ">
                        <div class="max_equity_drowdown">

                        </div>
                    </div>
                </div>


            </div>

        </div>
        <div class="col-md-8">
            <div class="bs-example">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#sectionA">Percentage Growth</a></li>
                    <li><a data-toggle="tab" href="#sectionB">Balance Growth</a></li>
                    <li><a data-toggle="tab" href="#sectionc">Drowdown</a></li>
                    <!-- <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Dropdown <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a data-toggle="tab" href="#dropdown1">Dropdown1</a></li>
                <li><a data-toggle="tab" href="#dropdown2">Dropdown2</a></li>
            </ul>
        </li> -->
                </ul>
                <div class="tab-content">
                    <div id="sectionA" class="tab-pane fade in active">

                        <div id="chartContainer" style="height: 300px; width=100%;"></div>
                    </div>
                    <div id="sectionB" class="tab-pane fade">

                        <div id="chartContainer_1" style="height: 300px; width=100%;"></div>
                    </div>
                    <div id="sectionc" class="tab-pane fade">
            
						<div id="chartContainer_drow" style="height: 200px; width: 100%;"></div>
        </div>
        
                </div>
            </div>
        </div>
    </div>
</div>
<div class="table_box">
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="show_table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th></th>
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




                    </tr>
                </thead>

            </table>
        </div>
    </div>
</div>

<div class="rc_chart">
    <div class="col-md-12">
        <div id="chartContainer_rc" style="height: 300px; width: 100%;"></div>
    </div>
</div>

<div class="container">
    <div class="col-md-12 padding-bootom">
        <div class="col-md-6 padding-top">
            <span class="text-center block-display">Manual</span>
            <div class="manual-tab">
                <div class="col-md-12  border_bottom height">
                    <div class="col-md-9 ">
                        <span>Please enter the amount you wish to invest</span><br>
                        <span> (minimum $xxx)</span>
                    </div>
                    <div class="col-md-3" style="overflow:hidden;">
                        <input type="text" name="invest_amount" id="invest_amount" class="invest_amount" value="10000">
                    </div>
                </div>
                <div class="col-md-12  height">
                    <div class="col-md-9 ">
                        <span>Please enter risk coefficient you want to use</span>
                        <span>(maximum is 3)</span>
                    </div>
                    <div class="col-md-3" style="overflow:hidden;">
                        <input type="text" name="risk_manual" class="invest_amount" value="1">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 padding-top ">
            <span class="text-center block-display">Automatic</span>
            <div class="manual-tab">
                <div class="col-md-12  border_bottom height">
                    <div class="col-md-9 ">
                        <span>Please enter the amount you wish to invest</span><br>
                        <span> (minimum $xxx)</span>
                    </div>
                    <div class="col-md-3" style="overflow:hidden;">
                        <input type="text" name="invest_amount_copy" class="invest_amount" value="10000">
                    </div>
                </div>
                <div class="col-md-12   height">
                    <div class="col-md-9 ">
                        <span>Please enter risk coefficient you want to use</span>
                        <span> (maximum is 3)</span>

                    </div>
                    <div class="col-md-3" style="overflow:hidden;">
                        <input type="text" name="risk_automatic_copy" class="invest_amount" value="1">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php 


		
		?>
<script>
$(document).ready(function() {
    setTimeout(function() {
        chart_data();
    });



    $('input[name=invest_amount]').change(function(e) {
        chart_data();
    });
    $('input[name=risk_manual]').change(function(e) {
        chart_data();
    });


});


function chart_data() {

    var img = document.getElementById('sectionA');
    var cs = getComputedStyle(img);
    var width_can = parseInt(cs.getPropertyValue('width'), 10);
    var height_can = parseInt(cs.getPropertyValue('height'), 10);
    var invest = $('input[name=invest_amount]').val();
    var risk = $('input[name=risk_manual]').val();
    //console.log(risk);
    var Balance_Fixed_Graph = [];
    var Compounding_grapg_L = [];
    var commulative_graph = [];
    var commulative_compounding_graph = [];
    var p_l_colum = [];
    var drop_down_min=[];
    var i = 0;
    var j = 0;
    var k = 0;
    var l = 0;
    var m = 0;
    var z = 0;

    $.ajax({
        type: 'post',
        url: "<?php echo admin_url('admin-ajax.php'); ?>",
        data: "action=create_portfolio&risk=" + risk + "&invest=" + invest,
        async: false,
        dataType: 'json',
        success: function(results) {
            // uhm, maybe I don't even need this?
            //console.log(results['drow_month']);
            $('input[name=invest_amount_copy]').val(results['invest']);
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
            $(".average_monthly").html(results['average_monthly']);

            $.each(results['show_trader_data'], function(index, value) {
                ;
                $("#show_table").append('<tbody><tr><td>' + value.Year + '</td><td>' + value
                    .Jan + '</td><td>' + value.Feb + '</td><td>' + value.Mar + '</td><td>' +
                    value.Apr + '</td><td>' + value.May + '</td><td>' + value.Jun +
                    '</td><td>' + value.Jul + '</td><td>' + value.Aug + '</td><td>' + value
                    .Sep + '</td><td>' + value.Oct + '</td><td>' + value.Nov + '</td><td>' +
                    value.Dece + '</td><td>' + value.Total + '</td></tr></tbody');
            });


            $.each(results['Balance_Fixed_Graph'], function(index, value) {
                ;
                Balance_Fixed_Graph[j] = {
                    "label": results['month_name'][j],
                    "y": value

                };

                j++;
            });
            $.each(results['Compounding_grapg_L'], function(index, value) {
                ;
                Compounding_grapg_L[i] = {
                    "label": results['month_name'][i],
                    "y": value

                };

                i++;
            });
            $.each(results['commulative_graph'], function(index, value) {
                ;
                commulative_graph[k] = {
                    "label": results['month_name'][k],
                    "y": value
                };

                k++;
            });
            $.each(results['commulative_compounding_graph'], function(index, value) {
                ;
                commulative_compounding_graph[l] = {
                    "label": results['month_name'][l],
                    "y": value
                };

                l++;
            });
            $.each(results['p_l_colum'], function(index, value) {
                ;
                p_l_colum[m] = {
                    "label": results['month_name'][m],
                    "y": value
                };

                m++;
            });
            $.each(results['drop_down_min'], function(index, value) {
                ;
                drop_down_min[z] = {
                    "label": results['month_name'][z],
                    "y": value

                };

                z++;
            });



        },

        error: function(response) {
            console.log('error', response);
        }

    });





    //var chart_data_json= <?php echo json_encode($chart, JSON_NUMERIC_CHECK); ?>;



    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        exportEnabled: true,
        width: width_can,
        height: height_can,
        title: {
            text: "Percentage Growth"
        },
        axisY: {
            title: ""
        },
        toolTip: {
            shared: true
        },
        legend: {
            cursor: "pointer",
            itemclick: toggleDataSeries
        },


        data: [{
                type: "spline",
                showInLegend: true,
                name: "Balance Fixed %",
                dataPoints: Balance_Fixed_Graph
            },
            {
                type: "spline",
                name: "Compounding %",
                showInLegend: true,

                dataPoints: Compounding_grapg_L
            },


        ]
    });

    chart.render();

    function toggleDataSeries(e) {
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        } else {
            e.dataSeries.visible = true;
        }
        chart.render();
    }




    //var chart_data_json_h= <?php echo json_encode($chart_h, JSON_NUMERIC_CHECK); ?>;
    //var test_m=<?php echo json_encode($chart_m, JSON_NUMERIC_CHECK); ?>;
    //console.log(test_m);
    var chart = new CanvasJS.Chart("chartContainer_1", {
        animationEnabled: true,
        exportEnabled: true,
        width: width_can,
        height: height_can,
        title: {
            text: "Balance Growth"
        },
        axisY: {
            title: ""
        },
        toolTip: {
            shared: true
        },

        legend: {
            cursor: "pointer",
            itemclick: toggleDataSeries
        },
        data: [{

                type: "spline",
                name: "commulative",
                showInLegend: true,
                dataPoints: commulative_graph
            },
            {
                type: "spline",
                name: "Commulative Compounding",
                showInLegend: true,
                dataPoints: commulative_compounding_graph
            },


        ]
    });

    chart.render();

    function toggleDataSeries(e) {
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        } else {
            e.dataSeries.visible = true;
        }
        chart.render();
    }


    //var RC_data=<?php echo json_encode($rc_chart_collom, JSON_NUMERIC_CHECK); ?>;

    var chart = new CanvasJS.Chart("chartContainer_rc", {
        title: {
            text: "% P/L with RC"
        },
        axisY: {
            includeZero: false //try changing it to true
        },

        data: [{
            type: "column",
            dataPoints: p_l_colum
        }]
    });

    chart.render();

    function toggleDataSeries(e) {
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        } else {
            e.dataSeries.visible = true;
        }
        chart.render();
    }
    //console.log(drop_down_min);
    var chart = new CanvasJS.Chart("chartContainer_drow", {
        animationEnabled: true,
        width: width_can,
        height: height_can,
        title: {
            text: "Drowdown"
        },
        
        axisY: {
            title: "",
            titleFontColor: "#4F81BC",
            
        },
        data: [{
            indexLabelFontColor: "darkSlateGray",
            color: "rgba(54,158,173,.7)",
            name: "views",
            type: "area",
            yValueFormatString: "#,##0.0",
            dataPoints:drop_down_min
         }]
    });
    chart.render();

    function toggleDataSeries(e) {
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        } else {
            e.dataSeries.visible = true;
        }
        chart.render();
    }
    

}


</script>


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<?php
 wp_footer();
 ?>