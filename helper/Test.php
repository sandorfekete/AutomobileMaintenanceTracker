<?php

class Test
{
    
    public static function assertTrue($value, $condition = '')
    {
        if ($value)
        {
            echo '<b><span style="color:' . CLR_GREEN . '">*PASS*</span> - assertTrue : </b>' . $condition . '<br>';
            return true;
        }
        else
        {
            echo '<b><span style="color:' . CLR_RED . '">*FAIL*</span> - assertTrue : </b>' . $condition . '<br>';
            return false;
        }
    }

    public static function assertFalse($value, $condition = '')
    {
        if (!$value)
        {
            echo '<b><span style="color:' . CLR_GREEN . '">*PASS*</span> - assertFalse : </b>' . $condition . '<br>';
            return true;
        }
        else
        {
            echo '<b><span style="color:' . CLR_RED . '">*FAIL*</span> - assertFalse : </b>' . $condition . '<br>';
            return false;
        }
    }

    public static function assertDefined($var, $condition = '')
    {
        if (defined($var))
        {
            echo '<b><span style="color:' . CLR_GREEN . '">*PASS*</span> - assertDefined : </b>' . $condition . '<br>';
            return true;
        }
        else
        {
            echo '<b><span style="color:' . CLR_RED . '">*FAIL*</span> - assertDefined : </b>' . $condition . '<br>';
            return false;
        }
    }
    
}