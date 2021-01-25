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
                <!-- Main charts -->
                <div class="row">
                    <div class="col-xl-12">
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
                                <form action="#">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label>Username:</label>
                                                <input type="text" class="form-control" name="username" value="<?php echo $user->username ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label>Email:</label>
                                                <input type="text" class="form-control" name="email" value="<?php echo $user->email ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label>First Name:</label>
                                                <input type="text" class="form-control" name="fname">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label>Last Name:</label>
                                                <input type="text" class="form-control" name="lname">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label>Password: <span class="text-muted">Leave the field empty if you do not want to change password.</span></label>
                                                <input type="password" class="form-control" name="password">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label>Your Profile Image:</label>
                                                <input type="file" class="form-input-styled" name="image" data-fouc>
                                                <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label>Phone:</label>
                                                <input type="text" class="form-control" name="phone_no">
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label>Mobile:</label>
                                                <input type="text" class="form-control" name="mobile_no">
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="form-group">
                                                <label>Address:</label>
                                                <textarea name="address" cols="30" rows="3" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="form-group">
                                                <label>City:</label>
                                                <input type="text" class="form-control" name="city">
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="form-group">
                                                <label>State:</label>
                                                <input type="text" class="form-control" name="state">
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="form-group">
                                                <label>Country:</label>
                                                <input type="text" class="form-control" name="country">
                                            </div>
                                        </div>
                                        <div class="col-xl-3">
                                            <div class="form-group">
                                                <label>Zip:</label>
                                                <input type="text" class="form-control" name="zip">
                                            </div>
                                        </div>
                                    </div>



                                    <!-- <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
                                    </div> -->
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
    </script>
</body>

</html>