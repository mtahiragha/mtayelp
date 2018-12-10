<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App Favicon -->
        <link rel="shortcut icon" href="<?php admin_assets() ?>images/favicon.ico">

        <!-- App title -->
        <title>Log In</title>

        <!-- App CSS -->
        <link href="<?php admin_assets() ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php admin_assets() ?>css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?php admin_assets() ?>css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?php admin_assets() ?>css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php admin_assets() ?>css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?php admin_assets() ?>css/menu.css" rel="stylesheet" type="text/css" />
        <link href="<?php admin_assets() ?>css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?php admin_assets() ?>js/modernizr.min.js"></script>
        
    </head>
    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class="text-center">
                <a href="#" class="logo"><span>Admin<span>to</span></span></a>
                <h5 class="text-muted m-t-0 font-600"></h5>
            </div>
        	<div class="m-t-40 card-box">
                <div class="text-center">
                    <h4 class="text-uppercase font-bold">Sign In</h4>
                </div>
            
                <?php if(isset($error ) && !empty($error )): ?>
                <div class="text-center">
                    <p class="font-bold m-b-0"><?php echo "$error"; ?></p>
                </div>
                <?php endif; ?>

                <div class="panel-body">
                    <form class="form-horizontal m-t-20" action="<?php echo base_url('admin/login'); ?>" method="POST">

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="Username" name="username">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" required="" placeholder="Password" name="password">
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <div class="checkbox checkbox-custom">
                                    <input id="checkbox-signup" type="checkbox">
                                    <label for="checkbox-signup">
                                        Remember me
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="form-group text-center m-t-30">
                            <div class="col-xs-12">
                                <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
            <!-- end card-box-->

           
            
        </div>
        <!-- end wrapper page -->
        

        
    	<script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="<?php admin_assets() ?>js/jquery.min.js"></script>
        <script src="<?php admin_assets() ?>js/bootstrap.min.js"></script>
        <script src="<?php admin_assets() ?>js/detect.js"></script>
        <script src="<?php admin_assets() ?>js/fastclick.js"></script>
        <script src="<?php admin_assets() ?>js/jquery.slimscroll.js"></script>
        <script src="<?php admin_assets() ?>js/jquery.blockUI.js"></script>
        <script src="<?php admin_assets() ?>js/waves.js"></script>
        <script src="<?php admin_assets() ?>js/wow.min.js"></script>
        <script src="<?php admin_assets() ?>js/jquery.nicescroll.js"></script>
        <script src="<?php admin_assets() ?>js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="<?php admin_assets() ?>js/jquery.core.js"></script>
        <script src="<?php admin_assets() ?>js/jquery.app.js"></script>
	
	</body>
</html>