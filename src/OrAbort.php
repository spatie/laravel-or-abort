<?php

namespace Spatie\OrAbort;

use ReflectionMethod;

trait OrAbort
{
    public function __call($methodName, array $args)
    {
        if (ends_with($methodName, 'OrAbort')) {
            $realMethodName = substr($methodName, 0, -7);

            $abortCode = null;

            $originalMethodParameterCount = (new ReflectionMethod($this, $realMethodName))->getNumberOfParameters();

            if (($originalMethodParameterCount + 1) == count($args)) {
                $abortCode = array_pop($args);
            }

            $originalMethodResult = call_user_func_array([$this, $realMethodName], $args);

            if ($originalMethodResult == false) {
                return abort($abortCode ?: 404);
            }

            return $originalMethodResult;
        }


        trigger_error('Call to undefined method '.__CLASS__.'::'.$methodName.'()', E_USER_ERROR);
    }
}
