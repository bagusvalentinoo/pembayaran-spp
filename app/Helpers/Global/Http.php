<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

if (!function_exists("makeRequest")) {
    function makeRequest(array $array_request = [], ?bool $withUserResolver = true): Request
    {
        $request = Request::create(request()->path(), request()->method(), $array_request);

        if ($withUserResolver) {
            $request = $request->setUserResolver(function () {
                return Auth::guard(config('auth.defaults.guard'))->user();
            });
        }

        return $request;
    }
}

if (!function_exists("isValidHttpStatusCode")) {
    function isValidHttpStatusCode(int $status_code): bool
    {
        return $status_code >= 100 && $status_code < 600;
    }
}
