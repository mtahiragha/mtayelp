<?php $this->load->view('admin/header') ?>
 
        <!-- Start content -->
        <div class="content">
            <div class="container">

                
                <div class="row">
                    <div class="col-sm-12">

                        <div class="card-box table-responsive">
                                   
                        			<h4 class="header-title m-t-0 m-b-30">Users</h4>

                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>City</th>
                                                <th>Orders</th>
                                                <th>Revenue</th>
                                                <th>Ratings</th>
                                                <th>Payment Methods</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach($vendors as $vendor): ?>
                                                <tr>
                                                    <td>
                                                        <a class="text-info" href="<?php echo base_url('admin/dashboard/editVendor/'.$vendor['id']); ?>" target="_blank">
                                                            <?php echo ucwords($vendor['vendor_name']);?>
                                                        </a>
                                                    </td>
                                                    <td><?php echo $vendor['phone'] ?></td>
                                                    <td><?php echo ucwords($vendor['city']) ?></td>
                                                    <td><?php echo number_format($vendor['orders_placed'], 0) ?></td>
                                                    <td><?php echo number_format($vendor['revenue'], 2) ?></td>
                                                    <td><?php echo number_format($vendor['ratings'], 1) ?></td>
                                                    <td>
                                                        <?php 
                                                            $methods = json_decode($vendor['payment_methods']);
                                                             echo implode(", ", $methods);
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php echo date("Y-m-d", strtotime($vendor['created_at'])) ?>
                                                    </td>
                                                    <td>
                                                        
                                                        <?php if($vendor['is_ban']): ?>
                                                        <div class="label label-danger">Banned</div>
                                                        <?php endif; ?>

                                                        <?php if(!$vendor['is_approved']): ?>
                                                        <div class="label label-warning">Pending</div>
                                                        <?php else: ?>
                                                        <div class="label label-success">Approved</div>
                                                        <?php endif; ?>


                                                        <?php if($vendor['is_featured']): ?>
                                                        <div class="label label-info">Featured</div>
                                                        <?php endif; ?>


                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                        
                    </div><!-- end col -->
                </div><!-- end row -->
                            
                       

            </div> <!-- container -->
        </div> <!-- content -->



<?php $this->load->view('admin/footer') ?>       

<script>
var handleDataTableButtons = function () {
    "use strict";
    0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable(
        {
            dom: "Bfrtip",
            buttons: [
                {extend: "copy", className: "btn-sm"}, {extend: "csv", className: "btn-sm"}, 
                {extend: "excel", className: "btn-sm"}, 
                {extend: "pdf", className: "btn-sm"}, 
                {extend: "print", className: "btn-sm"}
            ],
            responsive: !0,
            "iDisplayLength": 100,
            "aaSorting": []
        }
    )
}, TableManageButtons = function () {
    "use strict";
    return {
        init: function () {
            handleDataTableButtons()
        }
    }
}();
</script>

<script type="text/javascript">
    TableManageButtons.init();
</script>