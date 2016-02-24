# This repo is not maintained anymore.

## Packet moved to https://github.com/LaravelRUS/SleepingOwlAdmin
### Versions prior to 4 are no longer supported. Further versions are now developed by LaravelRUS community.


## Laravel 5 Admin Module

[![Latest Stable Version](https://poser.pugx.org/sleeping-owl/admin/v/stable.svg)](https://packagist.org/packages/sleeping-owl/admin)
[![License](https://poser.pugx.org/sleeping-owl/admin/license.svg)](https://packagist.org/packages/sleeping-owl/admin)

*Note: if you are looking for the version for Laravel 4.2 check out [laravel-4.2 branch](https://github.com/sleeping-owl/admin/tree/laravel-4.2).*

SleepingOwl Admin is administrative interface builder for Laravel.

It includes:

 - [sb-admin-2 template](http://startbootstrap.com/template-overviews/sb-admin-2/)
 - [jQuery 1.11.3](http://jquery.com/)
 - [Bootstrap v3.3.5](http://getbootstrap.com)
 - [Bootstrap Multiselect v0.9.8](https://github.com/davidstutz/bootstrap-multiselect)
 - [DataTables 1.10.7](http://www.datatables.net)
 - [Lightbox 3.3.0 for Bootstrap 3](https://github.com/ashleydw/lightbox)
 - [Font Awesome 4.3.0](http://fontawesome.io)
 - [Metismenu 2.0.2](https://github.com/onokumus/metisMenu)
 - [morris.js v0.5.1](http://morrisjs.github.io/morris.js/)
 - [bootbox.js v4.3.0](http://bootboxjs.com)
 - [Bootstrap DatetimePicker 4.14.30-dev](http://eonasdan.github.io/bootstrap-datetimepicker/)
 - [CKEditor 4.5.0 Full](http://ckeditor.com)

## Installation

 1. Require this package in your composer.json and run composer update (or run `composer require sleeping-owl/admin` directly):

		"sleeping-owl/admin": "2.*"

 2. After composer update, add service providers to the `config/app.php`

            Laravel 4.1 - 5.0
	    'SleepingOwl\Admin\AdminServiceProvider',
	    'Illuminate\Html\HtmlServiceProvider',

            Laravel 5.1.*
            SleepingOwl\Admin\AdminServiceProvider::class,
	    Illuminate\Html\HtmlServiceProvider::class,

 3. Add this to the facades in `config/app.php`:

            Laravel 4.1 - 5.0
		'Admin'				=> 'SleepingOwl\Admin\Admin',
		'AdminAuth'			=> 'SleepingOwl\AdminAuth\Facades\AdminAuth',
		'AdminRouter'       => 'SleepingOwl\Admin\Facades\AdminRouter',
		'AssetManager' 		=> 'SleepingOwl\Admin\AssetManager\AssetManager',
		'Column'   			=> 'SleepingOwl\Admin\Columns\Column',
		'FormItem' 			=> 'SleepingOwl\Admin\Models\Form\FormItem',
		'ModelItem'			=> 'SleepingOwl\Admin\Models\ModelItem',
		
		'Form'      => 'Illuminate\Html\FormFacade',
		'Html'      => 'Illuminate\Html\HtmlFacade',

            Laravel 5.1.*
		'Admin'				=> SleepingOwl\Admin\Admin::class,
		'AdminAuth'			=> SleepingOwl\AdminAuth\Facades\AdminAuth::class,
		'AdminRouter'       => SleepingOwl\Admin\Facades\AdminRouter::class,
		'AssetManager' 		=> SleepingOwl\Admin\AssetManager\AssetManager::class,
		'Column'   			=> SleepingOwl\Admin\Columns\Column::class,
		'FormItem' 			=> SleepingOwl\Admin\Models\Form\FormItem::class,
		'ModelItem'			=> SleepingOwl\Admin\Models\ModelItem::class,
		
		'Form'      => Illuminate\Html\FormFacade::class,
		'Html'      => Illuminate\Html\HtmlFacade::class,

                

 4. Run this command in terminal (if you want to know what exactly this command makes, see [install command documentation](http://sleeping-owl.github.io/en/Commands/Install.html)):

		$ php artisan vendor:publish
		$ php artisan admin:install

## Documentation

Documentation can be found at [sleeping owl documentation](http://sleeping-owl.github.io).
You can also find it in the `/src/docs` directory.

## Demo Application

View [live demo](http://sleepingowladmindemo.cloudcontrolled.com/admin/login).

## Support Library

You can donate via [PayPal](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=AXJMWMRPCBGVA) or in BTC: 13k36pym383rEmsBSLyWfT3TxCQMN2Lekd

## Copyright and License

Admin was written by Sleeping Owl for the Laravel framework and is released under the MIT License. See the LICENSE file for details.
