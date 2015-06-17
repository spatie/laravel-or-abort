<?php

/**
 * A dummy abort function.
 *
 * @param string $code
 * @return string
 */
function abort($code)
{
    return 'aborted-'.$code;
}