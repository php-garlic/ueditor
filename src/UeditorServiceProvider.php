<?php

namespace PhpGarlic\UEditor;

use Dcat\Admin\Extend\ServiceProvider;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;


class UeditorServiceProvider extends ServiceProvider
{
    const NAME = 'ueditor';

    protected $views = __DIR__.'/../resources/views';

    protected $assets = __DIR__.'/../resources/assets';

    protected $lang = __DIR__.'/../resources/lang';

    protected $composer = __DIR__.'/../composer.json';



	public function init()
	{
		parent::init();
        $this->load();

	}

	protected function load ()
    {
        $this->loadViewsFrom($this->views, self::NAME);

        $this->loadTranslationsFrom($this->lang, self::NAME);


        if ($this->app->runningInConsole() || request()->getMethod() == 'POST') {
            $this->publishes([__DIR__.'/../config' => config_path()]);
        }

        Form::extend('ueditor', \PhpGarlic\UEditor\Form\UEditor::class);
    }

	public function settingForm()
	{
		return new Setting($this);
	}
}
