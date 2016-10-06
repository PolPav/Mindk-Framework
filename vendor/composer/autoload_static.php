<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb0ff6fd9be11af405d3655595edfb8ad
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PolPav\\' => 7,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PolPav\\' => 
        array (
            0 => __DIR__ . '/..' . '/framework',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb0ff6fd9be11af405d3655595edfb8ad::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb0ff6fd9be11af405d3655595edfb8ad::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
