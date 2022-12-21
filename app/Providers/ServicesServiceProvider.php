<?php

namespace App\Providers;

use App\Services\ArticleService;
use Illuminate\Support\ServiceProvider;
use App\Services\BaseService;
use App\Services\CategoryService;
use App\Services\ContentService;
use App\Services\Contracts\ArticleServiceInterface;
use App\Services\Contracts\UserServiceInterface;
use App\Services\UserService;
use App\Services\Contracts\BaseServiceInterface;
use App\Services\Contracts\CategoryServiceInterface;
use App\Services\Contracts\ContentServiceInterface;
use App\Services\Contracts\GalleryServiceInterface;
use App\Services\Contracts\ImageServiceInterface;
use App\Services\Contracts\SectionServiceInterface;
use App\Services\Contracts\VideoServiceInterface;
use App\Services\GalleryService;
use App\Services\ImageService;
use App\Services\SectionService;
use App\Services\VideoService;

class ServicesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseServiceInterface::class, BaseService::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(SectionServiceInterface::class, SectionService::class);
        $this->app->bind(CategoryServiceInterface::class, CategoryService::class);
        $this->app->bind(GalleryServiceInterface::class, GalleryService::class);
        $this->app->bind(ContentServiceInterface::class, ContentService::class);
        $this->app->bind(ImageServiceInterface::class, ImageService::class);
        $this->app->bind(VideoServiceInterface::class, VideoService::class);
        $this->app->bind(ArticleServiceInterface::class, ArticleService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
