<?php namespace SleepingOwl\Admin\Http\Controllers;

use AdminTemplate;
use App;
use Gate;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Input;
use Redirect;
use SleepingOwl\Admin\Interfaces\FormInterface;
use View;

class AdminController extends Controller
{

	protected function check_acl($model,$action){
		$model_undercase_name = Str::snake(class_basename($model->getClass()));
		if ($model->aclsAreActive() && Gate::denies($model_undercase_name . '-' . $action)) {
			View::share('permission', $model_undercase_name.'-' . $action);
			abort(403);
		}
	}

	public function getDisplay($model)
	{
		$this->check_acl($model,'retrieve');
		return $this->render($model->title(), $model->display());
	}

	public function getCreate($model)
	{
		$this->check_acl($model,'create');
		$create = $model->create();
		if (is_null($create))
		{
			abort(404);
		}
		return $this->render($model->title(), $create);
	}

	public function postStore($model)
	{
		$this->check_acl($model,'store');
		$create = $model->create();
		if (is_null($create))
		{
			abort(404);
		}
		if ($create instanceof FormInterface)
		{
			if ($validator = $create->validate($model))
			{
				return Redirect::back()->withErrors($validator)->withInput()->with([
					'_redirectBack' => Input::get('_redirectBack'),
				]);
			}
			$create->save($model);
		}
		return Redirect::to(Input::get('_redirectBack', $model->displayUrl()));
	}

	public function getEdit($model, $id)
	{
		$this->check_acl($model,'edit');
		$edit = $model->fullEdit($id);
		if (is_null($edit))
		{
			abort(404);
		}
		return $this->render($model->title(), $edit);
	}

	public function getShow($model, $id)
	{
		$this->check_acl($model,'show');
		$show = $model->fullShow($id);
		if (is_null($show))
		{
			abort(404);
		}
		return $this->render($model->title(), $show);
	}

	public function postUpdate($model, $id)
	{
		$this->check_acl($model,'update');
		$edit = $model->fullEdit($id);
		if (is_null($edit))
		{
			abort(404);
		}
		if ($edit instanceof FormInterface)
		{
			if ($validator = $edit->validate($model))
			{
				return Redirect::back()->withErrors($validator)->withInput()->with([
					'_redirectBack' => Input::get('_redirectBack'),
				]);
			}
			$edit->save($model);
		}
		return Redirect::to(Input::get('_redirectBack', $model->displayUrl()));
	}

	public function postDestroy($model, $id)
	{
		$this->check_acl($model,'destroy');
		$delete = $model->delete($id);
		if (is_null($delete))
		{
			abort(404);
		}
		$model->repository()->delete($id);
		return Redirect::back();
	}

	public function postRestore($model, $id)
	{
		$this->check_acl($model,'update');
		$restore = $model->restore($id);
		if (is_null($restore))
		{
			abort(404);
		}
		$model->repository()->restore($id);
		return Redirect::back();
	}

	public function render($title, $content)
	{
		if ($content instanceof Renderable)
		{
			$content = $content->render();
		}
		return view(AdminTemplate::view('_layout.inner'), [
			'title'   => $title,
			'content' => $content,
		]);
	}

	public function getLang()
	{
		$lang = trans('admin::lang');
		if ($lang == 'admin::lang')
		{
			$lang = trans('admin::lang', [], 'messages', 'en');
		}

		$data = array(
			'locale' => App::getLocale(),
			'token'  => csrf_token(),
			'prefix' => config('admin.prefix'),
			'lang'   => $lang,
			'ckeditor_cfg' => config('admin.ckeditor')
		);
		
		$content = 'window.admin = '.json_encode($data) . ';';
		
		$response = new Response($content, 200, [
			'Content-Type' => 'text/javascript',
		]);

		return $this->cacheResponse($response);
	}

	protected function cacheResponse(Response $response)
	{
		$response->setSharedMaxAge(31536000);
		$response->setMaxAge(31536000);
		$response->setExpires(new \DateTime('+1 year'));

		return $response;
	}

	public function getWildcard()
	{
		abort(404);
	}

} 