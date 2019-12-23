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
### Get Player By Nickname
```
$player = $client->getPlayerByNickname('neo');
```
#### Params
- nickname

#### Return
`Girni\Faceit\Model\Player` instance;

---

### Get Player Stats
```
$player = $client->getPlayerStats('d683100c-1452-47cc-af4a-b66efea476b0');
```

#### Params
- player id

#### Return
`Girni\Faceit\Model\PlayerStats` instance;

---

### Get Player Matches
```
$player = $client->getPlayerMatches('d683100c-1452-47cc-af4a-b66efea476b0', 30);
```

#### Params
- player id
- limit (default 30)

#### Return
`Girni\Faceit\Model\PlayerMatches` instance;

---


## Authors

* **Adrian Affek** - [in](https://www.linkedin.com/in/adrian-affek-945900142/)

## License

This project is licensed under the MIT License.