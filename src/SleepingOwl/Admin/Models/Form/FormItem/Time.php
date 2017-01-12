<?php namespace SleepingOwl\Admin\Models\Form\FormItem;

use SleepingOwl\DateFormatter\DateFormatter;

class Time extends BaseTime
{
	/**
	 * @var bool
	 */
	protected $showSeconds = false;
	
	/**
	* @var bool
	*/
	protected $nullable = false;

	/**
	 * @param mixed $showSeconds
	 * @return $this
	 */
	public function seconds($showSeconds)
	{
		$this->showSeconds = $showSeconds;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function render()
	{
		$this->attributes['data-date-pickdate'] = 'false';
		$this->attributes['data-date-useseconds'] = $this->showSeconds;
		return $this->formBuilder->datetime($this->name, $this->label, $this->getValueFromForm(), $this->attributes, DateFormatter::NONE, $this->showSeconds ? DateFormatter::MEDIUM : DateFormatter::SHORT);
	}
	
	/**
	* @param bool $nullable
	* @return $this
	*/
	public function nullable($nullable = true)
	{
		$this->nullable = $nullable;
		return $this;
	}
	/**
	* @param array $data
	*/
	public function updateRequestData(&$data)
	{
	
		if ($this->nullable && (!isset($data[$this->name]) || strlen($data[$this->name])==0))
		{
			$data[$this->name] = null;
		}
	}
}