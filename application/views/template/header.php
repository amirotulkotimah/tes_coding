<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Klasemen Sepak Bola</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesdesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="<?php echo base_url("assets/images/favicon.ico")?>">

        <link href="<?php echo base_url("assets/css/bootstrap.min.css")?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url("assets/plugins/animate/animate.css")?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url("assets/css/icons.css")?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url("assets/css/style.css")?>" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/metro/MetroJs.min.css");?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/plugins/morris/morris.css");?>">
        <link href="<?php echo base_url("assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css");?>" rel="stylesheet">

        <!-- DataTables -->
        <link href="<?php echo base_url("assets/plugins/datatables/dataTables.bootstrap4.min.css");?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url("assets/plugins/datatables/buttons.bootstrap4.min.css");?>" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="<?php echo base_url("assets/plugins/datatables/responsive.bootstrap4.min.css");?>" rel="stylesheet" type="text/css" /> 

        <link href="<?php echo base_url("assets/css/bootstrap.min.css");?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url("assets/plugins/animate/animate.css");?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url("assets/css/icons.css");?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url("assets/css/style.css");?>" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url("assets/highcharts/style.css");?>" type="text/css">
        <script src="<?php echo base_url("assets/js/jquery.min.js")?>"></script>
    </head>
    <body>

        <!-- Navigation Bar-->
        <header id="topnav">

            <!-- MENU Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li class="has-submenu">
                                <a href="<?php echo site_url('data_klub')?>"><i class="fas fa-futbol "></i>Data Klub</a>
                            </li>

                            <li class="has-submenu">
                                <a href="<?php echo site_url('skor')?>"><i class="fas fa-newspaper "></i>Skor</a>                                
                            </li>

                            <li class="has-submenu">
                                <a href="<?php echo site_url('klasemen')?>"><i class="fas fa-list-ul "></i>Klasemen</a>                                
                            </li>

                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>
        <br><br><br>
        <!-- End Navigation Bar-->
