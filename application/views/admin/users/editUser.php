<?php $this->load->view('admin/header') ?>
        
        <!-- Start content -->
        <div class="content">
            <div class="container">

                
                <div class="row">
                    <div class="col-sm-12">

                        <div class="row">
                            <div class="col-sm-12"> 
                                <div class="bg-picture card-box">
                                    <div class="profile-info-name">

                                        <?php if(!$user['dp']): ?>
                                            <img src="<?php echo base_url().'assets/images/default-'.$user['gender'].'.jpg'; ?>" class="img-thumbnail" alt="profile-image">
                                        <?php else: ?>
                                            <img src="<?php admin_assets(); ?>images/profile.jpg" class="img-thumbnail" alt="profile-image">
                                        <?php endif; ?>

                                        <div class="profile-info-detail">
                                            <h3 class="m-t-0 m-b-0">
                                                <?php echo ucwords($user['first_name']." ".$user['last_name']); ?>
                                            </h3>
                                            <p class="text-muted m-b-20"><i><?php echo $user['email'] ?></i></p>

                                            <p>Username: <b><?php echo ($user['username']) ?></b></p>
                                            <p>Gender: <b><?php echo ucwords($user['gender']) ?></b></p>
                                            <p>Phone: <b><?php echo ($user['phone']) ?></b></p>
                                            <p>
                                                <?php if($user['is_ban']): ?>
                                                    <button type="button" class="btn btn-success waves-effect waves-light btn-md" onclick="areyousure('Are you sure you want to ACTIVATE this user?', this)" data-url="<?php echo base_url('admin/dashboard/activateUser/').$user['id'] ?>">Activate User</button>
                                                <?php else: ?>
                                                    <button type="button" class="btn btn-danger waves-effect waves-light btn-md" onclick="areyousure('Are you sure you want to BAN this user?', this)" data-url="<?php echo base_url('admin/dashboard/banUser/').$user['id'] ?>">Ban User</button>
                                                <?php endif; ?>

                                                <?php if($user['is_vendor']): ?>
                                                <button type="button" class="btn btn-info waves-effect waves-light btn-md" onclick="window.location='<?php echo base_url('admin/dashboard/editVendor/').$user['vendor_id'] ?>'">View Vendor Profile</button>
                                                <?php endif; ?>
                                            </p>
                                            
                                            
                                        </div>

                                        <div class="clearfix"></div>
                                    </div>


                                    <div class="form-horizontal" style="margin-top:40px;">

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="example-email">Udid</label>
                                        <div class="col-md-10">
                                            <input type="email" disabled name="example-email" disabled class="form-control" value="<?php echo $user['udid'] ?>" placeholder="Unique Device Identifier">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="example-email">FB ID</label>
                                        <div class="col-md-10">
                                            <input type="email" disabled name="example-email" class="form-control" value="<?php echo $user['fb_id'] ?>" placeholder="Facebook ID">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="example-email">Orders</label>
                                        <div class="col-md-10">
                                            <input type="email" disabled name="example-email" class="form-control" value="<?php echo $user['orders_placed'] ?>" placeholder="Orders Placed">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="example-email">Spendings</label>
                                        <div class="col-md-10">
                                            <input type="email" disabled name="example-email" class="form-control" value="<?php echo $user['expenditure'] ?>" placeholder="Spendings">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="example-email">Reviews</label>
                                        <div class="col-md-10">
                                            <input type="email" disabled name="example-email" class="form-control" value="<?php echo $user['reviews'] ?>" placeholder="Reviews Written">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="example-email">Rating</label>
                                        <div class="col-md-10">
                                            <input type="email" disabled name="example-email" class="form-control" value="<?php echo $user['ratings'] ?>" placeholder="User Rating">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="example-email">Created</label>
                                        <div class="col-md-10">
                                            <input type="email" disabled name="example-email" class="form-control" value="<?php echo $user['created_at'] ?>" placeholder="Created At">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="example-email">Updated</label>
                                        <div class="col-md-10">
                                            <input type="email" disabled name="example-email" class="form-control" value="<?php echo $user['updated_at'] ?>" placeholder="Updated At">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="example-email">Last Accessed At</label>
                                        <div class="col-md-10">
                                            <input type="email" disabled name="example-email" class="form-control" value="<?php echo $user['last_accessed_at'] ?>" placeholder="Last Accessed At">
                                        </div>
                                    </div>


                                    
                                    </div> <!-- end form-horizontal -->
                                </div>
                                <!--/ meta -->

                            </div>

                            <div class="col-md-12">
                            <div class="card-box table-responsive">
                                   
                                   <h4 class="header-title m-t-0 m-b-30">Orders</h4>

                                   <?php if(empty($orders)): ?>
                                   <p>You dont have any orders at the moment.</p>
                                    <?php else: ?>

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
                                                       <div class="label label-danger"><?php echo $order['status']; ?></div>

                                                   </td>
                                               </tr>
                                           <?php endforeach; ?>
                                       </tbody>
                                   </table>
                                <?php endif; ?>
                               </div>
                      
                        
                        
                    </div><!-- end col -->
                </div><!-- end row -->
                            
                       

            </div> <!-- container -->
        </div> <!-- content -->



<?php $this->load->view('admin/footer') ?>       
<script>
    $(document).ready(function(){

        
    });
</script>
<script>
    $(document).ready(function(){
        setTimeout(() => {
            diffuseNotification('users', "<?php echo $user['id'] ?>");
        }, 10);
    });
</script>