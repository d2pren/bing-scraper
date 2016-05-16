
Bing Scraper (In Progress)
========================

Scrapes search results from Bing Image and Web Search.

- [Installation](#installation)
- [Usage](#usage)
  - [Bing Image Search](#usage-image)
  - [Bing Web Search](#usage-web)

<a id="installation"></a>
## Installation

#### Composer and vanilla PHP

Add this package to your `composer.json` file with the following command

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php

# Add BingScraper as a dependency
php composer.phar require mojopollo/bing-scraper
```

Next, require Composer's autoloader in your application to automatically load the BingScraper class into your project:

```php
require 'vendor/autoload.php';
use Mojopollo\BingScraper;
```

#### Composer and Laravel 5

```bash
composer require mojopollo/bing-scraper
```

Next, add the following laravel 5 service provider by modifying your ```app/Providers/AppServiceProvider.php``` as so:

```php
public function register()
{
    $this->app->register('Mojopollo\BingScraper\BingScraperServiceProvider');
}
```


<a id="usage"></a>
## Usage


<a id="usage-image"></a>
#### Bing Image Search

In progress
