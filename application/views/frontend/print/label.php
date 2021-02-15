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
        <p style="font-size: 16px; font-family: <?php echo $design->font_style ?>">1234-42112-L</p>
        <p style="font-size: 20px; font-weight: bold; font-family: <?php echo $design->font_style ?>">24213S-23-231-1AJS</p>
        <div style="display: flex; justify-content: space-between;">
            <p style="font-size: 14px; font-family: <?php echo $design->font_style ?>">Qty: <?php echo $qty ?></p>
            <p style="font-size: 14px; font-family: <?php echo $design->font_style ?>">Lot #: 24/01/2021</p>
        </div>
        <img id="preview_img" src="<?php echo barcode_url() . $barcode_image ?>" alt="" style="width: 100%;">
        <p style="font-family: <?php echo $design->font_style ?>">Made in: United States of America</p>
    </div>

    <script>
        // jQuery(document).ready(function() {
        window.print();
        // history.back();
        // });
    </script>
</body>

</html>