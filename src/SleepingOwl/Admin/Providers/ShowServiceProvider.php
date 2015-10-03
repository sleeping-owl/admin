<?php namespace SleepingOwl\Admin\Providers;

use Illuminate\Support\ServiceProvider;
use SleepingOwl\Admin\Show\AdminShow;

class ShowServiceProvider extends ServiceProvider
{

	public function register()
	{
		AdminShow::register('show', \SleepingOwl\Admin\Show\ShowDefault::class);
	}

}