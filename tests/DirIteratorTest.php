<?php

namespace Acadea\DirIterator\Tests;

use Acadea\DirIterator\DirIterator;
use PHPUnit\Framework\TestCase;

class DirIteratorTest extends TestCase
{
    public function test_all_files_in_dir_are_loaded()
    {
        $folderPath = __DIR__ . '/test-dirs';

        $files = DirIterator::getFiles($folderPath);

        $iteratedFilePaths = [];

        DirIterator::iterate(__DIR__ . '/test-dirs', function (\SplFileInfo $file, string $path) use (&$iteratedFilePaths) {
            $iteratedFilePaths[] = $path;
        });

        $this->assertSame(sizeof($files), sizeof($iteratedFilePaths));

        foreach ($files as $file) {
            $this->assertContainsEquals($file->getPathname(), $iteratedFilePaths, 'Could not find file in iterated. File: ' . $file->getPath());
        }
    }

    public function test_can_map_files()
    {
        $folderPath = __DIR__ . '/test-dirs';

        $results = DirIterator::map($folderPath, function (\SplFileInfo $fileInfo, string $path) {
            return $path;
        });

        $files = DirIterator::getFiles($folderPath);

        foreach ($files as $file) {
            $this->assertContainsEquals($file->getPathname(), $results, 'Could not find file in mapped. File: ' . $file->getPath());
        }
    }
}
