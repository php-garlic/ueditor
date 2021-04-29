<?php

namespace PhpGarlic\UEditor;

use Illuminate\Support\Arr;

class Ueditor
{
    const NAME = 'ueditor';

    public $serviceProvider = UeditorServiceProvider::class;

    public static function getUploadConfig($key = null, $default = null)
    {
        $config = config('ueditor') ?: (include __DIR__.'/../config/ueditor.php');

        if ($key === null) {
            return $config;
        }

        return Arr::get($config, $key, $default);
    }
}
