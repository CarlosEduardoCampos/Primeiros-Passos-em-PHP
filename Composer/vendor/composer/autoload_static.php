<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4aaf1cd720ee0ce255c43ae97a8950a9
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Carlos\\Composer\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Carlos\\Composer\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'M' => 
        array (
            'Monolog' => 
            array (
                0 => __DIR__ . '/..' . '/monolog/monolog/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4aaf1cd720ee0ce255c43ae97a8950a9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4aaf1cd720ee0ce255c43ae97a8950a9::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit4aaf1cd720ee0ce255c43ae97a8950a9::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit4aaf1cd720ee0ce255c43ae97a8950a9::$classMap;

        }, null, ClassLoader::class);
    }
}
