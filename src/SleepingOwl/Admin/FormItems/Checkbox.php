<?php namespace SleepingOwl\Admin\FormItems;

use Request;

class Checkbox extends NamedFormItem
{

	protected $view = 'checkbox';

	public function save()
	{
		$name = $this->name();
		if ( ! Request::has($name))
		{
			Request::merge([$name => 0]);
		}
		parent::save();
	}


}
