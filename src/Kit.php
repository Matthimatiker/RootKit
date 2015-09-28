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
     * @throws \RuntimeException If the root was not found.
     */
    public static function getProjectRoot()
    {
        $possibleRoot = dirname(static::getVendorDirectory());
        do {
            if (is_file($possibleRoot . '/composer.json')) {
                return $possibleRoot;
            }
            $possibleRoot = dirname($possibleRoot);
        } while (!static::isSystemRoot($possibleRoot));
        throw new \RuntimeException(
            'Cannot determine path to project root directory. ' .
            'It is assumed that the root directory contains the composer.json.'
        );
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

    /**
     * Checks if $path is the system root.
     *
     * Example:
     *
     *     static::isSystemRoot('/'); // returns true
     *     static::isSystemRoot('/src'); // returns false
     *
     * @param string $path
     * @return boolean
     */
    protected static function isSystemRoot($path)
    {
        return $path === dirname($path);
    }
}
