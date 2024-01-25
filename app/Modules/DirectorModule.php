<?php

namespace App\Modules;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use ZipArchive;

class DirectorModule
{

    private array $array = [];

    public function __construct(private Module $module)
    {
    }

    public function build(): void
    {
        $this->array['style.css'] = $this->module->createCss();
        $this->array['index.html'] = $this->module->createHtml();
        $this->array['script.js'] = $this->module->createJs();
    }

    public function generateZip(): BinaryFileResponse|JsonResponse
    {
        $tempFolder = public_path('temp');

        if (!File::exists($tempFolder)) {
            File::makeDirectory($tempFolder);
        }

        $zipFileName = 'module.zip';
        $zipFilePath = $tempFolder . '/' . $zipFileName;

        $zip = new ZipArchive;

        if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
            foreach ($this->array as $filename => $strContent) {
                $zip->addFromString($filename, $strContent);
            }
            $zip->close();

            return response()->download($zipFilePath)->deleteFileAfterSend();
        }

        return response()->json(['error' => 'Error during ZIP archive creating'], 500);
    }

}
