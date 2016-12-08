<?php namespace SleepingOwl\Admin\Providers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\ServiceProvider;
use Route;
use SleepingOwl\Admin\Admin;

class RouteServiceProvider extends ServiceProvider
{

	public function register()
	{
		$this->registerPatterns();
		$this->registerMiddleware();

		Route::group([
			'prefix'    => config('admin.prefix'),
			'namespace' => 'SleepingOwl\Admin\Http\Controllers',
		], function ()
		{
			Route::group([
				'middleware' => config('admin.middleware'),
			], function ()
			{
				$file = config('admin.bootstrapDirectory') . '/routes.php';
				if (file_exists($file))
				{
					require $file;
				}
			});
			$routesFile = __DIR__ . '/../Http/routes.php';
			if (file_exists($routesFile))
			{
				require $routesFile;
			}
		});
	}

	public static function registerRoutes($callback)
	{
		Route::group([
			'prefix'     => config('admin.prefix'),
			'middleware' => config('admin.middleware'),
		], $callback);
	}

	protected function registerPatterns()
	{
		Route::pattern('adminModelId', '[0-9]+');
		if (count(Admin::modelAltAliases()) > 0) {
			$pattern = implode('|', Admin::modelAliases());
			foreach (Admin::modelAliases() as $model => $alias) {
				if (array_key_exists($model,Admin::modelAltAliases())) {
					foreach (Admin::modelAltAliases()[$model] as $alt_alias) {
						$pattern = $pattern . '|' . $alt_alias;
					}
				}
			}
			Route::pattern('adminModel', $pattern);
		} else {
			Route::pattern('adminModel', implode('|', Admin::modelAliases()));
		}

		Route::bind('adminModel', function ($model)
		{
			$class = array_search($model, Admin::modelAliases());
			if ($class === false)
			{
				$class = $this->alt_alias_exists($model);
				if ($class === false) {
					throw new ModelNotFoundException;
				}
			}
			return Admin::model($class);
		});
		Route::pattern('adminWildcard', '.*');
	}


	/**
	 *
	 * Get model class for alt_alias or false if not found
	 * @param $alt_alias_to_check
	 * @return bool|int|string
     */
	protected function alt_alias_exists($alt_alias_to_check) {
		foreach (Admin::modelAltAliases() as $model => $alt_aliases) {
			$alt_aliases = (array) $alt_aliases;
			foreach ($alt_aliases as $alt_alias) {
				if ($alt_alias_to_check == $alt_alias) return $model;
			}
		}
		return false;
	}

	protected function registerMiddleware()
	{
		Route::middleware('admin.auth', 'SleepingOwl\Admin\Http\Middleware\Authenticate');
	}

}