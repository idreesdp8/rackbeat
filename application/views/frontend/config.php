<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('frontend/layout/meta_tags'); ?>
    <title>Config</title>
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
                            <span class="font-weight-semibold">Config</span>
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
                            <div class="card-body">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>Rackbeat Token:</label>


                                                    <textarea rows="5" cols="5" class="form-control" placeholder="Enter your token here"></textarea>
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>Label height:</label>
                                                    <input type="text" class="form-control" placeholder="" />
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>Label width:</label>
                                                    <input type="text" class="form-control" placeholder="" />
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>EAN barcode width:</label>
                                                    <input type="text" class="form-control" placeholder="" />
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>EAN barcode height:</label>
                                                    <input type="text" class="form-control" placeholder="" />
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>128 barcode width:</label>
                                                    <input type="text" class="form-control" placeholder="" />
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>128 barcode height:</label>
                                                    <input type="text" class="form-control" placeholder="" />
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>UPC barcode width:</label>
                                                    <input type="text" class="form-control" placeholder="" />
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>UPC barcode height:</label>
                                                    <input type="text" class="form-control" placeholder="" />
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>Don't show border?</label>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span class="checked"><input type="checkbox" class="form-check-input-styled" checked="" data-fouc=""></span></div>

                                                        </label>
                                                    </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>Rotate 90 degrees?</label>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div class="uniform-checker"><span class="checked"><input type="checkbox" class="form-check-input-styled" checked="" data-fouc=""></span></div>

                                                        </label>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">
                                            Submit form <i class="icon-paperplane ml-2"></i>
                                        </button>
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
            $('#config-menu').addClass('active');
        });
    </script>
</body>

</html>