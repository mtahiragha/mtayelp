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
                                                <th>Email</th>
                                                <th>Orders</th>
                                                <th>Spendings</th>
                                                <th>Ratings</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach($users as $user): ?>
                                                <tr>
                                                    <td>
                                                        <a class="text-info" href="<?php echo base_url('admin/dashboard/editUser/'.$user['id']); ?>" target="_blank">
                                                            <?php echo ucwords($user['first_name'])." ".ucwords($user['last_name']) ?>
                                                        </a>
                                                    </td>
                                                    <td><?php echo $user['email'] ?></td>
                                                    <td><?php echo number_format($user['orders_placed'], 0) ?></td>
                                                    <td><?php echo number_format($user['expenditure'], 2) ?></td>
                                                    <td><?php echo number_format($user['ratings'], 1) ?></td>
                                                    <td>
                                                        <?php echo date("Y-m-d", strtotime($user['created_at'])) ?>
                                                    </td>
                                                    <td>
                                                        <?php if($user['is_ban']): ?>
                                                        <div class="label label-danger">Banned</div>
                                                        <?php else: ?>
                                                        <div class="label label-success">Active</div>
                                                        <?php endif; ?>

                                                        <?php if($user['is_vendor']): ?>
                                                        <div class="label label-info">Vendor</div>
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

