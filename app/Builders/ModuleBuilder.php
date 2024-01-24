<?php

namespace App\Builders;

interface ModuleBuilder
{
    public function buildJs(): void;
    public function buildHtml(): void;
    public function buildCss(): void;
//    public function getResult(): Module;
    public function getResult();
}
