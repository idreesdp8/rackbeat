<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('admin/layout/meta_tags'); ?>
    <title>Add User</title>
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
                            <span class="breadcrumb-item active">Add User</span>
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
                        <h5 class="card-title">Add User</h5>
                    </div>

                    <form action="<?php echo admin_base_url() ?>users/add" method="post" enctype="multipart/form-data" id="datas_form">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Enter first name" name="fname" data-error="#fname1">
                                                <span id="fname1" class="text-danger" generated="true"><?php echo form_error('fname'); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" placeholder="Enter last name" name="lname">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Username <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter username" name="username" data-error="#username1">
                                        <span id="username1" class="text-danger" generated="true"><?php echo form_error('username'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" placeholder="Enter email" name="email" data-error="#email1">
                                        <span id="email1" class="text-danger" generated="true"><?php echo form_error('email'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" placeholder="Enter password" name="password" data-error="#password1">
                                        <span id="password1" class="text-danger" generated="true"><?php echo form_error('password'); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control select">
                                            <option value="0">Inactive</option>
                                            <option value="1" selected>Active</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Api Key</label>
                                        <textarea name="api_key" class="form-control" id="api_key" cols="30" rows="3" placeholder="Enter Api Key" data-error="#api_key1"></textarea>
                                        <span id="api_key1" class="text-danger" generated="true"><?php echo form_error('api_key'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary"><i class="icon-add mr-2"></i> Save</button>
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
            $('#sidebar_user_add a').addClass('active');

            var validator = $('#datas_form').validate({
                rules: {
                    fname: {
                        required: true
                    },
                    username: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
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
                    username: {
                        required: "Username is required field"
                    },
                    email: {
                        required: "Email is required field",
                        email: "Please enter a valid Email address!"
                    },
                    password: {
                        required: "Password is required field",
                        minlength: "Minimum 5 characters needed!"
                    },
                    api_key: {
                        required: "Api Key is required field",
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