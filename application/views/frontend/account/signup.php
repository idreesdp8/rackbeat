<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Rackbeat</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css" />
    <link href="<?php echo user_asset_url(); ?>global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo user_asset_url(); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo user_asset_url(); ?>css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo user_asset_url(); ?>css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo user_asset_url(); ?>css/components.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo user_asset_url(); ?>css/colors.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo user_asset_url(); ?>css/dp8.css" rel="stylesheet" type="text/css" />
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="<?php echo user_asset_url(); ?>global_assets/js/main/jquery.min.js"></script>
    <script src="<?php echo user_asset_url(); ?>global_assets/js/main/bootstrap.bundle.min.js"></script>
    <script src="<?php echo user_asset_url(); ?>global_assets/js/plugins/loaders/blockui.min.js"></script>
    <script src="<?php echo user_asset_url(); ?>global_assets/js/plugins/ui/ripple.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="<?php echo user_asset_url(); ?>global_assets/js/plugins/forms/styling/uniform.min.js"></script>

    <script src="<?php echo user_asset_url(); ?>js/app.js"></script>
    <script src="<?php echo user_asset_url(); ?>global_assets/js/demo_pages/login.js"></script>
    <!-- /theme JS files -->
</head>

<body>
    <!-- Page content -->
    <div class="page-content">
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Content area -->
            <div class="content d-flex justify-content-center align-items-center" style="flex-direction: column">
                <?php if ($this->session->flashdata('success_msg')) { ?>
                    <div class="alert alert-success no-border">
                        <button data-dismiss="alert" class="close" type="button"><span>×</span><span class="sr-only">Close</span></button>
                        <?php echo $this->session->flashdata('success_msg'); ?>
                    </div>
                <?php }
                if ($this->session->flashdata('error_msg')) { ?>
                    <div class="alert alert-danger no-border">
                        <button data-dismiss="alert" class="close" type="button"><span>×</span><span class="sr-only">Close</span></button>
                        <?php echo $this->session->flashdata('error_msg'); ?>
                    </div>
                <?php } ?>
                <!-- Login form -->
                <form class="login-form" action="<?php echo site_url('account/signup'); ?>" method="post">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <i class="icon-plus3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>
                                <h5 class="mb-0">Create account</h5>
                                <span class="d-block text-muted">All fields are required</span>
                            </div>

                            <div class="form-group text-center text-muted content-divider">
                                <span class="px-2">Your credentials</span>
                            </div>
                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="text" name="username" class="form-control" placeholder="Username">
                                <div class="form-control-feedback">
                                    <i class="icon-user-check text-muted"></i>
                                </div>
                                <!-- <span class="form-text text-danger"><i class="icon-cancel-circle2 mr-2"></i> This username is already taken</span> -->
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                <div class="form-control-feedback">
                                    <i class="icon-user-lock text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group text-center text-muted content-divider">
                                <span class="px-2">Your contacts</span>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="text" name="email" class="form-control" placeholder="Your email">
                                <div class="form-control-feedback">
                                    <i class="icon-mention text-muted"></i>
                                </div>
                            </div>
                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="text" name="confirm_email" class="form-control" placeholder="Repeat email">
                                <div class="form-control-feedback">
                                    <i class="icon-mention text-muted"></i>
                                </div>
                            </div>
                            <button type="submit" class="btn bg-teal-400 btn-block legitRipple">Register <i class="icon-circle-right2 ml-2"></i></button>
                        </div>
                    </div>
                </form>
                <!-- /Sign-up form -->
            </div>
            <!-- /content area -->
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
</body>

</html>