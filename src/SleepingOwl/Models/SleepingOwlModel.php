<?php namespace SleepingOwl\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;
use SleepingOwl\Models\Interfaces\ValidationModelInterface;
use SleepingOwl\Models\Traits\DeleteAllModelTrait;
use SleepingOwl\Models\Traits\ModelWithImageOrFileFieldsTrait;
use SleepingOwl\Models\Traits\ValidationModelTrait;

/**
 * @method static defaultSort()
 */
abstract class SleepingOwlModel extends Model implements ValidationModelInterface
{
	use DeleteAllModelTrait, ValidationModelTrait, ModelWithImageOrFileFieldsTrait;

	/**
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function newQuery($excludeDeleted = true)
	{
		$query = parent::newQuery($excludeDeleted);
		$query->defaultSort();
		return $query;
	}

	/**
	 * @param $query
	 */
	public function scopeDefaultSort($query)
	{
		return $query;
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public static function withoutOrders()
	{
		$instance = new static;
		$query = $instance->newQuery();
		$query->getQuery()->orders = [];
		return $query;
	}

	/**
	 * @return \Eloquent
	 */
	public static function random()
	{
		return static::withoutOrders()->orderByRaw('RAND()')->first();
	}

	/**
	 * @param \DateTime|int $value
	 * @return Carbon|string
	 */
	public function fromDateTime($value)
	{
		try
		{
			$result = parent::fromDateTime($value);
		} catch (InvalidArgumentException $e)
		{
			$value = strtotime($value);
			$format = $this->getDateFormat();
			$value = Carbon::createFromTimestamp($value);
			return $value->format($format);
		}
		return $result;
	}


}