<?php

namespace App\Builders;

use App\Factories\BackgroundModuleFactory;

class BackgroundModuleBuilder implements ModuleBuilder
{
    private $module;

    public function __construct()
    {
        $this->module = new BackgroundModuleFactory();
    }

    public function buildJs(): void
    {
        $this->module->createJsFile();
    }

    public function buildHtml(): void
    {
        $this->module->createHtmlFile();
    }

    public function buildCss(): void
    {
        $this->module->createCssFile();
    }

    public function getResult(): BackgroundModuleFactory
    {
        return $this->module;
    }
}
