<?php

namespace App\Providers;

use App\Category;
use App\BlockFactory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Klisl\Statistics\Models\KslStatistic;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->app->singleton('Block', function ($app) {
        //     return new BlockFactory();
        // });

        // Blade::directive('block', function ($expression) {
        //     $args = explode(',', $expression);
        //     $args = array_map('trim', $args);

        //     $block = (new BlockFactory)->_($args[0]);

        //     return $block ? $block->getContent($args[1] ?? null) : '';
        // });
        View::composer('layout', function ($view) {
            $models = Category::withTranslations()->get()->sortBy(function ($model, $key) {
                return $model->getTranslatedAttribute('name');
            });
            
            $view->with('_categories', $models);
        });

        View::composer('*', function ($view) {
            $count = KslStatistic::distinct('ip')->count('ip');

            $view->with('all_visitors_count', $count);
        });

        View::composer('*', function ($view) {
            
            $count = KslStatistic::where('str_url', url()->current())->distinct('ip')->count('ip');

            $view->with('current_page_visitors_count', $count);
            
        });

    }
}
