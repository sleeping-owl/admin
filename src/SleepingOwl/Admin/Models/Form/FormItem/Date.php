<?php namespace SleepingOwl\Admin\Models\Form\FormItem;

class Date extends BaseTime
{
	
	/**
	* @var bool
	*/
	protected $nullable = false;

	public function render()
		{
			$this->attributes['data-date-picktime'] = false;
			return $this->formBuilder->datetime($this->name, $this->label, $this->getValueFromForm(), $this->attributes);
		}
		public function getValidationRules()
		{
			$rules = parent::getValidationRules();
			$rules[] = 'date:locale';
			return $rules;
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