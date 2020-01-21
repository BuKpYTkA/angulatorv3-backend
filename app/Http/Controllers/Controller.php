<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @return string
     */
    public static function controller()
    {
        return str_replace('App\Http\Controllers\\', '', static::class);
    }

    /**
     * @return array
     */
    protected function emptyResponse()
    {
        return ['data' => []];
    }

}
