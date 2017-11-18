<?php

namespace Sperelson\PrettyParam\Providers;

use Sperelson\PrettyParam\Middleware\PrettyParam;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Http\Kernel;

class PrettyParamProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerMiddleware(PrettyParam::class);
    }

    /**
     * @param  string $middleware
     */
    protected function registerMiddleware($middleware)
    {
        $kernel = $this->app[Kernel::class];
        $kernel->pushMiddleware($middleware);
    }
}
