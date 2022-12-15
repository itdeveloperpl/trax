<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Str::macro('strip', function (string $value) {
            $replace = [
                '/\'|\.|\,|\!|\@|\?|\#|\$|\%|\^|\&|\*|\(|\)/' => '',
                '/ /' => '-',
                '/ę/' => 'e',
                '/ó/' => 'o',
                '/ą/' => 'a',
                '/ś/' => 's',
                '/ł/' => 'l',
                '/ż/' => 'z',
                '/ź/' => 'z',
                '/ć/' => 'c',
                '/ń/' => 'n',
            ];

            return preg_replace(array_keys($replace),
                array_values($replace),
                mb_strtolower($value));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
