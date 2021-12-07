# DevCycle PHP SDK

Welcome to the the DevCycle PHP SDK, initially generated via the [DevCycle Bucketing API](https://docs.devcycle.com/bucketing-api/#tag/devcycle).

## Requirements

PHP 7.3 and later.

## Installation

### Composer Installation

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

```json
{
  "require": {
    "devcycle/php-server-sdk": "*"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/DevCycle/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: bearerAuth
$config = DevCycle\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');

$apiInstance = new DevCycle\Api\DVCClient(
    $config,
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
);
$user_data = new \DevCycle\Model\UserData(array(
  "user_id"=>"my-user"
)); // \DevCycle\Model\UserData

try {
    $result = $apiInstance->allFeatures($user_data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DVCClient->allFeatures: ', $e->getMessage(), PHP_EOL;
}

```

## Usage

### Get variable by key
```php
try {
    $result = $apiInstance->variable($user_data, "my-key", "default");
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DVCClient->variable: ', $e->getMessage(), PHP_EOL;
}
```

### Get all variables
```php
try {
    $result = $apiInstance->allVariables($user_data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DVCClient->allVariables: ', $e->getMessage(), PHP_EOL;
}
```

### Get all Features
```php
try {
    $result = $apiInstance->allFeatures($user_data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DVCClient->allFeatures: ', $e->getMessage(), PHP_EOL;
}
```

### Track Event
```php
$event_data = new \DevCycle\Model\Event(array(
  "type"=>"my-event"
));

try {
    $result = $apiInstance->track($user_data, $event_data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DVCClient->track: ', $e->getMessage(), PHP_EOL;
}
```

## Async Methods

Each method in the [Usage](#Usage) section has a corresponding asynchronous method:
```php
    $result = $apiInstance->allVariables($user_data);
    $apiInstance->allVariablesAsync($user_data)->then(function($result) {
      print_r($result);
    });
```

## Models

- [ErrorResponse](docs/Model/ErrorResponse.md)
- [Event](docs/Model/Event.md)
- [Feature](docs/Model/Feature.md)
- [UserData](docs/Model/UserData.md)
- [Variable](docs/Model/Variable.md)

## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```
