<?php

namespace Spatie\OrAbort\Test;

use Spatie\OrAbort\OrAbort;

class TestClass
{
    use OrAbort;

    /**
     * This function will return a fixed string.
     *
     * @return string
     */
    public function returnString()
    {
        return 'string';
    }

    /**
     * This function will return null.
     *
     * @return string
     */
    public function returnNull()
    {
        return;
    }

    /**
     * This function will return all given arguments.
     *
     * @param string $first
     *
     * @return string
     */
    public function singleParameter($first)
    {
        return $first;
    }

    /**
     * This function will return null.
     *
     * @param string $first
     *
     * @return string
     */
    public function singleParameterReturnsNull($first)
    {
        return;
    }

    /**
     * This function will return all given arguments.
     *
     * @param string $first
     * @param $second
     *
     * @return string
     */
    public function multipleParameters($first, $second)
    {
        return $first.$second;
    }

    /**
     * This function will return all given arguments.
     *
     * @param string $first
     * @param $second
     *
     * @return string
     */
    public function multipleParametersReturnsNull($first, $second)
    {
        return;
    }
}
