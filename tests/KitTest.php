<?php

namespace Matthimatiker\Scout;

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

        $path = Kit::getVendorDirectory();

        $this->assertExistingPath($path);
        $this->assertEquals(realpath($vendorDirectory), realpath($path));
    }

    public function testGetVendorDirectoryReturnsAbsolutePath()
    {
        $path = Kit::getVendorDirectory();

        $this->assertInternalType('string', $path);
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

        $path = Kit::getProjectRoot();

        $this->assertExistingPath($path);
        $this->assertEquals(realpath($projectRoot), realpath($path));
    }

    public function testGetProjectRootReturnsAbsolutePath()
    {
        $path = Kit::getProjectRoot();

        $this->assertInternalType('string', $path);
        $this->assertNotContains('..', $path);
    }

    /**
     * Asserts that the given path is not empty and points to an existing file or
     * directory.
     *
     * @param string|mixed $path
     */
    protected function assertExistingPath($path)
    {
        $this->assertInternalType('string', $path);
        $this->assertFileExists($path);
    }
}
