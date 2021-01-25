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
        <form class="login-form" action="<?php echo site_url('account/signin'); ?>" method="post">
          <div class="card mb-0">
            <div class="card-body">
              <div class="text-center mb-3">
                <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                <h5 class="mb-0">Login to your account</h5>
                <span class="d-block text-muted">Your credentials</span>
              </div>
              <div class="form-group form-group-feedback form-group-feedback-left">
                <input type="text" name="username" class="form-control" placeholder="Username" />
                <div class="form-control-feedback">
                  <i class="icon-user text-muted"></i>
                </div>
              </div>

              <div class="form-group form-group-feedback form-group-feedback-left">
                <input type="password" name="password" class="form-control" placeholder="Password" />
                <div class="form-control-feedback">
                  <i class="icon-lock2 text-muted"></i>
                </div>
              </div>

              <div class="form-group d-flex align-items-center">
                <div class="form-check mb-0">
                  <label class="form-check-label">
                    <input type="checkbox" name="remember" class="form-input-styled" checked data-fouc />
                    Remember
                  </label>
                </div>

                <a href="javascript:void(0)" class="ml-auto">Forgot password?</a>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">
                  Sign in <i class="icon-circle-right2 ml-2"></i>
                </button>
              </div>
              <div class="form-group text-center text-muted content-divider">
                <span class="px-2">Don't have an account?</span>
              </div>

              <div class="form-group">
                <a href="<?php echo user_base_url(); ?>register" class="btn btn-light btn-block">Sign up</a>
              </div>

              <span class="form-text text-center text-muted">By continuing, you're confirming that you've read our
                <a href="javascript:void(0)">Terms &amp; Conditions</a> and
                <a href="javascript:void(0)">Cookie Policy</a>
              </span>
            </div>
          </div>
        </form>
        <!-- /login form -->
      </div>
      <!-- /content area -->
    </div>
    <!-- /main content -->
  </div>
  <!-- /page content -->
</body>

</html>