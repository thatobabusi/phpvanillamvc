<?php
if ( !function_exists('dd') )
{
    /**
     * @param $variable
     */
    function dd($variable)
    {
        var_dump($variable);
        die();
    }
}

if ( !function_exists('start_debug') )
{
    /**
     * @return float|string
     */
    function start_debug()
    {
        return microtime(true);
    }
}

if ( !function_exists('end_debug') )
{
    /**
     * @param $executionStartTime
     */
    function end_debug($executionStartTime)
    {
        $executionEndTime = microtime(true);
        $seconds = $executionEndTime - $executionStartTime;

        dd("This script took $seconds to execute.");
    }
}
