<?php

namespace App;

$root_dir = dirname(__DIR__);
require_once($root_dir . '/vendor/autoload.php');

$otp = new Otp;

if (isset($_POST['otp']) && $otp->isValid($_POST['otp'])) {
    $result = 'congratulations';
} else {
    $result = 'so bad';
}
?>
<html lang="ja">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
  </head>
  <body>
    <?php echo $result; ?>
  </body>
</html>
