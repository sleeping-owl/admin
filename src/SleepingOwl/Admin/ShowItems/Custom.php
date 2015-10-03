<?php namespace SleepingOwl\Admin\ShowItems;

class Custom extends BaseShowItem
{

	protected $display;
	protected $callback;

	public function display($display = null)
	{
		if (is_null($display))
		{
			if (is_callable($this->display))
			{
				return call_user_func($this->display, $this->instance());
			}
			return $this->display;
		}
		$this->display = $display;
		return $this;
	}


	public function render()
	{
		return $this->display();
	}

}