<?php namespace Illuminato\Comments;

use Illuminato\Support\IlluminatoServiceProvider;

class CommentsServiceProvider extends IlluminatoServiceProvider {
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
		$this->loadConfigsFrom(__DIR__.'/../config', 'comments');
	}
}