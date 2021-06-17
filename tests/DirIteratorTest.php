<?php

namespace Acadea\DirIterator\Tests;

use Acadea\DirIterator\DirIterator;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Finder\Finder;

class DirIteratorTest extends TestCase
{


    public function test_all_files_in_dir_are_loaded()
    {
        $folderPath = __DIR__ . '/test-dirs';
        $dirIterator = new \recursiveDirectoryIterator($folderPath);
        /** @var \RecursiveDirectoryIterator | \RecursiveIteratorIterator $it */
        $it = new \recursiveIteratorIterator($dirIterator);

        $files = DirIterator::getFiles($folderPath);

        $iteratedFilePaths = [];

        DirIterator::iterate(__DIR__ . '/test-dirs', function (\SplFileInfo $file, string $path) use(&$iteratedFilePaths) {
            $iteratedFilePaths[] = $path;
        });

        $this->assertSame(sizeof($files), sizeof($iteratedFilePaths));

        foreach ($files as $file){
            $this->assertContainsEquals($file->getPathname(), $iteratedFilePaths, 'Could not find file in iterated. File: ' . $file->getPath());
        }

    }

    
}