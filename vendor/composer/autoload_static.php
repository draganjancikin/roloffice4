<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd03256b155efdbd38f521527ef6485c8
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Roloffice\\Core\\' => 15,
            'Roloffice\\Controller\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Roloffice\\Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Core',
        ),
        'Roloffice\\Controller\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Controller',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Roloffice\\Controller\\AdminController' => __DIR__ . '/../..' . '/src/Controller/AdminController.php',
        'Roloffice\\Controller\\ArticleController' => __DIR__ . '/../..' . '/src/Controller/ArticleController.php',
        'Roloffice\\Controller\\ClientController' => __DIR__ . '/../..' . '/src/Controller/ClientController.php',
        'Roloffice\\Controller\\ContactController' => __DIR__ . '/../..' . '/src/Controller/ContactController.php',
        'Roloffice\\Controller\\CuttingController' => __DIR__ . '/../..' . '/src/Controller/CuttingController.php',
        'Roloffice\\Controller\\MaterialController' => __DIR__ . '/../..' . '/src/Controller/MaterialController.php',
        'Roloffice\\Controller\\OrderController' => __DIR__ . '/../..' . '/src/Controller/OrderController.php',
        'Roloffice\\Controller\\PidbController' => __DIR__ . '/../..' . '/src/Controller/PidbController.php',
        'Roloffice\\Controller\\ProjectController' => __DIR__ . '/../..' . '/src/Controller/ProjectController.php',
        'Roloffice\\Core\\Database' => __DIR__ . '/../..' . '/src/Core/Database.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd03256b155efdbd38f521527ef6485c8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd03256b155efdbd38f521527ef6485c8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd03256b155efdbd38f521527ef6485c8::$classMap;

        }, null, ClassLoader::class);
    }
}
