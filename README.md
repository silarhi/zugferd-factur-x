ZUGFeRD PHP
===========

[![Latest Stable Version](https://poser.pugx.org/silarhi/zugferd-factur-x/v/stable.png)](https://packagist.org/packages/silarhi/zugferd-factur-x) [![Total Downloads](https://poser.pugx.org/silarhi/zugferd-factur-x/downloads.png)](https://packagist.org/packages/silarhi/zugferd-factur-x) [![Latest Unstable Version](https://poser.pugx.org/silarhi/zugferd-factur-x/v/unstable.png)](https://packagist.org/packages/silarhi/zugferd-factur-x) [![License](https://poser.pugx.org/silarhi/zugferd-factur-x/license.png)](https://packagist.org/packages/silarhi/zugferd-factur-x)

XML generator for ZUGFeRD / Factur-X / XRechnung written in PHP. Convert PHP Objects to XML and back.

[Look @ Tests for more details](tests)

## Installation

The recommended way of installing this library is using [Composer](http://getcomposer.org/).

Add this repository to your composer information using the following command

```bash
composer require silarhi/zugferd-factur-x
```

## Usage ZUGFeRD v2.1

Convert XML to PHP Objects:

```php
use src\Reader;

$xml = file_get_contents('factur-x.xml');
$obj = Reader::create()->transform($xml);
```

Convert PHP Objects to XML:

```php
use src\Builder;
 
$obj = ...;

$xml = Builder::create()->transform($obj);
echo $xml; // Zugferd XML.
```

## Contributing

Please feel free to send bug reports and pull requests.

## License

Published as open source under the terms of [MIT License](http://opensource.org/licenses/MIT).
