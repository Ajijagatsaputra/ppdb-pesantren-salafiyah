<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ContentService;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(ContentService::class, function ($app) {
            return new ContentService();
        });
    }

    public function boot()
    {
        // Model observers untuk clear cache ketika data diubah
        $models = [
            'App\Models\HeroSection',
            'App\Models\AboutSection',
            'App\Models\Stat',
            'App\Models\Program',
            'App\Models\Client',
            'App\Models\VisiMisi',
            'App\Models\Keunggulan',
            'App\Models\Testimonial',
            'App\Models\Ekstrakulikuler',
            'App\Models\TeamMember',
            'App\Models\ContactInfo',
        ];

        foreach ($models as $model) {
            $model::saved(function () {
                app(ContentService::class)->clearCache();
            });
            
            $model::deleted(function () {
                app(ContentService::class)->clearCache();
            });
        }
    }
}
