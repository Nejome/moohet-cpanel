<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'http://localhost/moohet_cpanel/my_wallet/charge/callback',
        'https://moohet.com/cp/my_wallet/charge/callback',

        'http://localhost/moohet_cpanel/api/login',
        'https://moohet.com/cp/api/login',
    ];
}
