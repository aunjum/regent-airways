<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    //todo: sts changes
    protected $except = [
        'get_packages',
        'booking-payment-success',
        'booking-payment-failed',
        'booking-payment-cancel',
    ];
}
