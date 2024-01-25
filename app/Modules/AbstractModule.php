<?php

namespace App\Modules;

use Illuminate\Support\Facades\View;

abstract class AbstractModule implements Module
{
    const VIEW_PATH = null;
    const MODULE_NAME = null;
    private array $commonData;

    public function __construct(array $commonData)
    {
        if(!static::VIEW_PATH || !static::MODULE_NAME){
            throw new \RuntimeException('Your should override VIEW_PATH and MODULE_NAME constants');
        }
        $this->commonData = $commonData;
    }

    public function createJs(): string
    {
        return View::make(static::VIEW_PATH . '.js', $this->commonData['script'])->render();
    }

    public function createHtml(): string
    {
        return View::make(static::VIEW_PATH . '.html')->render();
    }

    public function createCss(): string
    {
        return View::make(static::VIEW_PATH . '.css', $this->commonData['styles'])->render();
    }
}
