<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Label</title>
    <style>
        @media print {
            @page {
                margin: 0;
            }

            .print-page {
                width: 100%;
                height: 100%;
                padding-right: 2.032em !important;
                padding-left: 2.032em !important;
                box-sizing: border-box;
            }
        }
    </style>
</head>

<body>
    <div class="print-page" style="padding: 1.25rem;">
        <p style="font-size: 12px; font-family: <?php echo $design->font_style ?>"><?php echo $product->number ?></p>
        <p style="font-size: 20px; font-weight: bold; font-family: <?php echo $design->font_style ?>"><?php echo $product->name ?></p>
        <div style="display: flex; justify-content: space-between;">
            <p style="font-size: 10px; font-family: <?php echo $design->font_style ?>">Qty: <?php echo $qty ?></p>
            <p style="font-size: 10px; font-family: <?php echo $design->font_style ?>">Lot #: <?php echo date('d/m/Y', strtotime($product->created_at)) ?></p>
        </div>
        <img id="preview_img" src="<?php echo barcode_url() . $barcode_image ?>" alt="" style="width: 100%;">
        <p style="font-size: 10px; font-family: <?php echo $design->font_style ?>">Group: <?php echo $product->group ? $product->group->name : 'NA' ?></p>
    </div>

    <script>
        // jQuery(document).ready(function() {
        window.print();
        // history.back();
        // });
    </script>
</body>

</html>