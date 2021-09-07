<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta name -->
    <?php echo $this->include('header/meta');?>
    <title><?php echo $title; ?></title>
    <!-- Global stylesheets -->
    <?php echo $this->include('header/global');?>
</head>

<body class="login-container login-bg">

    <!-- Page container -->
    <div class="page-container pb-20">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper login-wrapper">
                <!-- Login form -->
                <?php echo form_open((string) current_url(TRUE), 'id="forgot-form" autocomplete="off" spellcheck="false"'); ?>

                <div class="panel panel-body login-form <?php echo config('SiteConfig')->borderTopLogin; ?>">
                    <div class="text-center">
                        <div class="icon-object border-slate-300 text-slate-300"><i class="icon-spinner11"></i></div>
                        <h5 class="content-group-lg"><?php echo lang('Interface.forgot_password.heading'); ?><small
                                class="display-block"><?php echo lang('Interface.forgot_password.sub_heading'); ?></small></h5>
                    </div>

                    <div class="form-group has-feedback has-feedback-right">
                        <input type="email" name="identity" value="" id="identity" class="form-control"
                            placeholder="email" autofocus="" autocomplete="off">
                        <div class="form-control-feedback">
                            <i class="icon-envelop text-muted"></i>
                        </div>
                        <span id="identity_error">
                        </span>
                    </div>

                    <div class="form-group">
                        <button type="submit" data-loading-text="<i class='icon-spinner3 spinner'></i>"
                            class="btn btn-shadow btn-loading <?php echo config('SiteConfig')->generalBtnColor; ?>  btn-block"><?php echo lang('Interface.btn.reset'); ?><i
                                class="icon-arrow-right14 position-right"></i></button>
                    </div>

                    <span class="help-block text-center no-margin">
                        &copy; <?php call_user_func(function (string $y) {
    $c = date('Y');
    echo $y . (($y != $c) ? ' - ' . $c : '');
}, config('SiteConfig')->startDev);
        echo ' ' . config('SiteConfig')->appName;
        ?>
                        <br />
                    </span>

                </div>

                <?php echo form_close(); ?>
                <!-- /login form -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->

    <!-- Core JS files -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/loaders/pace.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/core/libraries/jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/core/libraries/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/themes/plugins/jscookie/js.cookie.min.js'); ?>">
    </script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/styling/uniform.min.js'); ?>">
    </script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/notifications/sweet_alert.min.js'); ?>">
    </script>

    <script type="text/javascript" src="<?php echo base_url('assets/js/core/app.min.js'); ?>"></script>
    <!-- /theme JS files -->
    <script type="text/javascript" src="<?php echo base_url('assets/themes/js/pages/login.min.js'); ?>"></script>

</body>

</html>