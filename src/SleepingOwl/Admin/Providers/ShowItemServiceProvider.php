<?php namespace SleepingOwl\Admin\Providers;

use Illuminate\Support\ServiceProvider;
use SleepingOwl\Admin\ShowItems\ShowItem;

class ShowItemServiceProvider extends ServiceProvider
{

	public function register()
	{
		ShowItem::register('text', \SleepingOwl\Admin\ShowItems\Text::class);
		//FormItem::register('time', 'SleepingOwl\Admin\FormItems\Time');
		//FormItem::register('date', 'SleepingOwl\Admin\FormItems\Date');
		//FormItem::register('timestamp', 'SleepingOwl\Admin\FormItems\Timestamp');
		//FormItem::register('textaddon', 'SleepingOwl\Admin\FormItems\TextAddon');
		//FormItem::register('select', 'SleepingOwl\Admin\FormItems\Select');
		//FormItem::register('multiselect', 'SleepingOwl\Admin\FormItems\MultiSelect');
		//FormItem::register('hidden', 'SleepingOwl\Admin\FormItems\Hidden');
		//FormItem::register('checkbox', 'SleepingOwl\Admin\FormItems\Checkbox');
		ShowItem::register('ckeditor', \SleepingOwl\Admin\ShowItems\CKEditor::class);
		//FormItem::register('custom', 'SleepingOwl\Admin\FormItems\Custom');
		//FormItem::register('password', 'SleepingOwl\Admin\FormItems\Password');
		//FormItem::register('textarea', 'SleepingOwl\Admin\FormItems\Textarea');
		//FormItem::register('view', 'SleepingOwl\Admin\FormItems\View');
		//FormItem::register('image', 'SleepingOwl\Admin\FormItems\Image');
		//FormItem::register('images', 'SleepingOwl\Admin\FormItems\Images');
		//FormItem::register('file', 'SleepingOwl\Admin\FormItems\File');
		//FormItem::register('radio', 'SleepingOwl\Admin\FormItems\Radio');
	}

}