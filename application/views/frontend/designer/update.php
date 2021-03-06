<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('frontend/layout/meta_tags'); ?>
    <title>Update Design</title>
    <style>
        p {
            margin: 0px;
        }
    </style>
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
                            <span class="font-weight-semibold">Designer - Update Design</span>
                        </h4>
                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>
                </div>
            </div>
            <!-- /page header -->

            <!-- Content area -->
            <div class="content">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title">Update Design</h6>
                            </div>
                            <div class="card-body">
                                <form id="datas_form" action="<?php echo site_url('designer/update'); ?>" method="post">
                                    <input type="hidden" name="id" value="<?php echo $design->id ?>">
                                    <div class="row">
                                        <!-- <div class="col-md-12">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>Rackbeat Token:</label>
                                                    <textarea rows="5" cols="5" class="form-control" placeholder="Enter your token here"></textarea>
                                                </div>
                                            </fieldset>
                                        </div> -->
                                        <div class="col-md-6">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="name" id="name" value="<?php echo $design->name ?>" class="form-control" data-error="#name1">
                                                    <span id="name1" class="text-danger"><?php echo form_error('name'); ?></span>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>Type</label>
                                                    <input type="text" name="type" id="type" value="<?php echo $design->type ?>" class="form-control" data-error="#type1">
                                                    <span id="type1" class="text-danger"><?php echo form_error('type'); ?></span>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>Width (cm)</label>
                                                    <input type="number" class="form-control" name="width" value="<?php echo $design->width ?>" id="width" placeholder="" min="0" data-error="#width1">
                                                    <span id="width1" class="text-danger"><?php echo form_error('width'); ?></span>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>Height (cm)</label>
                                                    <input type="number" class="form-control" name="height" value="<?php echo $design->height ?>" id="height" placeholder="" min="0" data-error="#height1">
                                                    <span id="height1" class="text-danger"><?php echo form_error('height'); ?></span>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>W Location</label>
                                                    <select name="w_location" id="w_location" class="form-control select" data-error="#w_location1">
                                                        <option value="">Choose W Location</option>
                                                        <option value="right" <?php echo $design->w_location == 'right' ? 'selected' : '' ?>>Right</option>
                                                        <option value="left" <?php echo $design->w_location == 'left' ? 'selected' : '' ?>>Left</option>
                                                    </select>
                                                    <span id="w_location1" class="text-danger"><?php echo form_error('w_location'); ?></span>
                                                    <!-- <input type="number" class="form-control" name="w_location" id="w_location" placeholder="" min="0" /> -->
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>H Location</label>
                                                    <select name="h_location" id="h_location" class="form-control select" data-error="#h_location1">
                                                        <option value="">Choose W Location</option>
                                                        <option value="top" <?php echo $design->h_location == 'top' ? 'selected' : '' ?>>Top</option>
                                                        <option value="bottom" <?php echo $design->h_location == 'bottom' ? 'selected' : '' ?>>Bottom</option>
                                                    </select>
                                                    <span id="h_location1" class="text-danger"><?php echo form_error('h_location'); ?></span>
                                                    <!-- <input type="number" class="form-control" name="h_location" id="h_location" placeholder="" min="0" /> -->
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>Size (cm)</label>
                                                    <input type="number" class="form-control" name="size" id="size" value="<?php echo $design->size ?>" placeholder="" min="0" data-error="#size1">
                                                    <span id="size1" class="text-danger"><?php echo form_error('size'); ?></span>
                                                </div>
                                            </fieldset>
                                        </div>

                                        <div class="col-md-6">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>Font Style</label>
                                                    <select name="font_style" id="font_style" class="form-control select" data-error="#font_style1">
                                                        <option value="">Choose Font Style</option>
                                                        <option value="Roboto" <?php echo $design->font_style == 'Roboto' ? 'selected' : '' ?>>Roboto</option>
                                                        <option value="Arial" <?php echo $design->font_style == 'Arial' ? 'selected' : '' ?>>Arial</option>
                                                        <option value="serif" <?php echo $design->font_style == 'serif' ? 'selected' : '' ?>>Serif</option>
                                                        <option value="cursive" <?php echo $design->font_style == 'cursive' ? 'selected' : '' ?>>Cursive</option>
                                                        <option value="fantasy" <?php echo $design->font_style == 'fantasy' ? 'selected' : '' ?>>Fantasy</option>
                                                        <option value="monospace" <?php echo $design->font_style == 'monospace' ? 'selected' : '' ?>>Monospace</option>
                                                    </select>
                                                    <span id="font_style1" class="text-danger"><?php echo form_error('font_style'); ?></span>
                                                    <!-- <input type="text" class="form-control" placeholder="" name="font_style" id="font_style"/> -->
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">

                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title">Preview</h6>
                            </div>
                            <div class="card-body" style="padding-top: 1.25rem; background: #f3f3f3;">
                                <p class="item" style="font-size: 16px;">1234-42112-L</p>
                                <p class="item" style="font-size: 20px; font-weight: bold;">24213S-23-231-1AJS</p>
                                <div class="d-flex justify-content-between">
                                    <p class="item" style="font-size: 14px;">Qty: 1</p>
                                    <p class="item" style="font-size: 14px;">Lot #: 24/01/2021</p>
                                </div>
                                <img src="<?php echo $default_barcode; ?>" alt="" style="padding: 10px; width: 100%;">
                                <p class="item">Made in: United States of America</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /main content -->
        </div>
    </div>
    <!-- /page content -->


    <script>
        $(document).ready(function() {
            $('#designer-menu').addClass('active');

            var validator = $('#datas_form').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    type: {
                        required: true,
                    },
                    width: {
                        required: true,
                        min: '1'
                    },
                    height: {
                        required: true,
                        min: '1'
                    },
                    w_location: {
                        required: true,
                    },
                    h_location: {
                        required: true,
                    },
                    size: {
                        required: true,
                    },
                    font_style: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "Name is required field"
                    },
                    type: {
                        required: "Type is required field"
                    },
                    height: {
                        required: "Height is required field",
                        min: "Height must be greater than 0"
                    },
                    width: {
                        required: "Width is required field",
                        min: "Width must be greater than 0"
                    },
                    w_location: {
                        required: "W Location is required field"
                    },
                    h_location: {
                        required: "H Location is required field"
                    },
                    size: {
                        required: "Size is required field"
                    },
                    font_style: {
                        required: "Font Style is required field"
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

            $('.item').css('font-family', $('#font_style').val());

            $('#font_style').change(function() {
                $('.item').css('font-family', $(this).val());
            });
        });
    </script>
</body>

</html>