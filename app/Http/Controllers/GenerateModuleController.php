<?php

namespace App\Http\Controllers;

use App\Builders\BackgroundModuleBuilder;
use App\Builders\ModuleDirector;
use App\Factories\BackgroundModuleFactory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\File;
use ZipArchive;
use Illuminate\Support\Facades\View;

class GenerateModuleController extends BaseController
{
    public function create(Request $request): Response
    {
        $builder = new BackgroundModuleBuilder();
        $director = new ModuleDirector($builder);
        $director->buildBackgroundModule();
        $director->createZip();


        // Ścieżka do folderu tymczasowego, w którym utworzymy plik ZIP
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

//            $builder = new BackgroundModuleBuilder();
//            $director = new ModuleDirector(new BackgroundModuleBuilder());

            $module = new BackgroundModuleFactory();
            $zip->addFromString('index.html', $module->createHtmlFile());
            $zip->addFromString('style.css', $module->createCssFile());
            $zip->addFromString('script.js', $module->createJsFile());

            // Dodaj pliki CSS do archiwum
//            $cssFiles = ['reset.css', 'style.css'];
//            foreach ($cssFiles as $cssFile) {
//                $filePath = public_path($cssFile);
//                if (File::exists($filePath)) {
//                    $zip->addFile($filePath, $cssFile);
//                }
//            }

            // Zakończ i zamknij archiwum
            $zip->close();

            // Pobierz plik ZIP
            return response()->download($zipFilePath)->deleteFileAfterSend();
        } else {
            return response()->json(['error' => 'Nie udało się utworzyć pliku ZIP'], 500);
        }

//        $director = new ModuleDirector();
//        $firstModuleFactory = new BackgroundModuleBuilder();
//        $module = $director->construct($firstModuleFactory);

//        // Ścieżka do folderu tymczasowego, w którym utworzymy plik ZIP
//        $tempFolder = public_path('temp');
//
//        // Utwórz folder, jeśli nie istnieje
//        if (!File::exists($tempFolder)) {
//            File::makeDirectory($tempFolder);
//        }
//
//        // Nazwa pliku ZIP
//        $zipFileName = 'example.zip';
//        $zipFilePath = $tempFolder . '/' . $zipFileName;
//
//        // Utwórz nowy plik ZIP
//        $zip = new ZipArchive;
//        if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
//
//            // Dodaj plik HTML do archiwum
//            $htmlContent = View::make('example', $this->getBladeData())->render();
//            $zip->addFromString('example.html', $htmlContent);
//
//            // Dodaj pliki CSS do archiwum
//            $cssFiles = ['reset.css', 'style.css'];
//            foreach ($cssFiles as $cssFile) {
//                $filePath = public_path($cssFile);
//                if (File::exists($filePath)) {
//                    $zip->addFile($filePath, $cssFile);
//                }
//            }
//
//            // Zakończ i zamknij archiwum
//            $zip->close();
//
//            // Pobierz plik ZIP
//            return response()->download($zipFilePath)->deleteFileAfterSend();
//        } else {
//            return response()->json(['error' => 'Nie udało się utworzyć pliku ZIP'], 500);
//        }
    }

    private function getBladeData()
    {
        return [
            'title' => 'AppVerk - zadanie rekrutacyjne FullStack Developer 2024',
            'resetCss' => 'reset.css',
            'stylesCss' => 'styles.css',
            'bodyClass' => 'body',
            'mainClass' => 'main',
            'blockWidth' => '10%',
            'blockHeight' => '10%',
            'blockLeft' => '20%',
            'blockTop' => '10%',
        ];
    }
}
