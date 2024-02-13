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

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

use DevCycle\Api\DevCycleClient;
use DevCycle\Model\DevCycleOptions;
use DevCycle\Model\DevCycleUser;

$options = new DevCycleOptions(
    false,
    $bucketingHostname,
    $unixSocketPath
);

$devCycleClient = new DevCycleClient(
    sdkKey: getenv("DEVCYCLE_SERVER_SDK_KEY"),
    dvcOptions: $options
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

# OpenFeature Support

This SDK provides an implementation of the [OpenFeature](https://openfeature.dev/) Provider interface. Use the `getOpenFeatureProvider()` method on the DevCycle SDK client to obtain a provider for OpenFeature.

```php
$devCycleClient = new DevCycleClient(
    sdkKey: getenv("DEVCYCLE_SERVER_SDK_KEY"),
    dvcOptions: $options
);
$api->setProvider($devCycleClient->getOpenFeatureProvider());
```

- [The DevCycle PHP OpenFeature Provider](https://docs.devcycle.com/sdk/server-side-sdks/php/php-openfeature)
- [The OpenFeature documentation](https://openfeature.dev/docs/reference/intro)

## Advanced Options (Local Bucketing)

Because of the nature of PHP - we can't directly support local bucketing within PHP - but we have created a supporting worker that
can be used to emulate the local bucketing function of low latency and high throughput.
This proxy can be found here: https://github.com/devcyclehq/local-bucketing-proxy

The proxy has two modes - HTTP, and Unix sockets. The PHP SDK supports both modes, but the HTTP mode should be used for most cases.

The configuration for this proxy (in HTTP mode) is as follows (replacing the URL with the URL of the proxy):

```
use DevCycle\Model\DevCycleOptions;

$options = new DevCycleOptions(
    enableEdgeDB: false, 
    bucketingApiHostname = "hostname for sdk proxy here"
);
```

The configuration for this proxy (in Unix socket mode) is as follows (replacing the UDS path with the path to the socket):
```
use DevCycle\Model\DevCycleOptions;

$options = new DevCycleOptions(
    enableEdgeDB: false, 
    bucketingApiHostname: "http:/localhost",
    unixSocketPath: "/path/to/unix/socket"
);
```