<?php namespace Illuminato\Comments;

use Illuminate\Support\ServiceProvider;

class CommentsServiceProvider extends ServiceProvider {
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        //
    }

	/**
	 * Perform post-registration booting of services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->loadViewsFrom(__DIR__.'/../resources/views', 'comments');
		$this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'comments');
		$this->publishes([
        	__DIR__.'/../config/illuminatocomments.php' => config_path('illuminatocomments.php'),
    	]);
	}
}