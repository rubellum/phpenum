# phpenum

[![Build Status](https://travis-ci.org/rubellum/phpenum.svg?branch=master)](https://travis-ci.org/rubellum/phpenum)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

Enumeration objects in PHP.

## Install

Via [Composer](https://getcomposer.org/)

```bash
$ composer require rubellum/phpenum
```

Requires PHP 5.5 or newer.

## Usage

```php
<?php

use Enum\Enum;

/**
 * Class Access
 * @method static Access ALLOW()
 * @method static Access DENY()
 */
final class Access extends Enum
{
    const ALLOW = 'allow';
    const DENY  = 'deny';
}
```

## Testing

```bash
$ ./vendor/bin/phpunit
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
