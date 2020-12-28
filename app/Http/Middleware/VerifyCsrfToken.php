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
    protected $except = [
        '/admin/product/New/LE1',
        '/admin/product/New/LE2/',
        '/admin/product/New/LE3/',
        '/admin/product/New/LE4/',
        '/admin/product/New/LE5/',
        '/admin/product/New/LE6/',
        '/admin/New/Brand',
        '/admin/New/User',
        '/admin/product/New/Photo/One',
        '/admin/Slid/New/Photo',
        '/admin/Ban/New/Photo',

    ];
}
