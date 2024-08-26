<?php
$ui     = './documentation/css/swagger-ui.css';
$style  = './documentation/css/index.css';
$fav32  = './documentation/favicon-32x32.png';
$fav16  = './documentation/favicon-16x16.png';

$swaggerBundle              = './documentation/js/swagger-ui-bundle.js';
$swaggerStandalonePreset    = './documentation/js/swagger-ui-standalone-preset.js';
$swaggerInitializer         = './documentation/js/swagger-initializer.js';
?>
<!-- HTML for static distribution bundle build -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>API about eBusiness Afrique | Swagger UI</title>

    <link rel="stylesheet" type="text/css" href="<?= $ui ?>" />
    <link rel="stylesheet" type="text/css" href="<?= $style ?>" />
    <link rel="icon" type="image/png" href="<?= $fav32 ?>" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?= $fav16 ?>" sizes="16x16" />
  </head>

  <body>
    <div id="swagger-ui"></div>

    <script src="<?= $swaggerBundle ?>" charset="UTF-8"> </script>
    <script src="<?= $swaggerStandalonePreset ?>" charset="UTF-8"> </script>
    <script src="<?= $swaggerInitializer ?>" charset="UTF-8"> </script>
  </body>
</html>
