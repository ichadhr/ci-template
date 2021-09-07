<div id="grad-navbar" class="navbar navbar-inverse navbar-fixed-top ">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo base_url('dashboard'); ?>">
                <img src="<?php echo base_url('assets/themes/images/logo.png'); ?>" alt="<?php echo config('SiteConfig')->appName; ?>">
            </a>

            <ul class="nav navbar-nav pull-right visible-xs-block">
                <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
            </ul>
        </div>

        <div class="navbar-collapse collapse" id="navbar-mobile">
            <ul class="nav navbar-nav">
                <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <img class="avatar" data-name="<?php echo session()->get('fname'); ?>"
                            data-last-name="<?php echo session()->get('lname'); ?>" alt="">
                        <span><?php echo session()->get('username'); ?></span>
                        <i class="caret"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li <?php echo menuActive('account');?>>
                            <a href="<?php echo base_url('/user/update'); ?>"><i class=" icon-user"></i>
                                Account</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url('logout'); ?>"><i class="icon-switch2"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- /main navbar -->