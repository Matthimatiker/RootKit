<?php

namespace Matthimatiker\RootKit;

class KitTest extends \PHPUnit_Framework_TestCase
{
    public function testGetVendorDirectoryReturnsPathToDirectory()
    {
        $path = Kit::getVendorDirectory();

        $this->assertTrue(is_dir($path), '"' . $path . '" is not a directory path.');
    }

    public function testGetVendorDirectoryReturnsCorrectPath()
    {
        $vendorDirectory = __DIR__ . '/../vendor';

        $this->assertEquals(realpath($vendorDirectory), realpath(Kit::getVendorDirectory()));
    }

    public function testGetVendorDirectoryReturnsAbsolutePath()
    {
        $path = Kit::getVendorDirectory();

        $this->assertNotContains('..', $path);
    }

    public function testGetProjectRootReturnsPathToDirectory()
    {
        $path = Kit::getProjectRoot();

        $this->assertTrue(is_dir($path), '"' . $path . '" is not a directory path.');
    }

    public function testGetProjectRootReturnsCorrectPath()
    {
        $projectRoot = __DIR__ . '/..';

        $this->assertEquals(realpath($projectRoot), realpath(Kit::getProjectRoot()));
    }

    public function testGetProjectRootReturnsAbsolutePath()
    {
        $path = Kit::getProjectRoot();

        $this->assertNotContains('..', $path);
    }
}
