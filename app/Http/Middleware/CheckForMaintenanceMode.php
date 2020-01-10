<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Middleware;

class CheckForMaintenanceMode extends Middleware
{
    /**
     * The URIs that should be reachable while maintenance mode is enabled.
     *
     * @var array
     */
    protected $except = [
        '/portfolio',
        '/portfolio/*',
        '/login',
        '/ust-portfolio',
        '/ust-portfolio/*',
        '/uzytkownicy',
        '/uzytkownicy/*',
    ];
}
