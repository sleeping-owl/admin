<?php namespace SleepingOwl\Admin\ShowItems;

use Input;

abstract class NamedShowItem extends BaseShowItem
{

	protected $path;
	protected $name;
	protected $attribute;
	protected $label;

	function __construct($path, $label = null)
	{
		$this->label = $label;
		$parts = explode(".", $path);
		if (count($parts) > 1) {
			$this->path = $path;
			$this->name = $parts[0] . "[" . implode("][", array_slice($parts, 1)) . "]";
			$this->attribute = implode(".", array_slice(explode(".", $path), -1, 1));
		} else {
			$this->path = $path;
			$this->name = $path;
			$this->attribute = $path;
		}
	}

	public function path($path = null)
	{
		if (is_null($path))
		{
			return $this->path;
		}
		$this->path = $path;
		return $path;
	}

	public function attribute($attribute = null)
	{
		if (is_null($attribute))
		{
			return $this->attribute;
		}
		$this->attribute = $attribute;
		return $attribute;
	}

	public function name($name = null)
	{
		if (is_null($name))
		{
			return $this->name;
		}
		$this->name = $name;
		return $this;
	}

	public function label($label = null)
	{
		if (is_null($label))
		{
			return $this->label;
		}
		$this->label = $label;
		return $this;
	}

	public function getParams()
	{
		return parent::getParams() + [
			'name'      => $this->name(),
			'label'     => $this->label(),
			'value'     => $this->value()
		];
	}

	public function value()
	{
		$instance = $this->instance();
		if ( ! is_null($instance) && ! is_null($value = $instance->getAttribute($this->attribute())))
		{
			return $value;
		}
		return null;
	}

}
