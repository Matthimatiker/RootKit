<?php

namespace Matthimatiker\RootKit;

/**
 * Provides methods to determine the path to the project root and the vendor directory
 * in Composer enabled projects.
 */
class Kit
{
    /**
     * Returns the path to the root directory of the project.
     *
     * @return string
     */
    public static function getProjectRoot()
    {
        return dirname(static::getVendorDirectory());
    }

    /**
     * Returns the path to the vendor directory.
     *
     * @return string
     */
    public static function getVendorDirectory()
    {
        $reflection = new \ReflectionClass('\Composer\Autoload\ClassLoader');
        $classLoaderFilePath = $reflection->getFileName();
        return dirname(dirname($classLoaderFilePath));
    }
}
