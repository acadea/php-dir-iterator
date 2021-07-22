<?php

namespace Acadea\DirIterator;

use Acadea\DirIterator\Contracts\IterateeCallback;
use Symfony\Component\Finder\Finder;

class DirIterator
{
    /**
     * @param string $folderPath
     * @return \SplFileInfo[]
     */
    public static function getFiles(string $folderPath): array
    {
        $finder = Finder::create()->in($folderPath)->files();

        $files = [];

        foreach ($finder as $file) {
            $files[] = $file;
        }

        return $files;
    }

    /**
     * Iterate through all files in a directory
     * @param string $folderPath
     * @param IterateeCallback $iteratee
     */
    public static function iterate(string $folderPath, callable $iteratee)
    {
        try {
            $dirIterator = new \RecursiveDirectoryIterator($folderPath);
            /** @var \RecursiveDirectoryIterator | \RecursiveIteratorIterator $it */
            $it = new \RecursiveIteratorIterator($dirIterator);

            // the valid() method checks if current position is valid eg there is a valid file or directory at the current position
            while ($it->valid()) {
                // isDot to make sure it is not current or parent directory
                //
                if (! $it->isDot() && $it->isFile() && $it->isReadable()) {
                    $iteratee($it->current(), $it->key());
                }

                $it->next();
            }
        } catch (\Exception $e) {
            dump($e);
            echo $e->getMessage();
            throw $e;
        }
    }

    public static function map(string $folderPath, callable $iteratee)
    {
        $results = [];
        DirIterator::iterate($folderPath, function (\SplFileInfo $fileInfo, string $path) use (&$results, $iteratee) {
            $results[] = $iteratee($fileInfo, $path);
        });

        return $results;
    }
}
