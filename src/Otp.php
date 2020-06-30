<?php

namespace App;

use Endroid\QrCode\QrCode;

class Otp
{
    private $config;

    public function __construct()
    {
        $this->config = new Config;
    }

    private function qrString()
    {
        return sprintf(
            'otpauth://totp/%s:%s?secret=%s',
            $this->config::ISSUER,
            $this->config::ACCOUNT_NAME,
            $this->config::SECRET
        );
    }

    public function qrRender()
    {
        $string = $this->qrString();
        $qr = new QrCode($string);

        header('Content-Type: ' . $qr->getContentType());
        echo $qr->writeString();
    }

    private function secret2otp($string)
    {
        $seed = Base32::decode($string);
        $hash = hash_hmac('sha1', str_pad(pack('N', intval(time() / 30)), 8, "\x00", STR_PAD_LEFT), $seed, false);
        return sprintf('%06u', (hexdec(substr($hash, hexdec($hash[39]) * 2, 8)) & 0x7fffffff) % 1000000);
    }

    public function isValid($string)
    {
        return ($this->secret2otp($this->config::SECRET) === $string);
    }
}
