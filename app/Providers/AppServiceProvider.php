<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\AboutInterface;
use App\Repositories\Repos\AboutRepository;
use App\Repositories\Interfaces\ProductInterface;
use App\Repositories\Repos\BrandRepository;
use App\Repositories\Interfaces\BrandInterface;
use App\Repositories\Repos\ProductRepository;
use App\Repositories\Interfaces\ProductDetailInterface;
use App\Repositories\Repos\ProductDetailRepository;

use App\Repositories\Interfaces\CategoryInterface;
use App\Repositories\Repos\CategoryRepository;

use App\Repositories\Interfaces\TagInterface;
use App\Repositories\Repos\TagRepository;
use App\Repositories\Interfaces\UserInterface;
use App\Repositories\Repos\UserRepository;
use App\Repositories\Interfaces\RoleInterface;
use App\Repositories\Repos\RoleRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Dang ky cac Repositories va Interfaces 
        $this->app->bind(
            AboutInterface::class,
            AboutRepository::class
        );
        $this->app->bind(
            ProductInterface::class,
            ProductRepository::class
        );
        $this->app->bind(
            ProductDetailInterface::class,
            ProductDetailRepository::class
        );
        $this->app->bind(
            BrandInterface::class,
            BrandRepository::class
        );
        $this->app->bind(
            CategoryInterface::class,
            CategoryRepository::class
        );
        $this->app->bind(
            TagInterface::class,
            TagRepository::class
        );
        $this->app->bind(
            UserInterface::class,
            UserRepository::class
        );
        $this->app->bind(
            RoleInterface::class,
            RoleRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
