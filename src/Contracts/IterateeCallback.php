<?php


namespace Acadea\DirIterator\Contracts;

interface IterateeCallback
{
    public function __invoke(\SplFileInfo $fileInfo, string $path);
}
