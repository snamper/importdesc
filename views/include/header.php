 <head>
    <meta charset="utf-8" />
    <title></title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta name="robots" content="noindex, nofollow" />
    <meta name="robots" content="none" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="../assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
    <link href="../assets/plugins/bootstrap/bootstrap4/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/plugins/icon/themify-icons/themify-icons.css" rel="stylesheet" />
    <link href="../assets/css/animate.min.css" rel="stylesheet" />
    <link href="../assets/css/style.min.css" rel="stylesheet" />
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="../assets/plugins/loader/pace/pace.min.js"></script>
    <!-- ================== END BASE JS ================== -->
</head>

<?php if(isset($_SESSION['user'])) {?>
    <div id="page-container" class="page-header-fixed page-sidebar-fixed">
        <!-- BEGIN #header -->
        <div id="header" class="header navbar navbar-default navbar-fixed-top">
                <!-- BEGIN container-fluid -->
                <div class="container-fluid">
                    <!-- BEGIN mobile sidebar expand / collapse button -->
                    <div class="navbar-header">
                        <a href="home" class="navbar-brand">
                            <img
                                src="../assets/img/gwi-auto-logo@2x.png"
                                alt=""/>
                        </a>
                        <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- END mobile sidebar expand / collapse button -->
                    <!-- BEGIN header navigation right -->
                    <div class="navbar-xs-justified">
                        <ul class="nav navbar-nav navbar-right">

                            <li class="dropdown">
                                <a href="javascript:;" data-toggle="dropdown" class="navbar-icon">
                                    <i class="ti-settings"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-md no-padding" data-dropdown-close="false">
                                    <li class="dropdown-header">Sidebar Settings</li>
                                    <li class="setting">
                                        <div class="setting-icon bg-inverse"><i class="ti-wand"></i></div>
                                        <div class="setting-info">
                                            <div class="switcher">
                                                <input type="checkbox" name="setting_sidebar_inverse" id="setting_sidebar_inverse" checked />
                                                <label for="setting_sidebar_inverse"></label>
                                            </div>
                                            Sidebar Inverse
                                        </div>
                                    </li>
                                    <li class="setting">
                                        <div class="setting-icon bg-inverse"><i class="ti-layout-accordion-list"></i></div>
                                        <div class="setting-info">
                                            <div class="switcher">
                                                <input type="checkbox" name="setting_sidebar_minified" id="setting_sidebar_minified" />
                                                <label for="setting_sidebar_minified"></label>
                                            </div>
                                            Sidebar Minified
                                        </div>
                                    </li>
                                    <li class="dropdown-header">Header Settings</li>
                                    <li class="setting">
                                        <div class="setting-icon bg-inverse"><i class="ti-spray"></i></div>
                                        <div class="setting-info">
                                            <div class="switcher">
                                                <input type="checkbox" name="setting_header_inverse" id="setting_header_inverse" />
                                                <label for="setting_header_inverse"></label>
                                            </div>
                                            Header Inverse
                                        </div>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle navbar-icon with-label">
                                    <i class="ti-bell "></i>
                                </a>
                                <ul class="dropdown-menu dropdown-lg no-padding">
                                    <li class="dropdown-header"><a href="#" class="dropdown-close">&times;</a>open tasks</li>

                                   

                                </ul>
                            </li>

                            <li class="dropdown">

                                <a href="javascript:;" data-toggle="dropdown">
                <span class="navbar-user-img online pull-left">
                  <img src="../assets/img/user-9.jpg"/>
                </span>
                                <span class="hidden-xs "><b class="caret"></b></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="login?logout">Log out</a></li>

                                    <li class='d-md-block d-lg-none d-lg-block d-xl-none'><a href="#one" class="btn btn-default"> Basis gegevens</a></li>
                                    <li class=' d-md-block d-lg-none   d-lg-block d-xl-none'><a href="#two" class="btn btn-default"> Aanbieden en mailen</a></li>
                                    <li class=' d-md-block d-lg-none   d-lg-block d-xl-none'><a href="#three" class="btn btn-default"> Offreren en verkopen</a></li>
                                    <li class=' d-md-block d-lg-none   d-lg-block d-xl-none'><a href="#four" class="btn btn-default"> Inkoop</a></li>
                                    <li class=' d-md-block d-lg-none   d-lg-block d-xl-none'><a href="#five" class="btn btn-default"> Facturatie</a></li>
                                    <li class=' d-md-block d-lg-none   d-lg-block d-xl-none'><a href="#six" class="btn btn-default"> BPM & RDW gegevens</a></li>
                                    <li class=' d-md-block d-lg-none   d-lg-block d-xl-none'><a href="#seven" class="btn btn-default"> Alle doc & comm.</a></li>


                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- END header navigation right -->
                </div>

            </div>
              <?php } ?>