<?php

namespace App\Factories;

interface ModuleFactory
{
    public function createJsFile(): string;
    public function createHtmlFile(): string;
    public function createCssFile(): string;
}
