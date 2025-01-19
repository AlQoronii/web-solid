<?php

namespace App\Providers;

use App\Repositories\ArticleRepository;
use App\Repositories\ArticleRepositoryInterface;
use App\Repositories\AuthRepository;
use App\Repositories\AuthRepositoryInterface;
use App\Repositories\BookRepository;
use App\Repositories\BookRepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\LoanRepository;
use App\Repositories\LoanRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use App\Services\ArticleService;
use App\Services\AuthService;
use App\Services\BookService;
use App\Services\CategoryService;
use App\Services\Contracts\FileUploadServiceInterface;
use App\Services\FileUploadService;
use App\Services\HomeService;
use App\Services\Interfaces\NotificationInterface;
use App\Services\LoanService;
use App\Services\Notifications\NotificationPusher;
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
        // Binding untuk Repositories
        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);
        $this->app->bind(BookRepositoryInterface::class, BookRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(LoanRepositoryInterface::class, LoanRepository::class);
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);

        $this->app->bind(AuthService::class, function ($app) {
            return new AuthService($app->make(AuthRepositoryInterface::class));
        });

        // Binding untuk Services
        $this->app->bind(ArticleService::class, function ($app) {
            return new ArticleService($app->make(ArticleRepositoryInterface::class));
        });

        $this->app->bind(BookService::class, function ($app) {
            return new BookService($app->make(BookRepositoryInterface::class));
        });

        $this->app->bind(CategoryService::class, function ($app) {
            return new CategoryService($app->make(CategoryRepositoryInterface::class));
        });

        $this->app->bind(UserService::class, function ($app) {
            return new UserService($app->make(UserRepositoryInterface::class));
        });

        $this->app->bind(LoanService::class, function ($app) {
            return new LoanService($app->make(LoanRepositoryInterface::class));
        });

        $this->app->bind(HomeService::class, function ($app) {
            return new HomeService(
                $app->make(BookRepositoryInterface::class),
                $app->make(ArticleRepositoryInterface::class)
            );
        });

        // Notification Binding
        $this->app->bind(NotificationInterface::class, NotificationPusher::class);

        // File Upload Service
        $this->app->bind(FileUploadServiceInterface::class, FileUploadService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::component('datatables', \App\View\Components\Datatables::class);
    }
}
