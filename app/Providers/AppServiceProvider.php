<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Page;
use App\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // DESCOMENTAR ESSE COMANDO QUANDO COLOCAR O SISTEMA NA HOSPEDAGEM
        // $this->app->binder('path.public', function(){
        //     return base_path('public_html');
        // });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // MENU
        $frontMenu = [
            '/' => 'Home'
        ];
        $pages = Page::All();
        foreach ($pages as $page ) {
            $frontMenu[ $page['slug'] ] = $page['title'];
        }
        View::share('front_menu', $frontMenu);

        // CONFIGURAÇÕES
        $frontConfig = [
            '/' => 'Home'
        ];
        $settings = Setting::All();
        foreach ($settings as $setting ) {
            $frontConfig[ $setting['name'] ] = $setting['content'];
        }
        View::share('front_config', $frontConfig);
    }
}
