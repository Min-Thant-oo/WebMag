<?php

return array_filter([
    App\Providers\AppServiceProvider::class,
    App\Providers\ViewServiceProvider::class,

    // Conditionally load IdeHelperServiceProvider in development
    env('APP_ENV') === 'local' ? Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class : null,
]);