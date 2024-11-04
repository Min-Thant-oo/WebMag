<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\View\Composers\CategoryComposer;
use App\View\Composers\ConfigComposer;
use App\View\Composers\FeaturedPostsComposer;
use App\View\Composers\MostReadPostsComposer;
use App\View\Composers\RecentPostsComposer;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
{
    $views = [
        'blog.*', 
        'components.blog.layout',
        'components.blog.adminlayout',
    ];

    View::composer($views, FeaturedPostsComposer::class);
    View::composer($views, RecentPostsComposer::class);
    View::composer($views, CategoryComposer::class);
    View::composer($views, MostReadPostsComposer::class);
    View::composer($views, ConfigComposer::class);
}

}
