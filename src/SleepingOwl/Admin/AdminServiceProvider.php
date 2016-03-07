<?php namespace SleepingOwl\Admin;

use SleepingOwl\Admin\Exceptions\ValidationException;
use SleepingOwl\Html\FormBuilder;
use SleepingOwl\Admin\Validation\Validator;
use Illuminate\Support\ServiceProvider;
use Intervention\Image\ImageServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
	/**
	 * @var array
	 */
	protected $commands = [
		'AdministratorsCommand',
		'InstallCommand',
		'ModelCommand'
	];

	/**
	 * Register the service provider.
	 * @return void
	 */
	public function register()
	{
		$this->registerCommands();

		$this->app->register('\Intervention\Image\ImageServiceProvider');
		$this->app->register('\SleepingOwl\AdminAuth\AdminAuthServiceProvider');

		$this->registerFormBuilder();

		$this->app->bind('SleepingOwl\Admin\Repositories\Interfaces\ModelRepositoryInterface', 'SleepingOwl\Admin\Repositories\ModelRepository');

		$this->app->singleton('SleepingOwl\Admin\Admin', function ($app)
		{
			return Admin::instance();
		});
		$this->app->singleton('admin', 'SleepingOwl\Admin\Admin');
		$this->app->bind('admin.router', function ()
		{
			return Admin::instance()->router;
		});

		$this->registerValidateExceptionHandler();
	}

	/**
	 * Register the form builder instance.
	 * @return void
	 */
	protected function registerFormBuilder()
	{
		$this->app->singleton('SleepingOwl\Html\FormBuilder', function ($app)
		{
			$htmlBuilder = $app->make('SleepingOwl\Html\HtmlBuilder');
			$form = new FormBuilder($htmlBuilder, $app['url'], $app['session.store']->getToken());

			return $form->setSessionStore($app['session.store']);
		});
	}

	/**
	 *
	 */
	public function boot()
	{
		$this->loadViewsFrom(__DIR__ . '/../../views', 'admin');
		$this->loadTranslationsFrom(base_path('resources/lang/'), 'admin');
		$this->mergeConfigFrom(__DIR__ . '/../../config/config.php', 'admin');

		$this->publishes([
			__DIR__ . '/../../config/config.php' => config_path('admin.php'),
		], 'config');

		$this->publishes([
			__DIR__ . '/../../migrations/' => base_path('/database/migrations'),
		], 'migrations');

		$this->publishes([
			__DIR__.'/../../../public/' => public_path('packages/sleeping-owl/admin/'),
		], 'assets');

		$this->publishes([
			__DIR__ . '/../../lang/' => base_path('resources/lang/'),
		], 'langs');

		app('SleepingOwl\Admin\Helpers\StartSession')->run();

		Admin::instance()->router->registerRoutes();
		$this->registerValidator();

		$this->registerFilters();
	}

	/**
	 *
	 */
	protected function registerValidator()
	{
		\Validator::resolver(function ($translator, $data, $rules, $messages, $customAttributes)
		{
			return new Validator($translator, $data, $rules, $messages, $customAttributes);
		});
	}

	protected function registerValidateExceptionHandler()
	{
	}

	/**
	 *
	 */
	protected function registerCommands()
	{
		foreach ($this->commands as $command)
		{
			$this->commands('SleepingOwl\Admin\Commands\\' . $command);
		}
	}

	protected function registerFilters()
	{
		require_once(__DIR__ . '/filters.php');
	}

	/**
	 * @return array
	 */
	public function provides()
	{
		return ['admin'];
	}

}
