<?php

namespace App\Modules;

interface Module
{
    function createJs(): string;

    function createHtml(): string;

    function createCss(): string;
}
