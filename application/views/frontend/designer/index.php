<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('frontend/layout/meta_tags'); ?>
    <title>Designer</title>
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
                            <span class="font-weight-semibold">Designer</span>
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
                <div class="row mb-3">
                    <div class="col-xl-4">
                        <a href="<?php echo user_base_url() ?>designer/create" type="button" class="btn btn-primary btn-sm">Add Design</a>
                    </div>
                    <!-- <div class="col-xl-8">
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
                <!-- Main charts -->
                <?php
                if ($designs) :
                ?>
                    <div class="row">
                        <?php
                        foreach ($designs as $design) :
                        ?>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header bg-light d-flex justify-content-between">
                                        <span class="font-size-sm text-uppercase font-weight-semibold">Name: <?php echo $design->name ?></span>
                                        <span class="preview" data-toggle="modal" data-target="#modal_onshow" data-value="<?php echo $design->id ?>"><i class="fas fa-eye"></i></span>
                                    </div>

                                    <div class="card-body">
                                        <h6 class="card-title">Type: <?php echo $design->type ?></h6>
                                        <p class="card-text">Width: <?php echo $design->width ?>cm</p>
                                        <p>Height: <?php echo $design->height ?>cm</p>
                                        <p>W Location: <?php echo ucfirst($design->w_location) ?></p>
                                        <p>H Location: <?php echo ucfirst($design->h_location) ?></p>
                                        <p>Size: <?php echo $design->size ?>cm</p>
                                        <p>Font Style: <?php echo ucfirst($design->font_style) ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endforeach;
                        ?>
                        <!-- <div class="col-md-4">
                        <div class="card">
                            <div class="card-header bg-light d-flex justify-content-between">
                                <span class="font-size-sm text-uppercase font-weight-semibold">Name: Tux</span>

                            </div>

                            <div class="card-body">
                                <h6 class="card-title">Type: Amet</h6>
                                <p class="card-text">Width: 4cm</p>
                                <p>Heigh: 6cm"</p>
                                <p>W Location: Right</p>
                                <p>H Location: Top</p>
                                <p>Size: 10cm</p>
                                <p>Font Style: Poppins</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header bg-light d-flex justify-content-between">
                                <span class="font-size-sm text-uppercase font-weight-semibold">Name: Tux</span>

                            </div>

                            <div class="card-body">
                                <h6 class="card-title">Type: Amet</h6>
                                <p class="card-text">Width: 4cm</p>
                                <p>Heigh: 6cm"</p>
                                <p>W Location: Right</p>
                                <p>H Location: Top</p>
                                <p>Size: 10cm</p>
                                <p>Font Style: Poppins</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header bg-light d-flex justify-content-between">
                                <span class="font-size-sm text-uppercase font-weight-semibold">Name: Tux</span>

                            </div>

                            <div class="card-body">
                                <h6 class="card-title">Type: Amet</h6>
                                <p class="card-text">Width: 4cm</p>
                                <p>Heigh: 6cm"</p>
                                <p>W Location: Right</p>
                                <p>H Location: Top</p>
                                <p>Size: 10cm</p>
                                <p>Font Style: Poppins</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header bg-light d-flex justify-content-between">
                                <span class="font-size-sm text-uppercase font-weight-semibold">Name: Tux</span>

                            </div>

                            <div class="card-body">
                                <h6 class="card-title">Type: Amet</h6>
                                <p class="card-text">Width: 4cm</p>
                                <p>Heigh: 6cm"</p>
                                <p>W Location: Right</p>
                                <p>H Location: Top</p>
                                <p>Size: 10cm</p>
                                <p>Font Style: Poppins</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header bg-light d-flex justify-content-between">
                                <span class="font-size-sm text-uppercase font-weight-semibold">Name: Tux</span>

                            </div>

                            <div class="card-body">
                                <h6 class="card-title">Type: Amet</h6>
                                <p class="card-text">Width: 4cm</p>
                                <p>Heigh: 6cm"</p>
                                <p>W Location: Right</p>
                                <p>H Location: Top</p>
                                <p>Size: 10cm</p>
                                <p>Font Style: Poppins</p>
                            </div>
                        </div>
                    </div> -->


                    </div>
                <?php
                endif;
                ?>
                <div class="row">
                    <!-- <div class="col-xl-12">
                        <ul class="pagination-flat float-right twbs-flat pagination">
                            <li class="page-item prev disabled"><a href="#" class="page-link">Prev</a></li>
                            <li class="page-item active"><a href="#" class="page-link">1</a></li>
                            <li class="page-item"><a href="#" class="page-link">2</a></li>
                            <li class="page-item"><a href="#" class="page-link">3</a></li>
                            <li class="page-item"><a href="#" class="page-link">4</a></li>
                            <li class="page-item next"><a href="#" class="page-link">Next</a></li>
                        </ul>
                    </div> -->
                </div>
                <!-- /main charts -->
            </div>
            <!-- /main content -->
        </div>
    </div>
    <!-- /page content -->


    <div id="modal_onshow" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="padding-bottom: 1.25rem;">
                    <h5 class="modal-title">Basic modal</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body" style="background: #f3f3f3;">

                    <!-- <div class="card-body"> -->
                    <p class="item" style="font-size: 16px;">1234-42112-L</p>
                    <p class="item" style="font-size: 20px; font-weight: bold;">24213S-23-231-1AJS</p>
                    <div class="d-flex justify-content-between">
                        <p class="item" style="font-size: 14px;">Qty: 1</p>
                        <p class="item" style="font-size: 14px;">Lot #: 24/01/2021</p>
                    </div>
                    <img id="preview_img" src="" alt="" style="padding: 10px; width: 100%;">
                    <p class="item">Made in: United States of America</p>
                    <!-- </div>
                    <h6 class="font-weight-semibold">Text in a modal</h6>
                    <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>

                    <hr>

                    <h6 class="font-weight-semibold">Another paragraph</h6>
                    <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p> -->
                </div>

                <div class="modal-footer" style="padding-top: 1.25rem;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn bg-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#designer-menu').addClass('active');
            const base_url = '<?php echo user_base_url() ?>';

            // $('#modal_onshow').on('show.bs.modal', function() {
            //     // alert('onShow callback fired.')
            // });
            $('.preview').click(function() {
                var id = $(this).attr('data-value');
                // console.log(id);
                $.ajax({
                    url: base_url + 'designer/get_design',
                    type: 'post',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        if (response.message === 200) {
                            $('#preview_img').attr('src', response.image);
                            $('.item').css('font-family', response.data.font_style);
                        } else {
                            alert('Error: Something went wrong!');
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>