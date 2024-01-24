<?php

namespace App\Builders;

use Illuminate\Support\Facades\File;
use ZipArchive;

class ModuleDirector
{
    private ModuleBuilder $builder;

    public function __construct(ModuleBuilder $builder)
    {
        $this->builder = $builder;
    }

    public function buildBackgroundModule()
    {
        $this->builder->buildJs();
        $this->builder->buildCss();
        $this->builder->buildHtml();
    }

    public function buildTypoModule()
    {
        $this->builder->buildJs();
        $this->builder->buildCss();
        $this->builder->buildHtml();
    }

    public function createZip()
    {
        $tempFolder = public_path('temp');

        // Utwórz folder, jeśli nie istnieje
        if (!File::exists($tempFolder)) {
            File::makeDirectory($tempFolder);
        }

        // Nazwa pliku ZIP
        $zipFileName = 'example.zip';
        $zipFilePath = $tempFolder . '/' . $zipFileName;

        // Utwórz nowy plik ZIP
        $zip = new ZipArchive;

        if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
//            $zip->addFromString('index.html', $module->createHtmlFile());
//            $zip->addFromString('style.css', $module->createCssFile());
//            $zip->addFromString('script.js', $module->createJsFile());
        }

        return $this->builder->getResult();
    }

}
