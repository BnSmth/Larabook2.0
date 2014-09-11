<?php namespace Larabook\Providers;

use App, Log, Exception;
use Illuminate\Support\ServiceProvider;

class ErrorServiceProvider extends ServiceProvider {

	/**
	 * Register any error handlers.
	 *
	 * @return void
	 */
	public function boot()
	{
		App::error(function(Exception $e)
		{
			Log::error($e);
		});
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}