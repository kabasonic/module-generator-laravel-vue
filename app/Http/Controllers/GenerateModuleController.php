<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModuleCreateRequest;
use App\Services\ModuleService;
use http\Exception\InvalidArgumentException;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class GenerateModuleController extends BaseController
{

    public function __construct(private readonly ModuleService $moduleService)
    {
    }

    public function create(ModuleCreateRequest $request): Response
    {
        $data = $request->validated();

        return $this->moduleService->processModuleData($data);
    }

}
