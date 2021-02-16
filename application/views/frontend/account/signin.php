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
  <!-- for validation -->
  <script src="<?php echo user_asset_url(); ?>global_assets/jquery.validate.js"></script>

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
        <form class="login-form" id="datas_form" action="<?php echo site_url('account/signin'); ?>" method="post">
          <div class="card mb-0">
            <div class="card-body">
              <div class="text-center mb-3">
                <!-- <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i> -->
                <div class="p-3">
                  <svg xmlns="http://www.w3.org/2000/svg" width="154" height="50" viewBox="0 0 154 50" class="m-auto">
                    <defs>
                      <linearGradient id="a" x1="23.684%" x2="71.636%" y1="85.965%" y2="-6.574%">
                        <stop stop-color="#00A7FA" offset="0%" />
                        <stop stop-color="#5600D8" offset="100%" />
                      </linearGradient>
                      <linearGradient id="b" x1="-81.731%" x2="25.758%" y1="74.099%" y2="-53.886%">
                        <stop stop-color="#00A7FA" offset="0%" />
                        <stop stop-color="#5600D8" offset="100%" />
                      </linearGradient>
                      <linearGradient id="c" x1="88.327%" x2="-22.32%" y1="45.614%" y2="160.65%">
                        <stop stop-color="#00A7FA" offset="0%" />
                        <stop stop-color="#5600D8" offset="100%" />
                      </linearGradient>
                    </defs>
                    <g fill="none" fill-rule="evenodd">
                      <path fill="#052D66" d="M13.363183,16.3721159 L9.31223656,16.3721159 L6.07641961,10.5547374 L3.50752677,10.5547374 L3.50752677,16.3721159 L0,16.3721159 L0,0 L7.70667853,0 C11.1401026,0 13.2643794,2.23367698 13.2643794,5.27736868 C13.2643794,8.14923908 11.4118124,9.72017673 9.63334817,10.137457 L13.363183,16.3721159 Z M7.21266068,7.48649975 C8.59591067,7.48649975 9.65804906,6.65193913 9.65804906,5.25282278 C9.65804906,3.90279823 8.59591067,3.0682376 7.21266068,3.0682376 L3.50752677,3.0682376 L3.50752677,7.48649975 L7.21266068,7.48649975 Z M26.0961594,16.3721159 L22.9344451,16.3721159 L22.9344451,14.85027 C21.9958112,16.0284732 20.7113648,16.6666667 19.2540121,16.6666667 C16.2652041,16.6666667 13.968021,14.4084438 13.968021,10.4320079 C13.968021,6.57830142 16.2158023,4.22189494 19.2540121,4.22189494 C20.661963,4.22189494 21.9711103,4.81099656 22.9344451,6.03829161 L22.9344451,4.51644575 L26.0961594,4.51644575 L26.0961594,16.3721159 Z M20.2420478,13.8929799 C21.2794853,13.8929799 22.4157264,13.3284242 22.9344451,12.5429553 L22.9344451,8.37015218 C22.4157264,7.58468336 21.2794853,6.99558174 20.2420478,6.99558174 C18.4388826,6.99558174 17.203838,8.39469809 17.203838,10.4320079 C17.203838,12.4938635 18.4388826,13.8929799 20.2420478,13.8929799 Z M34.4323769,16.6666667 C30.7766448,16.6666667 28.1089483,14.0893471 28.1089483,10.4320079 C28.1089483,6.79921453 30.7766448,4.22189494 34.4323769,4.22189494 C36.8777653,4.22189494 38.3598188,5.27736868 39.1502474,6.35738832 L37.1000733,8.27196858 C36.5319528,7.43740795 35.6674215,6.99558174 34.5805822,6.99558174 C32.6786135,6.99558174 31.3447653,8.37015218 31.3447653,10.4320079 C31.3447653,12.4938635 32.6786135,13.8929799 34.5805822,13.8929799 C35.6674215,13.8929799 36.5319528,13.4020619 37.1000733,12.5920471 L39.1502474,14.5066274 C38.3598188,15.586647 36.8777653,16.6666667 34.4323769,16.6666667 Z M52.525447,16.3721159 L48.5980051,16.3721159 L45.4362908,11.8065783 L44.003639,13.3284242 L44.003639,16.3721159 L40.8666257,16.3721159 L40.8666257,0 L44.003639,0 L44.003639,9.79381443 L48.5239024,4.51644575 L52.3772417,4.51644575 L47.6593712,9.89199804 L52.525447,16.3721159 Z M56.9095217,12.5675012 C57.4529413,13.3284242 58.5891824,13.8929799 59.6266199,13.8929799 C61.4297851,13.8929799 62.6401288,12.4938635 62.6401288,10.4320079 C62.6401288,8.39469809 61.4297851,6.99558174 59.6266199,6.99558174 C58.5891824,6.99558174 57.4529413,7.58468336 56.9095217,8.37015218 L56.9095217,12.5675012 Z M56.9095217,16.3721159 L53.7725083,16.3721159 L53.7725083,0 L56.9095217,0 L56.9095217,6.03829161 C57.8481556,4.81099656 59.1820038,4.22189494 60.5899547,4.22189494 C63.6281645,4.22189494 65.8759458,6.57830142 65.8759458,10.4320079 C65.8759458,14.4084438 63.6034636,16.6666667 60.5899547,16.6666667 C59.1573029,16.6666667 57.8481556,16.0284732 56.9095217,14.85027 L56.9095217,16.3721159 Z M73.5205383,16.6666667 C69.889507,16.6666667 67.1477079,14.2366225 67.1477079,10.4320079 C67.1477079,6.99558174 69.7166008,4.22189494 73.3229311,4.22189494 C76.9045606,4.22189494 79.3005472,6.87285223 79.3005472,10.7265587 L79.3005472,11.4629357 L70.4329267,11.4629357 C70.6552347,12.9111438 71.8408776,14.113893 73.8663508,14.113893 C74.8790874,14.113893 76.2623374,13.6966127 77.028065,12.9602356 L78.4360159,15.0220913 C77.2503731,16.1021109 75.3731052,16.6666667 73.5205383,16.6666667 Z M76.2870382,9.30289642 C76.1882347,8.17378498 75.3978061,6.77466863 73.3229311,6.77466863 C71.3715606,6.77466863 70.5317302,8.12469318 70.4082258,9.30289642 L76.2870382,9.30289642 Z M92.6016441,16.3721159 L89.4399298,16.3721159 L89.4399298,14.85027 C88.5012959,16.0284732 87.2168495,16.6666667 85.7594968,16.6666667 C82.7706888,16.6666667 80.4735058,14.4084438 80.4735058,10.4320079 C80.4735058,6.57830142 82.721287,4.22189494 85.7594968,4.22189494 C87.1674477,4.22189494 88.476595,4.81099656 89.4399298,6.03829161 L89.4399298,4.51644575 L92.6016441,4.51644575 L92.6016441,16.3721159 Z M86.7475325,13.8929799 C87.78497,13.8929799 88.9212111,13.3284242 89.4399298,12.5429553 L89.4399298,8.37015218 C88.9212111,7.58468336 87.78497,6.99558174 86.7475325,6.99558174 C84.9443674,6.99558174 83.7093227,8.39469809 83.7093227,10.4320079 C83.7093227,12.4938635 84.9443674,13.8929799 86.7475325,13.8929799 Z M99.3817054,16.6666667 C97.1833259,16.6666667 96.022384,15.5375552 96.022384,13.4020619 L96.022384,7.24104075 L94.0463125,7.24104075 L94.0463125,4.51644575 L96.022384,4.51644575 L96.022384,1.27638684 L99.1593973,1.27638684 L99.1593973,4.51644575 L101.580085,4.51644575 L101.580085,7.24104075 L99.1593973,7.24104075 L99.1593973,12.5675012 C99.1593973,13.3284242 99.5546116,13.8929799 100.246237,13.8929799 C100.715554,13.8929799 101.16017,13.7211586 101.333076,13.5247914 L102,15.9057437 C101.530683,16.3230241 100.690853,16.6666667 99.3817054,16.6666667 Z" transform="translate(52 16.667)" />
                      <g fill-rule="nonzero">
                        <polygon fill="url(#a)" points="32.544 7.333 42 13 20.79 26 11.771 19.888" />
                        <polygon fill="url(#a)" points="20.944 0 29 5 7.056 18 0 13" />
                        <polygon fill="url(#b)" points="0 13 21 25 21 50 0 37" />
                        <polygon fill="url(#c)" points="21 13 42 25 42 50 21 37" transform="matrix(-1 0 0 1 63 0)" />
                      </g>
                    </g>
                  </svg>
                </div>
                <h5 class="mb-0">Login to your account</h5>
                <span class="d-block text-muted">Your credentials</span>
              </div>
              <div class="form-group form-group-feedback form-group-feedback-left">
                <input type="text" name="username" class="form-control" placeholder="Username" data-error="#username1" />
                <div class="form-control-feedback">
                  <i class="icon-user text-muted"></i>
                </div>
                <span id="username1" class="text-danger"><?php echo form_error('username'); ?></span>
              </div>

              <div class="form-group form-group-feedback form-group-feedback-left">
                <input type="password" name="password" class="form-control" placeholder="Password" data-error="#password1" />
                <div class="form-control-feedback">
                  <i class="icon-lock2 text-muted"></i>
                </div>
                <span id="password1" class="text-danger"><?php echo form_error('password'); ?></span>
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


  <script type="text/javascript">
    $(document).ready(function() {
      var validator = $('#datas_form').validate({
        rules: {
          username: {
            required: true,
          },
          password: {
            required: true
          }
        },
        messages: {
          username: {
            required: "Username is required field"
          },
          password: {
            required: "Password is required field"
          }
        },
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        },
        submitHandler: function() {
          document.forms["datas_form"].submit();
        }
      });
    });
  </script>
</body>

</html>