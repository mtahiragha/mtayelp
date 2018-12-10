<?php $this->load->view('admin/header') ?>
        
        <!-- Start content -->
        <div class="content">
            <div class="container">

                
                <div class="container">

                    <div class="row">
                        <div class="col-md-8">
                            <div class="card-box task-detail">
                                
                            <div class="profile-info-name">
                                <?php if(!$product['dp']): ?>
                                    <img src="<?php echo base_url() ?>assets/images/default-product.png" class="img-thumbnail" alt="profile-image">
                                <?php else: ?>
                                <?php endif; ?>
                                

                                <div class="profile-info-detail">
                                <h3 class="m-t-0 m-b-0"><?php echo ucwords($product['product']); ?></h3>
                                <a target="_blank" href="<?php echo base_url('admin/dashboard/editVendor/'.$product['vendor_id']) ?>" class="text-muted show m-b-20"><i><?php echo $product['vendor_name'] ?></i></a>

                                <p>Price: <b><?php echo $product['price'] ?></b></p>
                                <p>Orders: <b><?php echo $product['orders'] ?></b></p>
                                <p>Revenue: <b><?php echo number_format($product['revenue'], 2) ?></b></p>

                            </div>

                                <div class="clearfix"></div>
                                </div>

                                <h4 class="font-600 m-b-20 m-t-30">Description</h4>

                                <p class="text-muted">
                                    <?php echo $product['description']; ?>
                                </p>


                                <ul class="list-inline task-dates m-b-0 m-t-20">
                                    <li>
                                        <h5 class="font-600 m-b-5">Ratings</h5>
                                        <p><?php echo number_format($product['ratings'], 1)." / 5" ?></p>
                                    </li>

                                    <li>
                                        <h5 class="font-600 m-b-5">Preparation Time</h5>
                                        <p><?php echo $product['preparation_time'] ?></p>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>

                                    <div class="task-tags m-t-20">
                                        <h5 class="font-600">Categories</h5>
                                        <?php printCategories(json_decode($product['categories']), $categories) ?>
                                </div>

                                <div class="assign-team m-t-30">
                                    <h5 class="font-600 m-b-5">Ingredients</h5>
                                    <div>
                                        <?php 
                                            $ingredients = json_decode($product['ingredients']);
                                            if(!empty($ingredients)){
                                                foreach($ingredients as $i){
                                                    echo "<p class='m-b-0'>$i</p>";
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>

                              

                            </div>
                        </div><!-- end col -->

                        <div class="col-md-4">
                            <div class="card-box">
                               

                                <h4 class="header-title m-t-0 m-b-30">Reviews (0)</h4>

                                <div>
                                    <div class="media m-b-10">
                                        <div class="media-body">
                                            <p class="font-13 text-muted m-b-0">Reviews not available at the moment.</p>
                                        </div>
                                    </div>
                                    <!-- <div class="media m-b-10">
                                        <div class="media-left">
                                            <a href="#"> <img class="media-object img-circle thumb-sm" alt="64x64" src="<?php admin_assets(); ?>images/users/avatar-1.jpg"> </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">Mat Helme</h4>
                                            <p class="font-13 text-muted m-b-0">
                                                <a href="" class="text-primary">@Michael</a>
                                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                            ante sollicitudin commodo. Cras purus odio.
                                            </p>
                                            <a href="" class="text-success font-13">Reply</a>
                                        </div>
                                    </div> -->
                                   
                                    <!-- <div class="media m-b-10">
                                        <div class="media-left">
                                            <a href="#"> <img class="media-object img-circle thumb-sm" alt="64x64" src="<?php admin_assets(); ?>images/users/avatar-2.jpg"> </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">Media heading</h4>
                                            <p class="font-13 text-muted m-b-0">
                                                <a href="" class="text-primary">@Michael</a>
                                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                            ante sollicitudin commodo. Cras purus odio.
                                            </p>
                                            <a href="" class="text-success font-13">Reply</a>
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#"> <img class="media-object img-circle thumb-sm" alt="64x64" src="<?php admin_assets(); ?>images/users/avatar-3.jpg"> </a>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">Nested media heading</h4>
                                                    <p class="font-13 text-muted m-b-0">
                                                        <a href="" class="text-primary">@Michael</a>
                                                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                                    ante sollicitudin commodo. Cras purus odiot.
                                                    </p>
                                                    <a href="" class="text-success font-13">Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

                                    <!-- <div class="media">
                                        <div class="media-left">
                                            <a href="#"> <img class="media-object img-circle thumb-sm" alt="64x64" src="<?php admin_assets(); ?>images/users/avatar-1.jpg"> </a>
                                        </div>
                                        <div class="media-body">
                                            <input type="text" class="form-control input-sm" placeholder="Some text value...">
                                        </div>
                                    </div> -->

                                </div>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->


                </div> <!-- container -->
                            
                       

            </div> <!-- container -->
        </div> <!-- content -->



<?php $this->load->view('admin/footer') ?>       
<script>
    $(document).ready(function(){
        setTimeout(() => {
            diffuseNotification('products', "<?php echo $product['id'] ?>");
        }, 10);
    });
</script>