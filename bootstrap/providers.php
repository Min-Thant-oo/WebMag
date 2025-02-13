$providers = [
    App\Providers\AppServiceProvider::class,
    App\Providers\ViewServiceProvider::class,
];

if (app()->environment('local')) {
    $providers[] = Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class;
}

return $providers;
