<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Queries\QueryBuilder;
use App\Queries\QueryBuilderCategories;
use App\Queries\QueryBuilderSources;
use App\Queries\QueryBuilderNews;
use App\Queries\QueryBuilderReviews;
use App\Queries\QueryBuilderUsers;
use App\Services\Contract\Parser;
use App\Services\ParserService;
use App\Services\Contract\Social;
use App\Services\SocialService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //query builders
        $this->app->bind(QueryBuilder::class, QueryBuilderCategories::class);
        $this->app->bind(QueryBuilder::class, QueryBuilderSources::class);
        $this->app->bind(QueryBuilder::class, QueryBuilderNews::class);
        $this->app->bind(QueryBuilder::class, QueryBuilderReviews::class);
        $this->app->bind(QueryBuilder::class, QueryBuilderUsers::class);

        //services
        $this->app->bind(Parser::class, ParserService::class);
        $this->app->bind(Social::class, SocialService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
    }
}
