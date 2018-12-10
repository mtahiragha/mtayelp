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
                                                <th>Order #</th>
                                                <th>Vendor</th>
                                                <th>Customer</th>
                                                <th>City</th>
                                                <th>Products</th>
                                                <th>Quantity</th>
                                                <th>Total Amount</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach($orders as $order): ?>
                                                <tr>
                                                    <td>
                                                        <a class="text-info" href="<?php echo base_url('admin/dashboard/editOrder/'.$order['id']); ?>" target="_blank">
                                                            <?php echo $order['id'];?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a class="text-info" href="<?php echo base_url('admin/dashboard/editVendor/'.$order['vendor_id']); ?>" target="_blank">
                                                            <?php echo ucwords($order['vendor_name']);?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a class="text-info" href="<?php echo base_url('admin/dashboard/editUser/'.$order['customer_id']); ?>" target="_blank">
                                                            <?php echo ucwords($order['first_name']." ".$order['last_name']);?>
                                                        </a>
                                                    </td>
                                                    <td><?php echo ucwords($order['city']) ?></td>
                                                    <td><?php echo number_format($order['products'], 0) ?></td>
                                                    <td><?php echo number_format($order['quantity'], 0) ?></td>
                                                    <td><?php echo number_format($order['total'], 2) ?></td>
                                                    <td>
                                                        <?php echo date("Y-m-d", strtotime($order['created_at'])) ?>
                                                    </td>
                                                    <td>
                                                        <div class="label label-danger"><?php echo $order['status']; ?></div>

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