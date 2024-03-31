<?php

namespace Yormy\Apiresponse\Facades;

use Illuminate\Support\Facades\Facade;
use Yormy\Apiresponse\Services\ApiResponseService;

/**
 * Class ApiResponse
 *
 * @mixin \Yormy\Apiresponse\Services\ApiResponseService
 */
class ApiResponse extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ApiResponseService::class;
    }
}
