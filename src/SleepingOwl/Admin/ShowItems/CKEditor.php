<?php namespace SleepingOwl\Admin\ShowItems;

use Exception;
use Input;
use SleepingOwl\Admin\AssetManager\AssetManager;
use SplFileInfo;
use stdClass;
use Symfony\Component\Finder\Finder;

class CKEditor extends NamedShowItem
{

	protected $view = 'ckeditor';

	public function initialize()
	{
		parent::initialize();

		AssetManager::addScript('admin::default/js/formitems/ckeditor/ckeditor.js');
	}
}