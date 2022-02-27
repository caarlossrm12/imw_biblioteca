<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit04f826b54bc4933b4004f575fb5a56de
{
    public static $prefixLengthsPsr4 = array (
        'e' => 
        array (
            'eftec\\bladeone\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'eftec\\bladeone\\' => 
        array (
            0 => __DIR__ . '/..' . '/eftec/bladeone/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit04f826b54bc4933b4004f575fb5a56de::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit04f826b54bc4933b4004f575fb5a56de::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit04f826b54bc4933b4004f575fb5a56de::$classMap;

        }, null, ClassLoader::class);
    }
}
