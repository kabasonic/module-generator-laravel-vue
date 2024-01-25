<?php

namespace App\Services;

use App\Modules\BackgroundModule;
use App\Modules\DirectorModule;
use App\Modules\TypoModule;
use Symfony\Component\HttpFoundation\Response;

class ModuleService
{

    public function processModuleData(array $data): Response
    {
        $class = $this->getModuleFQCN($data['type']);
        $director = new DirectorModule(new $class($data));
        $director->build();

        return $director->generateZip();
    }

    private function getModuleFQCN(string $type): string
    {
        return match ($type) {
            BackgroundModule::MODULE_NAME => BackgroundModule::class,
            TypoModule::MODULE_NAME => TypoModule::class,
            default => throw new \RuntimeException('Module type is not defined'),
        };
    }

}
