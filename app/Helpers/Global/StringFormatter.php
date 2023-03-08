<?php

if (!function_exists('array_any')) {
    function array_any(array $array, array $baseArray): bool
    {
        return !empty(array_intersect($array, $baseArray));
    }
}

if (!function_exists('customArrayFilter')) {
    function customArrayFilter(): Closure
    {
        return function ($val) {
            return !is_null($val);
        };
    }
}

if (!function_exists('convertDateToFormat')) {
    function convertDateToFormat($value, ?string $format = null): ?string
    {
        $format = $format ? $format : 'Y-m-d H:i:s';
        return $value ? date($format, strtotime(strval($value))) : null;
    }
}

if (!function_exists('uniqueMultidimensionalArray')) {
    function uniqueMultidimensionalArray(array $array, string $key): array
    {
        $tempArray = array();
        $i = 0;
        $keyArray = array();

        foreach ($array as $val) {
            if (!in_array($val[$key], $keyArray)) {
                $keyArray[$i] = $val[$key];
                $tempArray[$i] = $val;
            }
            $i++;
        }

        return $tempArray;
    }
}

if (!function_exists('convertToRupiahFormat')) {
    function convertToRupiahFormat(float|int $price): string
    {
        return "Rp " . number_format($price, 0, ',', '.');
    }
}
