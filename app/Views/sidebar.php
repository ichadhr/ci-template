<div class="sidebar sidebar-main sidebar-default">
    <div class="sidebar-content">

        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">

            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li <?php echo menuActive('dashboard'); ?> <?php echo menuBase(); ?> >
                        <a href="<?php echo base_url('dashboard'); ?>"><i
                                class="<?php echo htmlspecialchars(config('SiteConfig')->iconDashboard); ?>"></i>
                            <span><?php echo htmlspecialchars(lang('Interface.menu.sidebar.dashboard')); ?></span></a>
                    </li>

                    <li <?php echo menuActive('user'); ?> >
                        <a href="<?php echo base_url('user'); ?>"><i
                                class="<?php echo htmlspecialchars(config('SiteConfig')->iconUser); ?>"></i>
                            <span><?php echo htmlspecialchars(lang('Interface.menu.sidebar.user')); ?></span></a>
                    </li>

                </ul>
            </div>

        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->