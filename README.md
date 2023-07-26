# DevCycle PHP Server SDK

Welcome to the DevCycle PHP SDK, initially generated via the [DevCycle Bucketing API](https://docs.devcycle.com/bucketing-api/#tag/devcycle).

## Requirements

PHP 8.0 and later.

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

use DevCycle\DevCycleConfiguration;
use DevCycle\Api\DevCycleClient;
use DevCycle\Model\DevCycleUser;

// Configure API key authorization: bearerAuth
$config = DevCycleConfiguration::getDefaultConfiguration()->setApiKey('Authorization', 'DEVCYCLE_SERVER_SDK_KEY');

$apiInstance = new DevCycleClient(
    $config,
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
);
$user_data = new DevCycleUser(array(
  "user_id"=>"my-user"
));

try {
    $result = $apiInstance->allFeatures($user_data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DevCycleClient->allFeatures: ', $e->getMessage(), PHP_EOL;
}

```

## Usage

To find usage documentation, visit our [docs](https://docs.devcycle.com/docs/sdk/server-side-sdks/php#usage).


## Advanced Options (Local Bucketing)

Because of the nature of PHP - we can't directly support local bucketing within PHP - but we have created a supporting worker that
can be used to emulate the local bucketing function of low latency and high throughput.
This proxy can be found here: https://github.com/devcyclehq/local-bucketing-proxy

The proxy has two modes - HTTP, and Unix sockets. The PHP SDK supports both modes, but the HTTP mode should be used for most cases.

The configuration for this proxy (in HTTP mode) is as follows (replacing the URL with the URL of the proxy):

```
$config = DevCycleConfiguration::getDefaultConfiguration()
    ->setApiKey('Authorization', $_ENV["DEVCYCLE_SERVER_SDK_KEY"])
    ->setHost("http://localhost:8080/v1");
```

The configuration for this proxy (in Unix socket mode) is as follows (replacing the UDS path with the path to the socket):
```
$config = DevCycleConfiguration::getDefaultConfiguration()
    ->setApiKey('Authorization', $_ENV["DEVCYCLE_SERVER_SDK_KEY"])
    ->setHost("http:/v1")
    ->setUDSPath("/tmp/phpsock.sock");
```