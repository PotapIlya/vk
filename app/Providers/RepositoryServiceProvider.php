<?php

namespace App\Providers;

use App\Repositories\CoreRepository;
use App\Repositories\Users\GalleryRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void

	 */
    public function register()
    {
		$this->app->bind(
			CoreRepository::class,
			GalleryRepository::class
		);
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
