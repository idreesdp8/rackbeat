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
    <div class="col-xl-3">
        <input type="text" class="form-control" id="search" placeholder="Search by name..." onchange="searchProduct(this)">
    </div>
    <div class="col-xl-9">
                        <?php
                        echo '<div id="paging"><p>', $prevlink, ' Page ', $curr_page, ' of ', $pages, ' pages ', $nextlink, ' </p></div>';
                        ?>
        <!-- <input type="hidden" id="curr_page" value="<?php echo $curr_page ?? '' ?>">
                        
                        <?php
                        // if ($pages) :
                        //     $j = 1;
                        //     echo '<div style="float: right;">';
                        //     for ($i = 1; $i <= $pages; $i++) {
                        //         if ($i == $j || $i % $j == 0) {
                        //             $j += 10;
                        //             echo '<ul class="pagination-flat twbs-flat pagination label-pagination">';
                        //         }
                        ?>
                                <div onClick="return paginate('<?php echo $i; ?>');">
                                    <li class="page-item <?php echo $i == $curr_page ? 'active' : '' ?>"><a href="javascript:void(0)" class="page-link"><?php echo $i ?></a></li>
                                </div>
                        <?php
                        //     if ($i % 10 == 0) {
                        //         echo '</ul>';
                        //     }
                        // }
                        // echo '</div>';
                        // endif;
                        ?> -->
        <!-- <li class="page-item next"><a href="#" class="page-link">Next</a></li> -->
        <!-- </ul>    -->
    </div>
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
                        <p class="card-text">Group: <?php echo $product->group ? $product->group->name : 'NA' ?></p>
                        <p>Unit: <?php echo $product->unit ? $product->unit->number : 'NA' ?></p>
                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        <span class="text-muted"></span>

                        <ul class="list-inline mb-0">
                            <!-- <button type="button" class="btn text-left">View</button> -->
                            <button type="button" class="btn bg-indigo" onClick="return print_modal('<?php echo $product->urlfriendly_number; ?>');" data-toggle="modal" data-target="#modal_theme_primary">Print</button>
                        </ul>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
        ?>
    </div>
<?php
else :
?>
    <div>No Product Found</div>
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

            <form action="<?php echo site_url('prints/label'); ?>" method="post" id="datas_form">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="product_id" id="product_id">
                        <div class="col-md-6">
                            <fieldset>
                                <div class="form-group">
                                    <label>Stock</label>
                                    <input type="text" class="form-control" name="qty" id="qty" onchange="changeQty(this)" placeholder="" data-error="#qty1">
                                    <span id="qty1" class="text-danger"><?php echo form_error('qty'); ?></span>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset>
                                <div class="form-group">
                                    <label>Designs</label>
                                    <select name="design_id" id="design_id" onchange="changeDesign(this)" class="form-control select" data-error="#design_id1">
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
                                    <span id="design_id1" class="text-danger"><?php echo form_error('design_id'); ?></span>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-12" id="preview1">
                            <p class="item" style="font-size: 16px;" id="item_number"></p>
                            <p class="item" style="font-size: 20px; font-weight: bold;" id="item_name"></p>
                            <div class="d-flex justify-content-between">
                                <p class="item" id="item_qty" style="font-size: 14px;">Qty: 1</p>
                                <p class="item" style="font-size: 14px;" id="item_lot"></p>
                            </div>
                            <img id="preview_img" src="" alt="" style="padding: 10px; width: 100%;">
                            <p class="item" id="item_group"></p>
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
            <script>
                var validator = $('#datas_form').validate({
                    rules: {
                        design_id: {
                            required: true,
                        },
                        qty: {
                            required: true,
                        },
                    },
                    messages: {
                        design_id: {
                            required: "Design is required field"
                        },
                        qty: {
                            required: "Stock is required field"
                        },
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
            </script>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-3"></div>
    <div class="col-xl-9">
                        <?php
                        echo '<div id="paging"><p>', $prevlink, ' Page ', $curr_page, ' of ', $pages, ' pages ', $nextlink, ' </p></div>';
                        ?>
        <!-- <input type="hidden" id="curr_page" value="<?php echo $curr_page ?? '' ?>">
                        
                        <?php
                        // if ($pages) :
                        //     $j = 1;
                        //     echo '<div style="float: right;">';
                        //     for ($i = 1; $i <= $pages; $i++) {
                        //         if ($i == $j || $i % $j == 0) {
                        //             $j += 10;
                        //             echo '<ul class="pagination-flat twbs-flat pagination label-pagination">';
                        //         }
                        ?>
                                <div onClick="return paginate('<?php echo $i; ?>');">
                                    <li class="page-item <?php echo $i == $curr_page ? 'active' : '' ?>"><a href="javascript:void(0)" class="page-link"><?php echo $i ?></a></li>
                                </div>
                        <?php
                        //     if ($i % 10 == 0) {
                        //         echo '</ul>';
                        //     }
                        // }
                        // echo '</div>';
                        // endif;
                        ?> -->
        <!-- <li class="page-item next"><a href="#" class="page-link">Next</a></li> -->
        <!-- </ul>    -->
    </div>
</div>

<script>
    $(function() {
        $('#modal_theme_primary').on('hide.bs.modal', function() {
            $('#qty').val('');
            $('#item_qty').html('Qty: 1');
            $('.item').css('font-family', '');
            $('#design_id').val('');
            $('#product_id').val('');
            $('#select2-design-container').html('Choose Design');
            $('#select2-design-container').attr('title', 'Choose Design');
            $('#preview1').hide();
            $('#preview2').hide();
        });
    });
</script>