<?php

namespace App;

$root_dir = dirname(__DIR__);
require_once($root_dir . '/vendor/autoload.php');

$otp = new Otp;
$otp->qrRender();
