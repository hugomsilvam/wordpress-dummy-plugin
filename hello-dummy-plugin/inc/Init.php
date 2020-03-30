<?php

namespace Inc;

// Prevent this class to be extended from other class.
final class Init
{

    /**
     * Store all classes inside an array
     * @return an array of classes
     */
    static function services()
    {
        return [
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\SettingsLinks::class
        ];
    }

    /**
     * Loop through services array classes and instanciate each class.
     * Call register() method if exists on the class.
     */
    static function register_services()
    {
        // use self (same as "this" but for classes that dont have being initialized)
        foreach (self::services() as $class) {
            $service = self::instanciate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }

    /**
     * Initialize the class
     * @param class $class class from the service array
     * @return new instance of the class
     */
    private static function instanciate($class)
    {
        return new $class();
    }
}
