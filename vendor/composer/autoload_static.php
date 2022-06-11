<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1867abf6b70585930bfabc4e0f1b0c82
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Predis\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Predis\\' => 
        array (
            0 => __DIR__ . '/..' . '/predis/predis/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1867abf6b70585930bfabc4e0f1b0c82::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1867abf6b70585930bfabc4e0f1b0c82::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1867abf6b70585930bfabc4e0f1b0c82::$classMap;

        }, null, ClassLoader::class);
    }
}
