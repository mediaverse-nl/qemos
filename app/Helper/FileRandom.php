<?php

namespace App\Helper;

/**
 * Created by PhpStorm.
 * User: deveron reniers
 * Date: 26-9-2017
 * Time: 09:33
 */
class fileRandom
{

    public static function file($dir = 'image')
    {
        $files = glob($dir . '/*.*');
        $file = array_rand($files);
        return $files[$file];
    }

}