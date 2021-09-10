<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta name -->
        <?php echo $this->include('header/meta'); ?>

        <title><?php echo htmlspecialchars($title); ?></title>

        <!-- Global stylesheets -->
        <?php echo $this->include('header/global'); ?>
    </head>

    <body class="navbar-bottom navbar-top">

        <?php echo $this->include('header/navbar'); ?>

        <!-- Page header -->
        <div class="page-header">

            <?php echo $this->include('header/navbar_second'); ?>

            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="<?php echo htmlspecialchars($titleIcon); ?> position-left <?php echo htmlspecialchars(config('SiteConfig')->generalIconColor); ?>"></i> <span class="text-semibold"><?php echo htmlspecialchars($title); ?></span></h4>
                    <ul class="breadcrumb position-right">
                        <li><a href="<?php echo htmlspecialchars(base_url('dashboard')); ?>"><?php echo htmlspecialchars(lang('Interface.menu.sidebar.dashboard')); ?></a></li>
                        <li class="active"><?php echo htmlspecialchars($title); ?></li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- /page header -->


        <!-- Page container -->
        <div class="page-container">

            <!-- Page content -->
            <div class="page-content">

                <!-- Main sidebar -->
                <?php echo $this->include('sidebar'); ?>

                <!-- Main content -->
                <div class="content-wrapper">

                </div>
                <!-- /main content -->

            </div>
            <!-- /page content -->

        </div>
        <!-- /page container -->

        <!-- Footer -->
        <?php echo $this->include('footer/core');?>
        <!-- Theme JS files -->

        <script type="text/javascript" src="<?php echo htmlspecialchars(base_url('assets/js/core/app.min.js')); ?>"></script>
        <!-- /theme JS files -->
    </body>
</html>
