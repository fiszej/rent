<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9b9ecef50ca2c0b14d9295ebda251a2f
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Faker\\Provider\\' => 15,
            'Faker\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Faker\\Provider\\' => 
        array (
            0 => __DIR__ . '/..' . '/pelmered/fake-car/src',
        ),
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fzaninotto/faker/src/Faker',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9b9ecef50ca2c0b14d9295ebda251a2f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9b9ecef50ca2c0b14d9295ebda251a2f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9b9ecef50ca2c0b14d9295ebda251a2f::$classMap;

        }, null, ClassLoader::class);
    }
}