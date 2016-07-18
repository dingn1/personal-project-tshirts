<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit548e9b621d1d718a7aaa8c7056f6ef1a
{
    public static $prefixLengthsPsr4 = array (
        'Q' => 
        array (
            'Quazardous\\' => 11,
        ),
        'G' => 
        array (
            'Garden\\Cli\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Quazardous\\' => 
        array (
            0 => __DIR__ . '/..' . '/quazardous/php-bump-version/src',
        ),
        'Garden\\Cli\\' => 
        array (
            0 => __DIR__ . '/..' . '/vanilla/garden-cli/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit548e9b621d1d718a7aaa8c7056f6ef1a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit548e9b621d1d718a7aaa8c7056f6ef1a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}