<?php namespace SleepingOwl\Admin\ShowItems;

class View extends Custom
{

	protected $view;

	function __construct($view)
	{
		$this->view($view);
	}

	public function view($view = null)
	{
		if (is_null($view))
		{
			return $this->view;
		}
		$this->view = $view;
		$this->display(function ($instance)
		{
			return view($this->view(), ['instance' => $instance]);
		});
		return $this;
	}

}