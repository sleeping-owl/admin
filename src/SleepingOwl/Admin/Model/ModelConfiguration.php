<?php namespace SleepingOwl\Admin\Model;

use Illuminate\Support\Str;
use SleepingOwl\Admin\Interfaces\DisplayInterface;
use SleepingOwl\Admin\Interfaces\FormInterface;
use SleepingOwl\Admin\Interfaces\ShowInterface;
use SleepingOwl\Admin\Repository\BaseRepository;

class ModelConfiguration
{

	protected $class;

	protected $alias;
	protected $alt_aliases = [];
	protected $title;
	protected $display;
	protected $show;
	protected $create;
	protected $edit;
	protected $delete = true;
	protected $restore = true;

	function __construct($class)
	{
		$this->class = $class;
		$this->setDefaultAlias();
	}

	/**
	 * @return mixed
	 */
	public function getClass()
	{
		return $this->class;
	}

	public function repository()
	{
		return new BaseRepository($this->class);
	}

	protected function setDefaultAlias()
	{
		$alias = Str::snake(Str::plural(class_basename($this->class)));
		$this->alias($alias);
	}

	public function alias($alias = null)
	{
		if (func_num_args() == 0)
		{
			return $this->alias;
		}
		$this->alias = $alias;
		return $this;
	}

	/**
	 * Add an alternative alias or an array of alternative aliases
	 * @param string|array $alias
	 * @return $this
     */
	public function alt_alias($alias)
	{
		$alias = (array) $alias;
		$this->alt_aliases = array_merge($this->alt_aliases,$alias);
		return $this;
	}

	/**
	 * get alt_aliases array property or set the alt_aliases array property
	 * @param null|string|array $alt_aliases
	 * @return $this|array
     */

	public function alt_aliases($alt_aliases = null)
	{
		if (func_num_args() == 0)
		{
			return $this->alt_aliases;
		}
		$alt_aliases = (array) $alt_aliases;
		$this->alt_aliases = $alt_aliases;
		return $this;
	}

	public function title($title = null)
	{
		if (func_num_args() == 0)
		{
			return $this->title;
		}
		$this->title = $title;
		return $this;
	}

	public function create($create = null)
	{
		if (func_num_args() == 0)
		{
			return $this->getCreate();
		}
		$this->create = $create;
		return $this;
	}

	public function show($show = null)
	{
		if (func_num_args() == 0 || is_numeric($show))
		{
			return $this->getShow($show);
		}
		$this->show = $show;
		return $this;
	}

	public function edit($edit = null)
	{
		if ((func_num_args() == 0) || is_numeric($edit))
		{
			return $this->getEdit($edit);
		}
		$this->edit = $edit;
		return $this;
	}

	public function createAndEdit($callback)
	{
		$this->create($callback);
		$this->edit($callback);
		return $this;
	}

	public function createAndEditAndShow($callback)
	{
		$this->create($callback);
		$this->edit($callback);
		$this->show($callback);
		return $this;
	}

	public function delete($delete = null)
	{
		if ((func_num_args() == 0) || is_numeric($delete))
		{
			return $this->getDelete($delete);
		}
		$this->delete = $delete;
		return $this;
	}

	public function restore($restore = null)
	{
		if ((func_num_args() == 0) || is_numeric($restore))
		{
			return $this->getRestore($restore);
		}
		$this->restore = $restore;
		return $this;
	}

	public function display($display = null)
	{
		if (func_num_args() == 0)
		{
			return $this->getDisplay();
		}
		$this->display = $display;
		return $this;
	}

	protected function getDisplay()
	{
		$display = call_user_func($this->display);
		if ($display instanceof DisplayInterface)
		{
			$display->setClass($this->class);
			$display->initialize();
		}
		return $display;
	}

	protected function getShow()
	{
		if (is_null($this->show))
		{
			return null;
		}
		$show = call_user_func($this->show, null);
		if ($show instanceof DisplayInterface)
		{
			$show->setClass($this->class);
			$show->initialize();
		}
		if ($show instanceof FormInterface)
		{
			$show->setAction($this->storeUrl());
		}
		return $show;
	}

	protected function getCreate()
	{
		if (is_null($this->create))
		{
			return null;
		}
		$create = call_user_func($this->create, null);
		if ($create instanceof DisplayInterface)
		{
			$create->setClass($this->class);
			$create->initialize();
		}
		if ($create instanceof FormInterface)
		{
			$create->setAction($this->storeUrl());
		}
		return $create;
	}

	protected function getEdit($id)
	{
		if (is_null($this->edit))
		{
			return null;
		}
		$edit = call_user_func($this->edit, $id);
		if ($edit instanceof DisplayInterface)
		{
			$edit->setClass($this->class);
			$edit->initialize();
		}
		return $edit;
	}

	public function fullEdit($id)
	{
		$edit = $this->edit($id);
		if ($edit instanceof FormInterface)
		{
			$edit->setAction($this->updateUrl($id));
			$edit->setId($id);
		}
		return $edit;
	}

	public function fullShow($id)
	{
		$show = $this->show($id);
		if ($show instanceof ShowInterface)
		{
			$show->setId($id);
		}
		return $show;
	}

	protected function getDelete($id)
	{
		if (is_callable($this->delete))
		{
			return call_user_func($this->delete, $id);
		}
		return $this->delete;
	}

	protected function getRestore($id)
	{
		if (is_callable($this->restore))
		{
			return call_user_func($this->restore, $id);
		}
		return $this->restore;
	}

	public function displayUrl($parameters = [])
	{
		array_unshift($parameters, $this->alias());
		return route('admin.model', $parameters);
	}

	public function createUrl($parameters = [])
	{
		array_unshift($parameters, $this->alias());
		return route('admin.model.create', $parameters);
	}

	public function storeUrl()
	{
		return route('admin.model.store', $this->alias());
	}

	public function editUrl($id)
	{
		return route('admin.model.edit', [$this->alias(), $id]);
	}

	public function updateUrl($id)
	{
		return route('admin.model.update', [$this->alias(), $id]);
	}

	public function deleteUrl($id)
	{
		return route('admin.model.destroy', [$this->alias(), $id]);
	}

	public function restoreUrl($id)
	{
		return route('admin.model.restore', [$this->alias(), $id]);
	}

}