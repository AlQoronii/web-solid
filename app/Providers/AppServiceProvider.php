<?php

namespace App\Providers;

use App\Models\Book;
use App\Repositories\ArticleRepository;
use App\Repositories\ArticleRepositoryInterface;
use App\Repositories\BookRepository;
use App\Repositories\BookRepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\LoanRepository;
use App\Repositories\LoanRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use App\Services\ArticleService;
use App\Services\BookService;
use App\Services\CategoryService;
use App\Services\HomeService;
use App\Services\LoanService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);
        $this->app->bind(ArticleService::class, function ($app) {
            return new ArticleService($app->make(ArticleRepositoryInterface::class));
        });

        $this->app->bind(BookRepositoryInterface::class, BookRepository::class);
        $this->app->bind(BookService::class, function ($app) {
            return new BookService($app->make(BookRepositoryInterface::class));
        });

        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(CategoryService::class, function ($app) {
            return new CategoryService($app->make(CategoryRepositoryInterface::class));
        });

        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserService::class, function ($app) {
            return new UserService($app->make(UserRepositoryInterface::class));
        });

        $this->app->bind(LoanRepositoryInterface::class, LoanRepository::class);
        $this->app->bind(LoanService::class, function ($app) {
            return new LoanService($app->make(LoanRepositoryInterface::class));
        });

        $this->app->singleton(BookRepositoryInterface::class, BookRepository::class);
        $this->app->singleton(ArticleRepositoryInterface::class, ArticleRepository::class);
        $this->app->singleton(HomeService::class, function ($app) {
            return new HomeService(
                $app->make(BookRepositoryInterface::class),
                $app->make(ArticleRepositoryInterface::class)
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::component('datatables', \App\View\Components\Datatables::class);
    }
}
