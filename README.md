# A simple PHP library to recursively find all files in a directory.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/acadea/dir-iterator.svg?style=flat-square)](https://packagist.org/packages/acadea/dir-iterator)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/acadea/dir-iterator/run-tests?label=tests)](https://github.com/acadea/dir-iterator/actions?query=workflow%3ATests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/acadea/dir-iterator/Check%20&%20fix%20styling?label=code%20style)](https://github.com/acadea/dir-iterator/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/acadea/dir-iterator.svg?style=flat-square)](https://packagist.org/packages/acadea/dir-iterator)



A lightweight PHP package to recursively iterate through a folder with ease. Based on [Symfony's Finder](https://symfony.com/doc/current/components/finder.html) and PHP's [Recursive Iterator](https://www.php.net/manual/en/class.recursiveiteratoriterator.php)

## Support us

We invest a lot of resources into creating open source packages. You can support us subscribing to our [Youtube channel](https://www.youtube.com/channel/UCU5RsUGkVcPM9QvFHyKm1OQ) (we have a lot of tutorials on web development!) or by [joining our Learning Portal](https://acadea.io/learn).



## Installation

You can install the package via composer:

```bash
composer require acadea/dir-iterator
```

## Usage

```php

// get all the files in a folder
// $file is an array of SplFileInfo object
$files = \Acadea\DirIterator\DirIterator::getFiles('path/to/folder');

// recursively iterate through a folder
\Acadea\DirIterator\DirIterator::iterate('path/to/folder', function (SplFileInfo $fileInfo, string $filePath){
    // ....
}); 

// map all the files in a folder
$results = \Acadea\DirIterator\DirIterator::map('path/to/folder', function (SplFileInfo $fileInfo, string $filePath){
    // ... 
    return 'something';
});

print_r($results); // $results should be an array of 'something'

```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [sam-ngu](https://github.com/sam-ngu)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
