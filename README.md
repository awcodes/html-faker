# Html Faker

[![Latest Version on Packagist](https://img.shields.io/packagist/v/awcodes/faker-html.svg?style=flat-square)](https://packagist.org/packages/awcodes/faker-html)
[![Total Downloads](https://img.shields.io/packagist/dt/awcodes/faker-html.svg?style=flat-square)](https://packagist.org/packages/awcodes/faker-html)

## Installation

You can install the package via composer:

```bash
composer require awcodes/html-faker
```

## Usage

```php
use Awcodes\HtmlFaker\HtmlFaker;

HtmlFaker::make()
    ->heading(int | string | null $level = 2)
    ->paragraphs(int $count = 1, bool $withRandomLinks = false)
    ->unorderedList(int $count = 1)
    ->orderedList(int $count = 1)
    ->image(int $width = 640, int $height = 480, string $text = null)
    ->link(string $text = null, string $url = null)
    ->video(?string $provider = 'youtube', ?int $width = 640, ?int $height = 480)
    ->details()
    ->code(string | null $className = 'hljs')
    ->blockquote()
    ->hr()
    ->br()
    ->table()
    ->generate(); // <-- this is required to generate the html
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Adam Weston](https://github.com/awcodes)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
