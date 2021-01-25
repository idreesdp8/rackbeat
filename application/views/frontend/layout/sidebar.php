<!-- Main sidebar -->
<div class="sidebar sidebar-light sidebar-main sidebar-expand-md">
    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        <span class="font-weight-semibold">Navigation</span>
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->

    <!-- Sidebar content -->
    <div class="sidebar-content">
        <!-- User menu -->
        <div class="sidebar-user-material">
            <div class="sidebar-user-material-body">
                <div class="card-body text-center">
                    <a href="#">
                        <img src="<?php echo user_asset_url(); ?>global_assets/images/placeholders/placeholder.jpg" class="img-fluid rounded-circle shadow-1 mb-3" width="80" height="80" alt="" />
                    </a>
                    <h6 class="mb-0 text-white text-shadow-dark"><?php echo $this->session->userdata('vs_user_username'); ?></h6>
                    <!-- <span class="font-size-sm text-white text-shadow-dark">Santa Ana, CA</span> -->
                </div>
            </div>
        </div>
        <!-- /user menu -->

        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">
                <!-- Main -->

                <li class="nav-item">
                    <a href="<?php echo user_base_url() ?>dashboard" class="nav-link" id="label-menu">
                        <i class="fas fa-print"></i>
                        <span> Labels </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo user_base_url() ?>designer" class="nav-link" id="designer-menu">
                        <i class="fa fa-barcode" aria-hidden="true"></i>
                        <span>Designer</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo user_base_url() ?>config" class="nav-link" id="config-menu">
                        <i class="fas fa-atom"></i>
                        <span>Config</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-handshake"></i>
                        <span>Help</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo user_base_url(); ?>profile" class="nav-link" id="profile-menu">
                        <i class="icon-user-plus"></i>
                        <span>My profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo site_url('account/logoff'); ?>" class="nav-link">
                        <i class="fas fa-power-off"></i>
                        <span>Logout</span>
                    </a>
                </li>

                <!-- /main -->
            </ul>
        </div>
        <!-- /main navigation -->
    </div>
    <!-- /sidebar content -->
</div>
<!-- /main sidebar -->