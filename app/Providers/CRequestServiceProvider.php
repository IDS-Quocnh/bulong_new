<?php

namespace App\Providers;

use App\Request\CRequest;
use Illuminate\Support\ServiceProvider;

class CRequestServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->resolving(CRequest::class, function ($request, $app) {
            CRequest::createFrom($app['request'], $request);
        });
    }
}
