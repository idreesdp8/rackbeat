<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('admin/layout/meta_tags'); ?>
    <title>Update User</title>
    <style>
        .file-preview-frame {
            margin: auto !important;
        }

        .file-thumbnail-footer {
            display: none;
        }
    </style>
</head>

<body>
    <?php $this->load->view('admin/layout/header'); ?>
    <div class="page-content">
        <?php $this->load->view('admin/layout/sidebar'); ?>
        <div class="content-wrapper">
            <div class="page-header page-header-light">
                <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                    <div class="d-flex">
                        <div class="breadcrumb">
                            <a href="<?php echo admin_base_url(); ?>dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                            <a href="<?php echo admin_base_url(); ?>users" class="breadcrumb-item"> Users</a>
                            <span class="breadcrumb-item active">Update User</span>
                        </div>

                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>
                </div>
            </div>
            <div class="content">
                <?php $this->load->view('alert/alert'); ?>
                <!-- Basic layout-->
                <div class="card col-lg-8 m-auto">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Update User</h5>
                    </div>

                    <form action="<?php echo admin_base_url() ?>users/update" method="post" enctype="multipart/form-data" id="datas_form">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name <span class="text-danger">*</span></label>
                                                <input type="hidden" name="id" value="<?php echo $user->id ?>">
                                                <input type="text" class="form-control" placeholder="Enter first name" name="fname" value="<?php echo $user->fname ?>" data-error="#fname1">
                                                <span id="fname1" class="text-danger" generated="true"><?php echo form_error('fname'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" placeholder="Enter last name" name="lname" value="<?php echo $user->lname ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Username <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter username" value="<?php echo $user->username ?>" name="username" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" placeholder="Enter email" name="email" value="<?php echo $user->email ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Password <span class="text-info">Leave password field empty if you do not want to change it!</span></label>
                                        <input type="password" class="form-control" placeholder="Enter password" name="password" data-error="#password1">
                                        <span id="password1" class="text-danger" generated="true"><?php echo form_error('password'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control select">
                                            <option value="0" <?php echo !$user->status ? 'selected' : '' ?>>Inactive</option>
                                            <option value="1" <?php echo $user->status ? 'selected' : '' ?>>Active</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Api Key</label>
                                        <textarea name="api_key" class="form-control" id="api_key" cols="30" rows="3" placeholder="Enter Api Key" data-error="#api_key1"><?php echo $user->api_key ?></textarea>
                                        <span id="api_key1" class="text-danger" generated="true"><?php echo form_error('api_key'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary"><i class="icon-pencil mr-2"></i> Update</button>
                                <a href="<?php echo $this->agent->referrer(); ?>" type="button" class="btn bg-slate"><i class="icon-cancel-circle2 mr-2"></i> Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /basic layout -->

            </div>

            <?php $this->load->view('admin/layout/footer'); ?>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#sidebar_user').addClass('nav-item-open');
            $('#sidebar_user ul').first().css('display', 'block');
            $('#sidebar_user_view a').addClass('active');

            var validator = $('#datas_form').validate({
                rules: {
                    fname: {
                        required: true
                    },
                    password: {
                        minlength: 5
                    },
                    api_key: {
                        required: true
                    }
                },
                messages: {
                    fname: {
                        required: "First name is required field"
                    },
                    password: {
                        minlength: "Minimum 5 characters needed!"
                    },
                    api_key: {
                        required: "Api Key is required field"
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