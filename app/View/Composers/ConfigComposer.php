<?php


namespace App\View\Composers;


use App\Models\SiteConfig;
use Illuminate\View\View;

class ConfigComposer
{
    private $configs;

    public function __construct()
    {
        $this->configs = SiteConfig::select([
            'logo',
            'facebook',
            'twitter',
            'google',
            'github',
            'email',
            'phone',
            'address',
        ])->first();

    }

    public function compose(View $view)
    {
        $view->with('configs', $this->configs);
    }
}
