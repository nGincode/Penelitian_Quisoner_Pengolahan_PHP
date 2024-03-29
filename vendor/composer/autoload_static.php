<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd41e52a1f65e528e1f2162f80e44c04a
{
    public static $files = array (
        'f0b9d51884e28b28685ab36b3a87f700' => __DIR__ . '/..' . '/pcrov/unicode/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'p' => 
        array (
            'pcrov\\JsonReader\\' => 17,
        ),
        'P' => 
        array (
            'Psr\\Http\\Message\\' => 17,
        ),
        'J' => 
        array (
            'JsonMachine\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'pcrov\\JsonReader\\' => 
        array (
            0 => __DIR__ . '/..' . '/pcrov/jsonreader/src',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'JsonMachine\\' => 
        array (
            0 => __DIR__ . '/..' . '/halaxa/json-machine/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd41e52a1f65e528e1f2162f80e44c04a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd41e52a1f65e528e1f2162f80e44c04a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd41e52a1f65e528e1f2162f80e44c04a::$classMap;

        }, null, ClassLoader::class);
    }
}
