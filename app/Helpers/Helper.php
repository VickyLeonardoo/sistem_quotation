<?php

namespace App\Helpers;

class Helper
{
    public static function terbilang($number)
    {
        $terbilang = [
            '', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh', 'sebelas'
        ];

        if ($number < 12) {
            return $terbilang[$number];
        } elseif ($number < 20) {
            return $terbilang[$number % 10] . ' belas';
        } elseif ($number < 100) {
            return $terbilang[(int)($number / 10)] . ' puluh ' . $terbilang[$number % 10];
        } elseif ($number < 200) {
            return 'seratus ' . self::terbilang($number - 100);
        } elseif ($number < 1000) {
            return $terbilang[(int)($number / 100)] . ' ratus ' . self::terbilang($number % 100);
        } elseif ($number < 2000) {
            return 'seribu ' . self::terbilang($number - 1000);
        } elseif ($number < 1000000) {
            return self::terbilang((int)($number / 1000)) . ' ribu ' . self::terbilang($number % 1000);
        } elseif ($number < 1000000000) {
            return self::terbilang((int)($number / 1000000)) . ' juta ' . self::terbilang($number % 1000000);
        } elseif ($number < 1000000000000) {
            return self::terbilang((int)($number / 1000000000)) . ' miliar ' . self::terbilang(fmod($number, 1000000000));
        } elseif ($number < 1000000000000000) {
            return self::terbilang((int)($number / 1000000000000)) . ' triliun ' . self::terbilang(fmod($number, 1000000000000));
        }
    }
}
