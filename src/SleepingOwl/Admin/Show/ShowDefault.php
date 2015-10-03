<?php namespace SleepingOwl\Admin\Show;

use AdminTemplate;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\View;
use SleepingOwl\Admin\Admin;
use SleepingOwl\Admin\Interfaces\DisplayInterface;
use SleepingOwl\Admin\Interfaces\ShowInterface;
use SleepingOwl\Admin\Interfaces\ShowItemInterface;
use SleepingOwl\Admin\Model\ModelConfiguration;
use SleepingOwl\Admin\Repository\BaseRepository;
use URL;

class ShowDefault implements Renderable, DisplayInterface, ShowInterface
{

	/**
	 * View to render
	 * @var string
	 */
	protected $view = 'default';
	/**
	 * Form related class
	 * @var string
	 */
	protected $class;
	/**
	 * Form related repository
	 * @var BaseRepository
	 */
	protected $repository;
	/**
	 * Form items
	 * @var ShowItemInterface[]
	 */
	protected $items = [];

	/**
	 * Form related model instance
	 * @var mixed
	 */
	protected $instance;
	/**
	 * Currently loaded model id
	 * @var int
	 */
	protected $id;
	/**
	 * Is form already initialized?
	 * @var bool
	 */
	protected $initialized = false;

	/**
	 * Initialize form
	 */
	public function initialize()
	{
		if ($this->initialized) return;

		$this->initialized = true;
		$this->repository = new BaseRepository($this->class);
		$this->instance(app($this->class));
		$items = $this->items();
		array_walk_recursive($items, function ($item)
		{
			if ($item instanceof ShowItemInterface)
			{
				$item->initialize();
			}
		});
	}


	/**
	 * Set form class
	 * @param string $class
	 */
	public function setClass($class)
	{
		if (is_null($this->class))
		{
			$this->class = $class;
		}
	}

	/**
	 * Get or set form items
	 * @param ShowInterface[]|null $items
	 * @return $this|ShowInterface[]
	 */
	public function items($items = null)
	{
		if (is_null($items))
		{
			return $this->items;
		}
		$this->items = $items;
		return $this;
	}

	/**
	 * Get or set form related model instance
	 * @param mixed|null $instance
	 * @return $this|mixed
	 */
	public function instance($instance = null)
	{
		if (is_null($instance))
		{
			return $this->instance;
		}
		$this->instance = $instance;
		$items = $this->items();
		array_walk_recursive($items, function ($item) use ($instance)
		{
			if ($item instanceof ShowItemInterface)
			{
				$item->setInstance($instance);
			}
		});
		return $this;
	}

	/**
	 * Set currently loaded model id
	 * @param int $id
	 */
	public function setId($id)
	{
		if (is_null($this->id))
		{
			$this->id = $id;
			$this->instance($this->repository->find($id));
		}
	}

	/**
	 * Get related form model configuration
	 * @return ModelConfiguration
	 */
	public function model()
	{
		return Admin::model($this->class);
	}

	/**
	 * @return View
	 */
	public function render()
	{
		$params = [
			'items'    => $this->items(),
			'instance' => $this->instance(),
			'backUrl'  => session('_redirectBack', URL::previous()),
		];
		return view(AdminTemplate::view('show.' . $this->view), $params);
	}

	/**
	 * @return string
	 */
	function __toString()
	{
		return (string)$this->render();
	}

}