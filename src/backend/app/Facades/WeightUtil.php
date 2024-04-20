<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class WeightUtil extends Facade
{
    /**
     * App\Utils\WeightUtil
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'WeightUtil';
    }
}
