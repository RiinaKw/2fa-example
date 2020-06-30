<?php

namespace App;

class Base32
{
    public static function decode($string)
    {
        $n = 0;
        $bs = 0;
        $seed = '';
        for ($i = 0; $i < strlen($string); $i++) {
            $n <<= 5;
            $n += stripos('ABCDEFGHIJKLMNOPQRSTUVWXYZ234567', $string[$i]);
            $bs = ($bs + 5) % 8;
            $seed .= $bs < 5 ? chr(($n & (255 << $bs)) >> $bs) : null;
        }
        return $seed;
    }
}
