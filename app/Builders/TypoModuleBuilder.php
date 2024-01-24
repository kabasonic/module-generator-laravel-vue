<?php

namespace App\Builders;

use App\Factories\TypoModuleFactory;

class TypoModuleBuilder implements ModuleBuilder
{
    private $module;

    public function __construct()
    {
        $this->module = new TypoModuleFactory();
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

    public function getResult(): TypoModuleFactory
    {
        return $this->module;
    }
}
