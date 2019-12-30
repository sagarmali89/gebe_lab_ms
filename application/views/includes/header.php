<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $pageTitle . ' :: ' . PROJ_NAME; ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.4 -->
        <link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- FontAwesome 4.3.0 -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        <!-- Ionicons 2.0.0 -->
        <link href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins 
             folder instead of downloading all of them to reduce the load. -->
        <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
        <style>
            .error{
                color:red;
                font-weight: normal;
            }
            .loader {
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background: url('<?php echo base_url(); ?>assets/images/basicloader.gif') 50% 50% no-repeat rgb(249,249,249);
                opacity: .8;
            }
        </style>
        <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript">
            var baseURL = "<?php echo base_url(); ?>";
        </script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-blue sidebar-mini <?php if($pageTitle=='Dashboard'){}else{ ?> sidebar-collapse <?php } ?>">
        <div class="loader"></div>
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="<?php echo base_url(); ?>" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>A</b> S</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Admin</b> System</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown tasks-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-history"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header"> Last Login : <i class="fa fa-clock-o"></i> <?= empty($last_login) ? "First Time Login" : $last_login; ?></li>
                                </ul>
                            </li>
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="user-image" alt="User Image"/>
                                    <span class="hidden-xs"><?php echo $name; ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">

                                        <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image" />
                                        <p>
                                            <?php echo $name; ?>
                                            <small><?php echo $role_text; ?></small>
                                        </p>

                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?php echo base_url(); ?>profile" class="btn btn-warning btn-flat"><i class="fa fa-user-circle"></i> Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo base_url(); ?>logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MAIN NAVIGATION</li>
                        <li>
                            <a href="<?php echo base_url(); ?>dashboard">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
                            </a>
                        </li>

                        <li class="treeview">
                            <a href="<?php echo base_url('analysis'); ?>">
                                <i class="fa fa-tint"></i> <span>Water analysis</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url('Water_Analysis/listing'); ?>"><i class="fa fa-circle-o"></i>List Water Analysis</a></li>
                                <li><a href="<?php echo base_url('Water_Analysis/manage'); ?>"><i class="fa fa-circle-o"></i>Manage Water Analysis</a></li>
                                <li><a href="<?php echo base_url('Water_Analysis/report'); ?>"><i class="fa fa-circle-o"></i>Generate Reports</a></li>
                            </ul>
                        </li>
                         <li class="treeview">
                            <a href="<?php echo base_url('analysis'); ?>">
                                <i class="fa fa-tint"></i> <span>Water analysis - Customers</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url('Water_Analysis_Customers/listing'); ?>"><i class="fa fa-circle-o"></i>List Water Analysis</a></li>
                                <li><a href="<?php echo base_url('Water_Analysis_Customers/manage'); ?>"><i class="fa fa-circle-o"></i>Manage Water Analysis</a></li>
                                <li><a href="<?php echo base_url('Water_Analysis_Customers/report'); ?>"><i class="fa fa-circle-o"></i>Generate Reports</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="<?php echo base_url('power_plant_cooling_water_boiler/ppcw_list'); ?>">
                                <i class="fa fa-server"></i> <span>PPCW - Boilers</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url('power_plant_cooling_water_boiler/ppcw_list'); ?>"><i class="fa fa-circle-o"></i>List PPCW Boilers</a></li>
                                <li><a href="<?php echo base_url('power_plant_cooling_water_boiler/manage'); ?>"><i class="fa fa-circle-o"></i>Manage PPCW Boilers</a></li>
                                <li><a href="<?php echo base_url('power_plant_cooling_water_boiler/report'); ?>"><i class="fa fa-circle-o"></i>Generate Reports</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="<?php echo base_url('power_plant_cooling_water_engine/ppcw_list'); ?>">
                                <i class="fa fa-server"></i> <span>PPCW - Engines</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url('power_plant_cooling_water_engine/ppcw_list'); ?>"><i class="fa fa-circle-o"></i>List PPCW Engines</a></li>
                                <li><a href="<?php echo base_url('power_plant_cooling_water_engine/manage'); ?>"><i class="fa fa-circle-o"></i>Manage PPCW Engines</a></li>
                                <li><a href="<?php echo base_url('power_plant_cooling_water_engine/report'); ?>"><i class="fa fa-circle-o"></i>Generate Reports</a></li>
                            </ul>
                        </li>

                        <?php
                        if ($role == ROLE_ADMIN) {
                            ?>
                            <li>
                                <!--<a href="<?php echo base_url('customers'); ?>">-->
                                <a href="<?php echo base_url('contacts'); ?>">
                                    <i class="fa fa-address-book"></i>
                                    <span>Customers</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('userListing'); ?>">
                                    <i class="fa fa-users"></i>
                                    <span>Users</span>
                                </a>
                            </li>
                            <li class="treeview">
                                <a href="<?php echo base_url('setting'); ?>">
                                    <i class="fa fa-cog"></i> <span>Setting</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">

                                    <li><a href="<?php echo base_url('setting/wa_subtypes'); ?>"><i class="fa fa-tint"></i>Analysis Sub-Types</a></li>
                                    <li><a href="<?php echo base_url('setting/boilers'); ?>"><i class="fa fa-server"></i>Boilers</a></li>
                                    <li><a href="<?php echo base_url('setting/engines'); ?>"><i class="fa fa-server"></i>Engines</a></li>
                                    <li><a href="<?php echo base_url('setting/buildings'); ?>"><i class="fa fa-server"></i>Buildings</a></li>
                                    <li><a href="<?php echo base_url('streets'); ?>"><i class="fa fa-map"></i>Streets</a></li>
                                    <li><a href="<?php echo base_url('setting/area'); ?>"><i class="fa fa-map"></i>Areas/Locations</a></li>
                                    <li><a href="<?php echo base_url('setting/district'); ?>"><i class="fa fa-map"></i>Districts</a></li>
                                    <li><a href="<?php echo base_url('setting/companies'); ?>"><i class="fa fa-circle-o"></i>Companies</a></li>
                                </ul>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>