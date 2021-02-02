<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Design</title>
</head>

<body>
    <div style="padding: 1.25rem;">
        <p style="font-size: 16px; font-family: <?php echo $design->font_style ?>">1234-42112-L</p>
        <p style="font-size: 20px; font-weight: bold; font-family: <?php echo $design->font_style ?>">24213S-23-231-1AJS</p>
        <div style="display: flex; justify-content: space-between;">
            <p style="font-size: 14px; font-family: <?php echo $design->font_style ?>">Qty: 1</p>
            <p style="font-size: 14px; font-family: <?php echo $design->font_style ?>">Lot #: 24/01/2021</p>
        </div>
        <img id="preview_img" src="<?php echo $default_barcode ?>" alt="" style="width: 100%;">
        <p style="font-family: <?php echo $design->font_style ?>">Made in: United States of America</p>
    </div>

    <script>
        // jQuery(document).ready(function() {
            window.print();
        // });
    </script>
</body>

</html>