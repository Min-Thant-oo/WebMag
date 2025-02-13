<?php

$providers = [
    App\Providers\AppServiceProvider::class,
    App\Providers\ViewServiceProvider::class,
];

// Conditionally add the IdeHelperServiceProvider in the local environment
if (app()->environment('local')) {
    $providers[] = Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class;
}

return $providers;