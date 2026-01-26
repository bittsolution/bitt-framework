<?php

namespace App\Kernel;

final class Path
{
    public static function config(string $file = ''): string
    {
        return BASE_PATH . '/service/config' . ($file ? '/' . $file : '');
    }
}
