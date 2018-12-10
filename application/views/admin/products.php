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
                                                <th>Vendor</th>
                                                <th>Categories</th>
                                                <th>Price</th>
                                                <th>Orders</th>
                                                <th>Revenue</th>
                                                <th>Ratings</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach($products as $product): ?>
                                                <tr>
                                                    <td>
                                                        <a class="text-info" href="<?php echo base_url('admin/dashboard/product/'.$product['id']); ?>" target="_blank">
                                                            <?php echo ucwords($product['product']); ?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a class="text-info" href="<?php echo base_url('admin/dashboard/editVendor/'.$product['vendor_id']); ?>" target="_blank">
                                                            <?php echo $product['vendor_name'] ?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                            $pcategories = json_decode($product['categories']);
                                                            printCategories($pcategories, $categories);
                                                        ?>
                                                    </td>
                                                    <td><?php echo number_format($product['price'], 2) ?></td>
                                                    <td>
                                                        <?php echo number_format($product['orders'], 0) ?>
                                                    </td>
                                                    <td><?php echo number_format($product['revenue'], 2) ?></td>
                                                    <td><?php echo number_format($product['ratings'], 1) ?></td>
                                                    <td>
                                                        <?php echo date("Y-m-d", strtotime($product['created_at'])) ?>
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