# Faceit API Client PHP Library

A PHP client library for accessing Faceit API

---
## Installation by Composer
Run
```php   
composer require girni/faceit-php
``` 
in console to install this library.

---

## Usage

First, you need to initialize the Credentials and Client objects.

### Load library and set up credentials

```
use Girni\Faceit\Faceit;
use Girni\Faceit\Config\Credentials;
use GuzzleHttp\Client;

$client = new Faceit(new Client(), new Credentials('api-key'));
```

---


## Authors

* **Adrian Affek** - [in](https://www.linkedin.com/in/adrian-affek-945900142/)

## License

This project is licensed under the MIT License.