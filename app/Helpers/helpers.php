<?php

if (!function_exists('toRupiah')) {
    function toRupiah($value)
    {
        return 'Rp. ' . number_format($value, 0, ',', '.');
    }
}
