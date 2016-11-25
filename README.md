# symfony-climate
Combine Symfony's [console output](http://symfony.com/doc/3.1/console/coloring.html) with The PHP League's [CLImate](http://climate.thephpleague.com/)

[![Build Status](https://img.shields.io/travis/duncan3dc/symfony-climate.svg)](https://travis-ci.org/duncan3dc/symfony-climate)
[![Latest Version](https://img.shields.io/packagist/v/duncan3dc/symfon-climate.svg)](https://packagist.org/packages/duncan3dc/symfony-climate)


## Installation

The recommended method of installing this library is via [Composer](//getcomposer.org/).

Run the following command from your project root:

```bash
$ composer require duncan3dc/symfony-climate
```


## Usage

```php
use duncan3dc\SymfonyCLImate\Output;

$output = new Output;

$output->blue("Blue? Wow!");
$output->dump($complexArray);
$output->writeln("<error>I am a symfony/console error</error>");
$output->error("I am a league/climate error");
```


## Changelog
A [Changelog](CHANGELOG.md) has been available since the beginning of time


## Where to get help
Found a bug? Got a question? Just not sure how something works?  
Please [create an issue](//github.com/duncan3dc/symfony-console/issues) and I'll do my best to help out.  
Alternatively you can catch me on [Twitter](https://twitter.com/duncan3dc)
