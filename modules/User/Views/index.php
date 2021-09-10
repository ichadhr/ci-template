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
                    <h4><i class="<?php echo $titleIcon; ?> position-left <?php echo htmlspecialchars(config('SiteConfig')->generalIconColor); ?>"></i> <span class="text-semibold"><?php echo htmlspecialchars($title); ?></span></h4>
                    <ul class="breadcrumb position-right">
                        <li><a href="<?php echo htmlspecialchars(base_url('dashboard')); ?>"><?php echo htmlspecialchars(lang('Interface.menu.sidebar.dashboard')); ?></a></li>
                        <li class="active"><?php echo htmlspecialchars($title); ?></li>
                    </ul>
                </div>
                <div class="heading-elements">
                    <button type="button" data-href="/user/add" id="add-user" class="btn btn-shadow btn-labeled btn-labeled-left <?php echo htmlspecialchars(config('SiteConfig')->generalBtnColor); ?> heading-btn"><?php echo htmlspecialchars(lang('Interface.btn.add')); ?> <b><i class="icon-plus3"></i></b></button>
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
                    <!-- Table -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h6 class="panel-title text-semibold text-uppercase"><?php echo htmlspecialchars(lang('Interface.pages.user.panel.headPanel')); ?></h6>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a id="data-reload" href="javascript:;"><i class="icon-sync"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <table id="data-users" class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th><?php echo htmlspecialchars(lang('Interface.pages.user.table.headUsername')); ?></th>
                                    <th><?php echo htmlspecialchars(lang('Interface.pages.user.table.headFullname')); ?></th>
                                    <th><?php echo htmlspecialchars(lang('Interface.pages.user.table.headEmail')); ?></th>
                                    <th><?php echo htmlspecialchars(lang('Interface.pages.user.table.headGroup')); ?></th>
                                    <th class="text-center"><?php echo htmlspecialchars(lang('Interface.pages.user.table.headStatus')); ?></th>
                                    <th class="text-center"><?php echo htmlspecialchars(lang('Interface.pages.user.table.headAction')); ?></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /table -->
                </div>
                <!-- /main content -->

            </div>
            <!-- /page content -->

        </div>
        <!-- /page container -->

        <!-- Footer -->
        <?php echo $this->include('footer/core');?>
        <!-- Theme JS files -->
        <script type="text/javascript" src="<?php echo htmlspecialchars(base_url('assets/js/plugins/tables/datatables/datatables.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo htmlspecialchars(base_url('assets/js/plugins/forms/selects/select2.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo htmlspecialchars(base_url('assets/themes/plugins/modal/bootstrap-modal.min.js')); ?>"></script>

        <script type="text/javascript" src="<?php echo htmlspecialchars(base_url('assets/js/core/app.min.js')); ?>"></script>
        <!-- /theme JS files -->
        <script type="text/javascript" src="<?php echo htmlspecialchars(base_url('assets/themes/js/pages/user.min.js')); ?>"></script>
    </body>
</html>
