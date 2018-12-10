<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="<?php admin_assets() ?>images/favicon.ico">

        <title>Adminto - Responsive Admin Dashboard Template</title>


        <?php if(isset($scripts) && in_array('morris', $scripts)): ?>
            <link rel="stylesheet" href="<?php admin_assets() ?>plugins/morris/morris.css">
        <?php endif; ?>

        <?php if(isset($scripts) && in_array('modal', $scripts)): ?>
            <link href="<?php admin_assets() ?>plugins/custombox/dist/custombox.min.css" rel="stylesheet">
        <?php endif; ?>

        <?php if(isset($scripts) && in_array('tree', $scripts)): ?>
            <link href="<?php admin_assets() ?>plugins/jstree/style.css" rel="stylesheet">
        <?php endif; ?>

        <?php if(isset($scripts) && in_array('datatables', $scripts)): ?>
            <link href="<?php admin_assets() ?>plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
            <link href="<?php admin_assets() ?>plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
            <link href="<?php admin_assets() ?>plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
            <link href="<?php admin_assets() ?>plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
            <link href="<?php admin_assets() ?>plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <?php endif; ?>

        <?php if(isset($scripts) && in_array('formelements', $scripts)): ?>
            <link href="<?php admin_assets() ?>plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
            <link href="<?php admin_assets() ?>plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
            <link href="<?php admin_assets() ?>plugins/select2/dist/css/select2.css" rel="stylesheet" type="text/css">
            <link href="<?php admin_assets() ?>plugins/select2/dist/css/select2-bootstrap.css" rel="stylesheet" type="text/css">
            <link href="<?php admin_assets() ?>plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
            <link href="<?php admin_assets() ?>plugins/switchery/switchery.min.css" rel="stylesheet" />
            <link href="<?php admin_assets() ?>plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
            <link href="<?php admin_assets() ?>plugins/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
            <link href="<?php admin_assets() ?>plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
            <link href="<?php admin_assets() ?>plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        <?php endif; ?>

        <!-- App css -->
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


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

        <?php $this->load->view('admin/navigation') ?>