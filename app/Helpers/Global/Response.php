<?php


use Illuminate\Http\Request;

if (!function_exists('isPaginated')) {
    function isPaginated(?Request $request = null): bool
    {
        $request = $request ?? request();
        return is_null($request->paginated) || $request->paginated == 'true';
    }
}
