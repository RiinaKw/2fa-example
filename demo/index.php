<?php

namespace App;

$root_dir = dirname(__DIR__);
require_once($root_dir . '/vendor/autoload.php');

?>
<html lang="ja">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
  </head>
  <body>
    <h1>
      Two-Factor Authentication for
      <?php echo Config::ACCOUNT_NAME; ?>@<?php echo Config::ISSUER; ?>
    </h1>
    <img src="qr.php" />
    <form action="auth.php" method="post">
        <label>enter token : </label>
        <input type="text" name="otp" />
        <button type="submit">send</button>
    </form>
  </body>
</html>
