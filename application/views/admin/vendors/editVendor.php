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

                                        <?php if(!isset($vendor['dp']) || !$vendor['dp']): ?>
                                            <img src="<?php echo base_url().'assets/images/default-vendor.jpg'; ?>" class="img-thumbnail" alt="profile-image">
                                        <?php else: ?>
                                            <img src="<?php admin_assets(); ?>images/profile.jpg" class="img-thumbnail" alt="profile-image">
                                        <?php endif; ?>

                                        <div class="profile-info-detail">
                                            <h3 class="m-t-0 m-b-0">
                                                <?php echo ucwords($vendor['vendor_name']); ?>
                                            </h3>
                                            <p class="text-muted m-b-20"><i><?php echo $vendor['phone'] ?></i></p>

                                            <p>City: <b><?php echo ($vendor['city']) ?></b></p>
                                            <p>State: <b><?php echo ucwords($vendor['state']) ?></b></p>
                                            <p>Country: <b><?php echo ($vendor['country']) ?></b></p>
                                            <p>
                                                <?php if(!$vendor['is_approved']): ?>
                                                    <button type="button" class="btn btn-warning waves-effect waves-light btn-md" onclick="areyousure('Are you sure you want to APPROVE this vendor?', this)" data-url="<?php echo base_url('admin/dashboard/approveVendor/').$vendor['id'] ?>">Approve vendor</button>
                                                <?php else: ?>

                                                    <?php if($vendor['is_ban']): ?>
                                                        <button type="button" class="btn btn-success waves-effect waves-light btn-md" onclick="areyousure('Are you sure you want to ACTIVATE this vendor?', this)" data-url="<?php echo base_url('admin/dashboard/activateVendor/').$vendor['id'] ?>">Activate Vendor</button>
                                                    <?php else: ?>
                                                        <button type="button" class="btn btn-danger waves-effect waves-light btn-md" onclick="areyousure('Are you sure you want to BAN this vendor?', this)" data-url="<?php echo base_url('admin/dashboard/banVendor/').$vendor['id'] ?>">Ban Vendor</button>
                                                    <?php endif; ?>
                                                    
                                                    <?php if($vendor['is_featured']): ?>
                                                        <button type="button" class="btn btn-danger waves-effect waves-light btn-md" onclick="areyousure('Are you sure you want to UN-FEATURE this vendor?', this)" data-url="<?php echo base_url('admin/dashboard/unFeatureVendor/').$vendor['id'] ?>">Un-Feature Vendor</button>
                                                    <?php else: ?>
                                                        <button type="button" class="btn btn-warning waves-effect waves-light btn-md" onclick="areyousure('Are you sure you want to FEATURE this vendor?', this)" data-url="<?php echo base_url('admin/dashboard/featureVendor/').$vendor['id'] ?>">Feature Vendor</button>
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                                <button type="button" class="btn btn-info waves-effect waves-light btn-md" onclick="window.location='<?php echo base_url('admin/dashboard/editUser/').$vendor['user_id'] ?>'">View User Profile</button>
                                                
                                            </p>
                                            
                                            
                                        </div>

                                        <div class="clearfix"></div>
                                    </div>


                                    <div class="form-horizontal" style="margin-top:40px;">

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="example-email">Payment Methods</label>
                                        <div class="col-md-10">
                                            <input type="email" disabled name="example-email" disabled class="form-control" value="<?php echo implode(', ',json_decode($vendor['payment_methods'])); ?>" placeholder="Payment Methods">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="example-email">Longitude</label>
                                        <div class="col-md-10">
                                            <input type="email" disabled name="example-email" class="form-control" value="<?php echo $vendor['longitude'] ?>" placeholder="Longitude">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="example-email">Latitude</label>
                                        <div class="col-md-10">
                                            <input type="email" disabled name="example-email" class="form-control" value="<?php echo $vendor['latitude'] ?>" placeholder="Latitude">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="example-email">Orders</label>
                                        <div class="col-md-10">
                                            <input type="email" disabled name="example-email" class="form-control" value="<?php echo $vendor['orders_placed'] ?>" placeholder="Orders Recieved">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="example-email">Revenue</label>
                                        <div class="col-md-10">
                                            <input type="email" disabled name="example-email" class="form-control" value="<?php echo $vendor['revenue'] ?>" placeholder="Revenue Earned">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="example-email">Products</label>
                                        <div class="col-md-10">
                                            <input type="email" disabled name="example-email" class="form-control" value="<?php echo $vendor['products'] ?>" placeholder="Products Placed">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="example-email">Reviews</label>
                                        <div class="col-md-10">
                                            <input type="email" disabled name="example-email" class="form-control" value="<?php echo $vendor['reviews'] ?>" placeholder="Reviews Recieved">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="example-email">Ratings</label>
                                        <div class="col-md-10">
                                            <input type="email" disabled name="example-email" class="form-control" value="<?php echo $vendor['ratings'] ?>" placeholder="User Rating">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="example-email">Created</label>
                                        <div class="col-md-10">
                                            <input type="email" disabled name="example-email" class="form-control" value="<?php echo $vendor['created_at'] ?>" placeholder="Created At">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="example-email">Updated</label>
                                        <div class="col-md-10">
                                            <input type="email" disabled name="example-email" class="form-control" value="<?php echo $vendor['updated_at'] ?>" placeholder="Updated At">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="example-email">Last Accessed At</label>
                                        <div class="col-md-10">
                                            <input type="email" disabled name="example-email" class="form-control" value="<?php echo $vendor['last_accessed_at'] ?>" placeholder="Last Accessed At">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="example-email"></label>
                                        <div class="col-md-10 text-right">
                                            <a href="<?php echo base_url('admin/dashboard/products/'.$vendor['id']); ?>" class="btn btn-lg btn-default waves-effect waves-light m-t-10">View Products</a>
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

                        </div><!--row -->
                        
                        
                    </div><!-- end col -->
                </div><!-- end row -->
                            
                       

            </div> <!-- container -->
        </div> <!-- content -->



<?php $this->load->view('admin/footer') ?>       
<script>
    $(document).ready(function(){
        setTimeout(() => {
            diffuseNotification('vendors', "<?php echo $vendor['id'] ?>");
        }, 10);
    });
</script>