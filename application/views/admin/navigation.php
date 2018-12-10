<!-- Top Bar Start -->
<div class="topbar">

<!-- LOGO -->
<div class="topbar-left">
    <a href="<?php echo base_url('admin'); ?>" class="logo"><span>Admin<span>to</span></span><i class="zmdi zmdi-layers"></i></a>
</div>

<!-- Button mobile view to collapse sidebar menu -->
<div class="navbar navbar-default" role="navigation">
    <div class="container">

        <!-- Page title -->
        <ul class="nav navbar-nav navbar-left">
            <li>
                <button class="button-menu-mobile open-left">
                    <i class="zmdi zmdi-menu"></i>
                </button>
            </li>
            <li>
                <h4 class="page-title"><?php echo $title; ?></h4>
            </li>
        </ul>

        <!-- Right(Notification and Searchbox -->
        <ul class="nav navbar-nav navbar-right" style="">
            <li>
                <!-- Notification -->
                <div class="notification-box">
                    <ul class="list-inline m-b-0">
                        <li>
                            <a href="<?php echo base_url('admin/logout'); ?>" class="">
                                <i class="zmdi zmdi-power" title="Log Out"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Notification bar -->
            </li>
            <li class="hidden-xs" style="display:none;">
                <form role="search" class="app-search">
                    <input type="text" placeholder="Search..."
                           class="form-control">
                    <a href=""><i class="fa fa-search"></i></a>
                </form>
            </li>
        </ul>

    </div><!-- end container -->
</div><!-- end navbar -->
</div>
<!-- Top Bar End -->


<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
<div class="sidebar-inner slimscrollleft">

    <div class="user-box">
                        <div class="user-img">
                            <img src="<?php echo base_url(); ?>assets/images/default-admin.png" alt="user-img" title="Mat Helme" class="img-circle img-thumbnail img-responsive">
                            <div class="user-status offline"><i class="zmdi zmdi-dot-circle"></i></div>
                        </div>
                        <h5><a href="#">Admin</a> </h5>
                        
                    </div>

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <ul>
            <li class="text-muted menu-title" style="display:none;" >Navigation</li>

            <li>
                <a href="<?php echo base_url('admin'); ?>" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i> <span> Dashboard </span> </a>
            </li>

            <li>
                <a href="<?php echo base_url('admin/dashboard/categories'); ?>" class="waves-effect">
                    <i class="zmdi zmdi-view-list-alt"></i> <span> Categories </span> 
                </a>
            </li>

            <li>
                <a href="<?php echo base_url('admin/dashboard/users'); ?>" class="waves-effect">
                    <i class="zmdi zmdi-account"></i> 
                    <span id="newUsers" class="label label-success pull-right m-r-10 hidden">7 New</span>
                    <span> Users </span> 
                </a>
            </li>

            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect">
                    <i class="dripicons-cart"></i> 
                    <span id="newVendors" class="label label-success pull-right m-r-10 hidden">7 New</span>
                    <span> Vendors </span> 
                    <span class="menu-arrow"></span>
                </a>
                <ul class="list-unstyled">
                    <li><a href="<?php echo base_url('admin/dashboard/vendors/all'); ?>">All</a></li>
                    <li><a href="<?php echo base_url('admin/dashboard/vendors/banned'); ?>">Banned</a></li>
                    <li><a href="<?php echo base_url('admin/dashboard/vendors/featured'); ?>">Featured</a></li>
                </ul>
            </li>

            <li>
                <a href="<?php echo base_url('admin/dashboard/products'); ?>" class="waves-effect">
                    <i class="zmdi zmdi-dropbox"></i> 
                    <span id="newProducts" class="label label-success pull-right m-r-10 hidden">7 New</span>
                    <span> Products </span> 
                </a>
            </li>

            <li>
                <a href="<?php echo base_url('admin/dashboard/orders'); ?>" class="waves-effect">
                    <i class="zmdi zmdi-format-list-bulleted"></i> 
                    <span id="newOrders" class="label label-success pull-right m-r-10 hidden">7 New</span>
                    <span> Orders </span> 
                </a>
            </li>

        </ul>
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -->
    <div class="clearfix"></div>

</div>

</div>
<!-- Left Sidebar End -->

        <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">