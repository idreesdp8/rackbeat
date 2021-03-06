<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('frontend/layout/meta_tags'); ?>
    <title>Profile</title>
</head>

<body>
    <?php $this->load->view('frontend/layout/header'); ?>
    <!-- Page content -->

    <div class="page-content">
        <?php $this->load->view('frontend/layout/sidebar'); ?>
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Page header -->
            <div class="page-header page-header-light">
                <div class="page-header-content header-elements-md-inline">
                    <div class="page-title d-flex">
                        <h4>
                            <i class="icon-arrow-left52 mr-2"></i>
                            <span class="font-weight-semibold">Profile</span>
                        </h4>
                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>
                </div>
            </div>
            <!-- /page header -->

            <!-- Content area -->
            <div class="content">
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
                <!-- Main charts -->
                <div class="row">
                    <div class="col-xl-8" style="margin: auto;">
                        <!-- Basic responsive table -->
                        <div class="card">
                            <!-- <div class="card-header header-elements-inline">
                                <h5 class="card-title">Basic layout</h5>
                                <div class="header-elements">
                                    <div class="list-icons">
                                        <a class="list-icons-item" data-action="collapse"></a>
                                        <a class="list-icons-item" data-action="reload"></a>
                                        <a class="list-icons-item" data-action="remove"></a>
                                    </div>
                                </div>
                            </div> -->

                            <div class="card-body">
                                <form action="<?php echo site_url('account/profile'); ?>" method="post" id="datas_form">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="form-group">
                                                <label>Username:</label>
                                                <input type="text" class="form-control" name="username" value="<?php echo $user->username ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="form-group">
                                                <label>Email:</label>
                                                <input type="text" class="form-control" name="email" value="<?php echo $user->email ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="form-group">
                                                <label>First Name:</label>
                                                <input type="text" class="form-control" name="fname" value="<?php echo $user->fname ?>" data-error="#fname1">
                                                <span id="fname1" class="text-danger"><?php echo form_error('fname'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="form-group">
                                                <label>Last Name:</label>
                                                <input type="text" class="form-control" name="lname" value="<?php echo $user->lname ?>" data-error="#lname1">
                                                <span id="lname1" class="text-danger"><?php echo form_error('lname'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="form-group">
                                                <label>Password: <span class="text-muted">Leave the field empty if you do not want to change password.</span></label>
                                                <input type="password" class="form-control" name="password">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /basic responsive table -->
                    </div>
                </div>
                <!-- /main charts -->
            </div>
            <!-- /main content -->
        </div>
    </div>
    <!-- /page content -->


    <script>
        $(document).ready(function() {
            $('#profile-menu').addClass('active');
            $('.form-input-styled').uniform({
                fileButtonClass: 'action btn bg-pink-400'
            });
        });
        $(document).ready(function() {
            var validator = $('#datas_form').validate({
                rules: {
                    fname: {
                        required: true,
                    },
                    lname: {
                        required: true
                    }
                },
                messages: {
                    fname: {
                        required: "First Name is required field"
                    },
                    lname: {
                        required: "Last Name is required field"
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