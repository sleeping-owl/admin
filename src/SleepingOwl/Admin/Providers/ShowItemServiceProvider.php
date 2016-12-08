<?php namespace SleepingOwl\Admin\Providers;

use Illuminate\Support\ServiceProvider;
use SleepingOwl\Admin\ShowItems\ShowItem;

class ShowItemServiceProvider extends ServiceProvider
{

	public function register()
	{
		ShowItem::register('text', \SleepingOwl\Admin\ShowItems\Text::class);
		//ShowItem::register('time', 'SleepingOwl\Admin\ShowItems\Time');
		//ShowItem::register('date', 'SleepingOwl\Admin\ShowItems\Date');
		//ShowItem::register('timestamp', 'SleepingOwl\Admin\ShowItems\Timestamp');
		//ShowItem::register('textaddon', 'SleepingOwl\Admin\ShowItems\TextAddon');
		ShowItem::register('select', 'SleepingOwl\Admin\ShowItems\Select');
		ShowItem::register('multiselect', 'SleepingOwl\Admin\ShowItems\MultiSelect');
		//ShowItem::register('hidden', 'SleepingOwl\Admin\ShowItems\Hidden');
		ShowItem::register('checkbox', \SleepingOwl\Admin\ShowItems\Checkbox::class);
		ShowItem::register('ckeditor', \SleepingOwl\Admin\ShowItems\CKEditor::class);
		ShowItem::register('custom', 'SleepingOwl\Admin\ShowItems\Custom');
		//ShowItem::register('password', 'SleepingOwl\Admin\ShowItems\Password');
		//ShowItem::register('textarea', 'SleepingOwl\Admin\ShowItems\Textarea');
		ShowItem::register('view', 'SleepingOwl\Admin\ShowItems\View');
		//ShowItem::register('image', 'SleepingOwl\Admin\ShowItems\Image');
		//ShowItem::register('images', 'SleepingOwl\Admin\ShowItems\Images');
		//ShowItem::register('file', 'SleepingOwl\Admin\ShowItems\File');
		//ShowItem::register('radio', 'SleepingOwl\Admin\ShowItems\Radio');
	}

}