<?php namespace Larabook\Providers;

use Illuminate\Routing\FilterServiceProvider as ServiceProvider;

class FilterServiceProvider extends ServiceProvider {

	/**
	 * The filters that should run before all requests.
	 *
	 * @var array
	 */
	protected $before = [
		'Larabook\Http\Filters\MaintenanceFilter',
	];

	/**
	 * The filters that should run after all requests.
	 *
	 * @var array
	 */
	protected $after = [
		//
	];

	/**
	 * All available route filters.
	 *
	 * @var array
	 */
	protected $filters = [
		'auth' => 'Larabook\Http\Filters\AuthFilter',
		'auth.basic' => 'Larabook\Http\Filters\BasicAuthFilter',
		'csrf' => 'Larabook\Http\Filters\CsrfFilter',
		'guest' => 'Larabook\Http\Filters\GuestFilter',
	];

}