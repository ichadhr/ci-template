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
                <?php echo form_open((string) current_url(TRUE), 'id="login-form" autocomplete="off" spellcheck="false"'); ?>
                <div class="panel panel-body login-form <?php echo config('SiteConfig')->borderTopLogin; ?>">
                    <div class="text-center">
                        <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                        <h5 class="content-group-lg"><?php echo lang('Interface.login.heading'); ?><small
                                class="display-block"><?php echo lang('Interface.login.sub_heading'); ?></small></h5>
                    </div>

                    <div id="messages"><?php echo session()->get('messages'); ?></div>

                    <div class="form-group has-feedback has-feedback-left">
                        <?php echo form_input($identity); ?>
                        <div class="form-control-feedback">
                            <i class="icon-envelop text-muted"></i>
                        </div>
                        <span id="identity_error">
                        </span>
                    </div>

                    <div class="form-group has-feedback has-feedback-left">
                        <?php echo form_input($password); ?>
                        <div class="form-control-feedback">
                            <i class="icon-lock2 text-muted"></i>
                        </div>
                        <span id="password_error">
                        </span>
                    </div>

                    <div class="form-group login-options">
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="checkbox-inline">
                                    <?php echo form_checkbox('remember', '1', FALSE, 'class="styled"'); ?>
                                    <?php echo lang('Interface.login.remember'); ?> 
                                </label>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="/forgot_password"><?php echo lang('Interface.login.forgot_password'); ?></a>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" data-loading-text="<i class='icon-spinner3 spinner'></i>"
                            class="btn btn-shadow btn-loading <?php echo config('SiteConfig')->generalBtnColor; ?>  btn-block"><?php echo lang('Interface.btn.login'); ?><i
                                class="icon-arrow-right14 position-right"></i></button>
                    </div>

                    <div class="content-divider text-muted form-group">
                        <span><?php echo lang('Interface.login.divider'); ?></span>
                    </div>
                    <a href="/register"
                        class="btn btn-default btn-block content-group"><?php echo lang('Interface.btn.register'); ?></a>

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