<?php
if ( ! function_exists('user')) {

    /**
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    function user()
    {
        if (!is_guest()) {
            return current_auth()->user();
        } else {
            return null;
        }
    }
}

if ( ! function_exists('is_guest')) {
    /**
     * @return bool
     */
    function is_guest()
    {
        if (is_null(current_auth())) {
            return true;
        } else {
            return current_auth()->guest();
        }
    }
}

if ( ! function_exists('current_auth')) {
    /**
     * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard|null
     */
    function current_auth()
    {
        $host = request()->getHost();
        if ($host == config('app.api_url')) {
            return Auth::guard('api');
        } elseif ($host == config('app.url')) {
            return Auth::guard('web');
        } else {
            return null;
        }
    }
}