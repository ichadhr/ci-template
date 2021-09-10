<div class="navbar navbar-default navbar-fixed-bottom footer">
            <ul class="nav navbar-nav visible-xs-block">
                <li><a class="text-center collapsed" data-toggle="collapse" data-target="#footer"><i class="icon-circle-up2"></i></a></li>
            </ul>

            <div class="navbar-collapse collapse" id="footer">
                <div class="navbar-text">
                &copy; <?php call_user_func(function (string $y) {
	$c = date('Y');
	echo htmlspecialchars($y . (($y != $c) ? ' - ' . $c : ''));
}, config('SiteConfig')->startDev);
						echo htmlspecialchars(' ' . config('SiteConfig')->appName);
						?>.
                </div>

                <div class="navbar-right">
                    <ul class="nav navbar-nav navbar-footer">
                        <li><a href="javascript:;"><?php echo htmlspecialchars(config('SiteConfig')->appVersion); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /footer -->

        <!-- Core JS files -->
        <script type="text/javascript" src="<?php echo htmlspecialchars(base_url('assets/js/plugins/loaders/pace.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo htmlspecialchars(base_url('assets/js/core/libraries/jquery.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo htmlspecialchars(base_url('assets/js/core/libraries/bootstrap.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo htmlspecialchars(base_url('assets/js/plugins/loaders/blockui.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo htmlspecialchars(base_url('assets/js/plugins/notifications/sweet_alert.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo htmlspecialchars(base_url('assets/themes/plugins/initial/initial.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo htmlspecialchars(base_url('assets/themes/js/custom.min.js')); ?>"></script>
        <!-- /core JS files -->
