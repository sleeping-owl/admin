<?php namespace SleepingOwl\Admin\ShowItems;

use AdminTemplate;
use Illuminate\Contracts\Support\Renderable;
use SleepingOwl\Admin\Helpers\ExceptionHandler;
use SleepingOwl\Admin\Interfaces\ShowItemInterface;

abstract class BaseShowItem implements Renderable, ShowItemInterface
{

	protected $view;
	protected $instance;
	protected $validationRules = [];

	public function initialize()
	{
	}

	public function setInstance($instance)
	{
		return $this->instance($instance);
	}

	public function instance($instance = null)
	{
		if (is_null($instance))
		{
			return $this->instance;
		}
		$this->instance = $instance;
		return $this;
	}

	public function getParams()
	{
		return [
			'instance' => $this->instance(),
		];
	}

	public function render()
	{
		$params = $this->getParams();
		return view(AdminTemplate::view('showitem.' . $this->view), $params)->render();
	}

	function __toString()
	{
		try
		{
			return (string)$this->render();
		} catch (\Exception $e)
		{
			ExceptionHandler::handle($e);
		}
	}

} 
