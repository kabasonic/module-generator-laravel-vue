<?php

namespace App\Factories;

class TypoModuleFactory implements ModuleFactory
{
    public function createJsFile(): string
    {
        return view('modules.typo.js')->render();
    }

    public function createHtmlFile(): string
    {
        return view('modules.typo.html')->render();
    }

    public function createCssFile(): string
    {
        return view('modules.typo.css')->render();
    }
}
