<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('frontend/layout/meta_tags'); ?>
    <title>Labels</title>
    <style>
        #preview1 {
            display: none;
            background: #f3f3f3;
            padding: .625rem;
        }

        #preview2 {
            display: none;
            text-align: center;
        }

        #preview2 p {
            color: #d42f2f;
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
                            <span class="font-weight-semibold">Labels</span>
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
                <div class="row mb-3">
                    <!-- <div class="col-xl-12">
                        <ul class="pagination-flat pb-3 float-right twbs-flat pagination">
                            <li class="page-item prev disabled"><a href="#" class="page-link">Prev</a></li>
                            <li class="page-item active"><a href="#" class="page-link">1</a></li>
                            <li class="page-item"><a href="#" class="page-link">2</a></li>
                            <li class="page-item"><a href="#" class="page-link">3</a></li>
                            <li class="page-item"><a href="#" class="page-link">4</a></li>
                            <li class="page-item next"><a href="#" class="page-link">Next</a></li>
                        </ul>
                    </div> -->
                </div>

                <?php
                if ($products) :
                ?>
                    <div class="row">

                        <?php
                        foreach ($products as $product) :
                        ?>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header bg-light d-flex justify-content-between">
                                        <span class="font-size-sm text-uppercase font-weight-semibold">#<?php echo $product->number ?></span>

                                    </div>

                                    <div class="card-body">
                                        <h6 class="card-title">Name: <?php echo $product->name ?></h6>
                                        <p class="card-text">Group: <?php echo $product->group ? $product->group->name : 'null' ?></p>
                                        <p>Unit: <?php echo $product->unit ? $product->unit->number : 'null' ?></p>
                                    </div>

                                    <div class="card-footer d-flex justify-content-between">
                                        <span class="text-muted"></span>

                                        <ul class="list-inline mb-0">
                                            <button type="button" class="btn text-left">View</button>
                                            <button type="button" class="btn bg-indigo print" data-value="<?php echo $product->urlfriendly_number ?>" data-toggle="modal" data-target="#modal_theme_primary">Print</button>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endforeach;
                        ?>
                    </div>
                <?php
                endif;
                ?>
                <div id="modal_theme_primary" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-indigo">
                                <h6 class="modal-title">Print</h6>
                                <button type="button" class="close" data-dismiss="modal">×</button>
                            </div>

                            <form action="<?php echo site_url('prints/label'); ?>" method="post">
                                <div class="modal-body">
                                    <div class="row">
                                        <input type="hidden" name="product_id" id="product_id">
                                        <div class="col-md-6">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>Stock</label>
                                                    <input type="text" class="form-control" name="qty" id="qty" placeholder="">
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label>Designs</label>
                                                    <select name="design_id" id="design" class="form-control select">
                                                        <option value="">Choose Design</option>
                                                        <?php
                                                        if ($designs) :
                                                            foreach ($designs as $design) :
                                                        ?>
                                                                <option value="<?php echo $design->id ?>"><?php echo $design->name ?></option>
                                                        <?php
                                                            endforeach;
                                                        endif;
                                                        ?>
                                                    </select>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-12" id="preview1">
                                            <p class="item" style="font-size: 16px;">1234-42112-L</p>
                                            <p class="item" style="font-size: 20px; font-weight: bold;">24213S-23-231-1AJS</p>
                                            <div class="d-flex justify-content-between">
                                                <p class="item" id="item_qty" style="font-size: 14px;">Qty: 1</p>
                                                <p class="item" style="font-size: 14px;">Lot #: 24/01/2021</p>
                                            </div>
                                            <img id="preview_img" src="" alt="" style="padding: 10px; width: 100%;">
                                            <p class="item">Made in: United States of America</p>
                                        </div>
                                        <div class="col-md-12" id="preview2">
                                            <p>Barcode not available</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn bg-indigo" id="print">Print</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-xl-12">
                        <ul class="pagination-flat float-right twbs-flat pagination">
                            <li class="page-item prev disabled"><a href="#" class="page-link">Prev</a></li>
                            <li class="page-item active"><a href="#" class="page-link">1</a></li>
                            <li class="page-item"><a href="#" class="page-link">2</a></li>
                            <li class="page-item"><a href="#" class="page-link">3</a></li>
                            <li class="page-item"><a href="#" class="page-link">4</a></li>
                            <li class="page-item next"><a href="#" class="page-link">Next</a></li>
                        </ul>
                    </div>
                </div> -->
                <!-- /main charts -->
            </div>
            <!-- /main content -->
        </div>
    </div>
    <!-- /page content -->


    <script>
        $(document).ready(function() {
            $('#label-menu').addClass('active');
            const base_url = '<?php echo user_base_url() ?>';

            $('.print').click(function() {
                var id = $(this).attr('data-value');
                $('#product_id').val(id);
                // console.log(id);
                $.ajax({
                    url: base_url + 'label/get_product',
                    type: 'post',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        // console.log(response);
                        if (response.message === 200) {
                            $('#preview2').hide();
                            $('#preview1').show();
                            $('#print').attr('disabled', false);
                            if (response.data) {
                                $('#preview_img').attr('src', response.image);
                            }
                        } else {
                            $('#preview1').hide();
                            $('#preview2').show();
                            $('#print').attr('disabled', true);
                        }
                    }
                });
            });
            $('#design').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: base_url + 'designer/get_design',
                    type: 'post',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        // console.log(response);
                        if (response.message === 200) {
                            $('.item').css('font-family', response.data.font_style);
                        } else {
                            alert('Error: Something went wrong!');
                        }
                    }
                });
            });
            $('#qty').change(function() {
                $('#item_qty').html('Qty: ' + $(this).val());
            });

            $('#modal_theme_primary').on('hide.bs.modal', function() {
                $('#qty').val('');
                $('#item_qty').html('Qty: 1');
                $('.item').css('font-family', '');
                $('#design').val('');
                $('#product_id').val('');
                $('#select2-design-container').html('Choose Design');
                $('#select2-design-container').attr('title', 'Choose Design');
                $('#preview1').hide();
                $('#preview2').hide();
            });
        });
    </script>
</body>

</html>