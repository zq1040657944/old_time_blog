<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8e189817e4024938976441746ab07352
{
    public static $prefixLengthsPsr4 = array (
        'q' => 
        array (
            'qf\\' => 3,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'qf\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8e189817e4024938976441746ab07352::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8e189817e4024938976441746ab07352::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
