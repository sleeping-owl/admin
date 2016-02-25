<?php namespace SleepingOwl\Admin\FormItems;

use Request;
use Response;
use Route;
use SleepingOwl\Admin\AssetManager\AssetManager;
use SleepingOwl\Admin\Interfaces\WithRoutesInterface;
use Validator;

class Image extends NamedFormItem implements WithRoutesInterface
{

	protected $view = 'image';
	protected static $route = 'uploadImage';

	public function initialize()
	{
		parent::initialize();

		AssetManager::addScript('admin::default/js/formitems/image/init.js');
		AssetManager::addScript('admin::default/js/formitems/image/flow.min.js');
	}

	public static function registerRoutes()
	{
		Route::post('formitems/image/' . static::$route, [
			'as' => 'admin.formitems.image.' . static::$route,
			function ()
			{
				$validator = Validator::make(Request::all(), static::uploadValidationRules());
				if ($validator->fails())
				{
					return Response::make($validator->errors()->get('file'), 400);
				}
				$file = Request::file('file');
				$filename = md5(time() . $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
				$path = config('admin.imagesUploadDirectory');
				$fullpath = public_path($path);
				$file->move($fullpath, $filename);
				$value = $path . '/' . $filename;
				return [
					'url'   => asset($value),
					'value' => $value,
				];
			}
		]);
	}

	protected static function uploadValidationRules()
	{
		return [
			'file' => 'image',
		];
	}

}
