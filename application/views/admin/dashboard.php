<?php $this->load->view('admin/header') ?>

                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <div class="row">

                            <div class="col-lg-3 col-md-6">
                        		<div class="card-box">
                                    
                        			<h4 class="header-title m-t-0 m-b-30">Customers</h4>

                                    <div class="widget-box-2">
                                        <div class="widget-detail-2">
                                            <span class="badge badge-danger pull-left m-t-20"><?php echo $allAndNew['all_users'] ?> </span>
                                            <h2 class="m-b-0"> <?php echo $allAndNew['new_users'] ?> </h2>
                                            <p class="text-muted m-b-25">New Customers</p>
                                        </div>
                                        <div class="progress progress-bar-danger-alt progress-sm m-b-0">
                                            <div class="progress-bar progress-bar-danger" role="progressbar"
                                                 aria-valuenow="<?php echo $allAndNew['new_users'] ?>" aria-valuemin="0" aria-valuemax="<?php echo $allAndNew['all_users'] ?>"
                                                 style="width: <?php echo ($allAndNew['new_users']*100/$allAndNew['all_users']) ?>%;">
                                                <span class="sr-only">77% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                        		</div>
                            </div><!-- end col -->


                            <div class="col-lg-3 col-md-6">
                        		<div class="card-box">
                                    
                        			<h4 class="header-title m-t-0 m-b-30">Vendors</h4>

                                    <div class="widget-box-2">
                                        <div class="widget-detail-2">
                                            <span class="badge badge-success pull-left m-t-20"><?php echo $allAndNew['all_vendors'] ?> </span>
                                            <h2 class="m-b-0"> <?php echo $allAndNew['new_vendors'] ?> </h2>
                                            <p class="text-muted m-b-25">New Vendors</p>
                                        </div>
                                        <div class="progress progress-bar-success-alt progress-sm m-b-0">
                                            <div class="progress-bar progress-bar-success" role="progressbar"
                                                 aria-valuenow="<?php echo $allAndNew['new_vendors'] ?>" aria-valuemin="0" aria-valuemax="<?php echo $allAndNew['all_vendors'] ?>"
                                                 style="width: <?php echo ($allAndNew['new_vendors']*100/$allAndNew['all_vendors']) ?>%;">
                                                <span class="sr-only">77% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                        		</div>
                            </div><!-- end col -->


                            <div class="col-lg-3 col-md-6">
                        		<div class="card-box">
                                    
                        			<h4 class="header-title m-t-0 m-b-30">Products</h4>

                                    <div class="widget-box-2">
                                        <div class="widget-detail-2">
                                            <span class="badge badge-warning pull-left m-t-20"><?php echo $allAndNew['all_products'] ?> </span>
                                            <h2 class="m-b-0"> <?php echo $allAndNew['new_products'] ?> </h2>
                                            <p class="text-muted m-b-25">New Products</p>
                                        </div>
                                        <div class="progress progress-bar-warning-alt progress-sm m-b-0">
                                            <div class="progress-bar progress-bar-warning" role="progressbar"
                                                 aria-valuenow="<?php echo $allAndNew['new_products'] ?>" aria-valuemin="0" aria-valuemax="<?php echo $allAndNew['all_products'] ?>"
                                                 style="width: <?php echo ($allAndNew['new_products']*100/$allAndNew['all_products']) ?>%;">
                                                <span class="sr-only">77% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                        		</div>
                            </div><!-- end col -->


                            <div class="col-lg-3 col-md-6">
                        		<div class="card-box">
                                    
                        			<h4 class="header-title m-t-0 m-b-30">Orders</h4>

                                    <div class="widget-box-2">
                                        <div class="widget-detail-2">
                                            <span class="badge badge-pink pull-left m-t-20"><?php echo $allAndNew['all_orders'] ?> </span>
                                            <h2 class="m-b-0"> <?php echo $allAndNew['new_orders'] ?> </h2>
                                            <p class="text-muted m-b-25">New Orders</p>
                                        </div>
                                        <div class="progress progress-bar-pink-alt progress-sm m-b-0">
                                            <div class="progress-bar progress-bar-pink" role="progressbar"
                                                 aria-valuenow="<?php echo $allAndNew['new_orders'] ?>" aria-valuemin="0" aria-valuemax="<?php echo $allAndNew['all_orders'] ?>"
                                                 style="width: <?php echo ($allAndNew['new_orders']*100/$allAndNew['all_orders']) ?>%;">
                                                <span class="sr-only">77% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                        		</div>
                            </div><!-- end col -->

                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-sm-12 text-center" style="margin: 40px 0 50px;">
                                <button class="btn btn-success waves-effect waves-light m-b-5" title="Total Revenue" style="font-size:32px;"> 
                                    <i class="fa fa-money m-l-5"></i> <b><?php echo number_format($revenue, 2) ?></b> 
                                </button>
                            </div>
                        </div>

                        <div class="row">
                          
                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0">Orders per Category</h4>
                                    <div id="morris-bar-example1" style="height: 280px;"></div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-lg-6">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0">Revenue per Category</h4>
                                    <div id="morris-bar-example2" style="height: 280px;"></div>
                                </div>
                            </div><!-- end col -->

                        </div>
                        <!-- end row -->

                        <div class="row">
                          
                          <div class="col-lg-6">
                              <div class="card-box">
                                  <h4 class="header-title m-t-0">Orders per City</h4>
                                  <div id="morris-bar-example3" style="height: 280px;"></div>
                              </div>
                          </div><!-- end col -->

                          <div class="col-lg-6">
                              <div class="card-box">
                                  <h4 class="header-title m-t-0">Revenue per City</h4>
                                  <div id="morris-bar-example4" style="height: 280px;"></div>
                              </div>
                          </div><!-- end col -->

                      </div>
                      <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->


<?php $this->load->view('admin/footer') ?>       
<script>

/**
* Theme: Adminto Admin Template
* Author: Coderthemes
* Dashboard
*/

!function($) {
    "use strict";

    var Dashboard1 = function() {
    	this.$realData = []
    };

    //creates Bar chart
    Dashboard1.prototype.createBarChart  = function(element, data, xkey, ykeys, labels, lineColors) {
        Morris.Bar({
            element: element,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            labels: labels,
            hideHover: 'auto',
            resize: true, //defaulted to true
            gridLineColor: '#2f3e47',
            barSizeRatio: 0.2,
            gridTextColor: '#98a6ad',
            barColors: lineColors,
            xLabelMargin: 0
            // xLabelAngle: 90,
        });
    },
    
    Dashboard1.prototype.init = function() {

        //creating bar chart
        var $barData = [
            { y: 'Desserts', a: 75 },
            { y: 'Cakes', a: 42 },
            { y: 'Molten Lava cake', a: 75 },
            { y: 'Pizza', a: 38 },
            { y: 'Main Course', a: 19 },
            { y: 'Fast Food', a: 93 }
        ];

        var $barData1 = <?php echo $barData1; ?>;
        var $barData2 = <?php echo $barData2; ?>;
        var $barData3 = <?php echo $barData3; ?>;
        var $barData4 = <?php echo $barData4; ?>;
        this.createBarChart('morris-bar-example1', $barData1, 'y', ['a'], ['Orders'], ['#1576c2']);
        this.createBarChart('morris-bar-example2', $barData2, 'y', ['a'], ['Revenue'], ['#1576c2']);
        this.createBarChart('morris-bar-example3', $barData3, 'y', ['a'], ['Orders'], ['#20a8d1']);
        this.createBarChart('morris-bar-example4', $barData4, 'y', ['a'], ['Revenue'], ['#20a8d1']);


    },
    //init
    $.Dashboard1 = new Dashboard1, $.Dashboard1.Constructor = Dashboard1
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.Dashboard1.init();
}(window.jQuery);
</script>