<?php $this->load->view('admin/header') ?>
        
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <!-- <div class="panel-heading">
                                <h4>Invoice</h4>
                            </div> -->
                            <div class="panel-body">
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <h3 class="logo">&nbsp;</h3>
                                    </div>
                                    <div class="pull-right">
                                        <h4>Invoice # 
                                            <strong><?php echo $order[0]['id'] ?></strong>
                                        </h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="pull-left m-t-10 p-20">
                                            <address>
                                                <strong>Vendor</strong><br>
                                                <?php echo ucwords($order[0]['vendor_name']) ?><br>
                                                <?php echo $order[0]['city']." ".$order[0]['state']." ".$order[0]['country'] ?><br>
                                                <?php echo $order[0]['phone'] ?>
                                                </address>
                                        </div>

                                        <div class="pull-left m-t-10 p-20">
                                            <address>
                                                <strong>Customer</strong><br>
                                                <?php echo ucwords("{$order[0]['first_name']} {$order[0]['last_name']}"); ?><br>
                                                <?php echo $order[0]['u_email'] ?><br>
                                                <?php echo $order[0]['u_phone'] ?>
                                                </address>
                                        </div>


                                        <div class="pull-right m-t-30">
                                            <p><strong>Order Date: </strong> <?php echo date('M d, Y', strtotime($order[0]['created_at'])) ?></p>
                                            <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink"><?php echo $order[0]['status'] ?></span></p>
                                        </div>
                                    </div><!-- end col -->
                                </div>
                                <!-- end row -->

                                <div class="m-h-50"></div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table m-t-30">
                                                <thead>
                                                    <tr><th>#</th>
                                                    <th>Product</th>
                                                    <th>Quantity</th>
                                                    <th>Unit Cost</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                                <tbody>
                                                    <?php $count=1; ?>
                                                    <?php foreach($order as $o): ?>
                                                        <tr>
                                                            <td><?php echo $count ?></td>
                                                            <td>
                                                                <?php 
                                                                    // echo( ($o['product']) );
                                                                    echo ucwords( json_decode($o['product'], true)['product'] );
                                                                ?>
                                                            </td>
                                                            <td><?php echo number_format($o['p_quantity'],0) ?></td>
                                                            <td><?php echo number_format($o['p_price'],2) ?></td>
                                                            <td>
                                                                <?php echo number_format( ($o['p_quantity'] * $o['p_price']), 2 ); ?>
                                                            </td>
                                                        </tr>
                                                    <?php $count++; ?>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="clearfix m-t-40">
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6 col-md-offset-3">
                                        <p class="text-right"><b>Sub-total:</b> <?php echo number_format($order[0]['total'], 2) ?></p>
                                        <!-- <p class="text-right">Discout: %</p>
                                        <p class="text-right">VAT: 12.9%</p> -->
                                        <hr>
                                        <h3 class="text-right"><?php echo number_format($order[0]['total'], 2) ?></h3>
                                    </div>
                                </div>
                                <hr>
                                <div class="hidden-print">
                                    <div class="pull-right">
                                        <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- end row -->
                       

            </div> <!-- container -->
        </div> <!-- content -->



<?php $this->load->view('admin/footer') ?>       
<script>
    $(document).ready(function(){
        setTimeout(() => {
            diffuseNotification('orders', "<?php echo $order[0]['id'] ?>");
        }, 10);
    });
</script>