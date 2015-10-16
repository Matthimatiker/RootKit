<?php

namespace Matthimatiker\Scout;

class ScoutTest extends \PHPUnit_Framework_TestCase
{
    public function testGetVendorDirectoryReturnsPathToDirectory()
    {
        $path = Scout::getVendorDirectory();

        $this->assertTrue(is_dir($path), '"' . $path . '" is not a directory path.');
    }

    public function testGetVendorDirectoryReturnsCorrectPath()
    {
        $vendorDirectory = __DIR__ . '/../vendor';

        $path = Scout::getVendorDirectory();

        $this->assertExistingPath($path);
        $this->assertEquals(realpath($vendorDirectory), realpath($path));
    }

    public function testGetVendorDirectoryReturnsAbsolutePath()
    {
        $path = Scout::getVendorDirectory();

        $this->assertInternalType('string', $path);
        $this->assertNotContains('..', $path);
    }

    public function testGetProjectRootReturnsPathToDirectory()
    {
        $path = Scout::getProjectRoot();

        $this->assertTrue(is_dir($path), '"' . $path . '" is not a directory path.');
    }

    public function testGetProjectRootReturnsCorrectPath()
    {
        $projectRoot = __DIR__ . '/..';

        $path = Scout::getProjectRoot();

        $this->assertExistingPath($path);
        $this->assertEquals(realpath($projectRoot), realpath($path));
    }

    public function testGetProjectRootReturnsAbsolutePath()
    {
        $path = Scout::getProjectRoot();

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
