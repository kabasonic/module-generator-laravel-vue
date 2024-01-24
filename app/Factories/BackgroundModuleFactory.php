<?php

namespace App\Factories;

use Illuminate\Support\Facades\View;

class BackgroundModuleFactory implements ModuleFactory
{
    public function createJsFile(): string
    {
        return View::make('modules.background.js')->render();

    }

    public function createHtmlFile(): string
    {
        return View::make('modules.background.html')->render();

    }

    public function createCssFile(): string
    {
        return View::make('modules.background.css')->render();
    }
}
