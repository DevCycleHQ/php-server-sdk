# DevCycleClient

All URIs are relative to https://bucketing-api.devcycle.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**getFeatures()**](DevCycleClient.md#getFeatures) | **POST** /v1/features | Get all features by key for user data
[**getVariableByKey()**](DevCycleClient.md#getVariableByKey) | **POST** /v1/variables/{key} | Get variable by key for user data
[**getVariables()**](DevCycleClient.md#getVariables) | **POST** /v1/variables | Get all variables by key for user data
[**track()**](DevCycleClient.md#track) | **POST** /v1/track | Post events to DevCycle for user


## `getFeatures()`

```php
getFeatures($user_data): array<string,\DevCycle\Model\Feature>
```

Get all features by key for user data

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

use DevCycle\DevCycleConfiguration;
use DevCycle\Api\DevCycleClient;
use DevCycle\Model\DevCycleUser;

// Configure API key authorization: bearerAuth
$config = DevCycleConfiguration::getDefaultConfiguration()->setApiKey('Authorization', 'DEVCYCLE_SERVER_SDK_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = DevCycleConfiguration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new DevCycleClient(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_data = new DevCycleUser();

try {
    $result = $apiInstance->getFeatures($user_data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DevCycleClient->getFeatures: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **user_data** | [**\DevCycle\Model\DevCycleUser**](../Model/DevCycleUser.md)|  |

### Return type

[**array<string,\DevCycle\Model\Feature>**](../Model/Feature.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getVariableByKey()`

```php
getVariableByKey($key, $user_data): \DevCycle\Model\Variable
```

Get variable by key for user data

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

use DevCycle\DevCycleConfiguration;
use DevCycle\Api\DevCycleClient;
use DevCycle\Model\DevCycleUser;

// Configure API key authorization: bearerAuth
$config = DevCycleConfiguration::getDefaultConfiguration()->setApiKey('Authorization', 'DEVCYCLE_SERVER_SDK_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = DevCycleConfiguration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new DevCycleClient(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$key = 'key_example'; // string | Variable key
$user_data = new DevCycleUser();

try {
    $result = $apiInstance->getVariableByKey($key, $user_data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DevCycleClient->getVariableByKey: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **key** | **string**| Variable key |
 **user_data** | [**\DevCycle\Model\DevCycleUser**](../Model/DevCycleUser.md)|  |

### Return type

[**\DevCycle\Model\Variable**](../Model/Variable.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getVariables()`

```php
getVariables($user_data): array<string,\DevCycle\Model\Variable>
```

Get all variables by key for user data

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

use DevCycle\DevCycleConfiguration;
use DevCycle\Api\DevCycleClient;
use DevCycle\Model\DevCycleUser;

// Configure API key authorization: bearerAuth
$config = DevCycleConfiguration::getDefaultConfiguration()->setApiKey('Authorization', 'DEVCYCLE_SERVER_SDK_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = DevCycleConfiguration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new DevCycleClient(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_data = new DevCycleUser();

try {
    $result = $apiInstance->getVariables($user_data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DevCycleClient->getVariables: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **user_data** | [**\DevCycle\Model\DevCycleUser**](../Model/DevCycleUser.md)|  |

### Return type

[**array<string,\DevCycle\Model\Variable>**](../Model/Variable.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `track()`

```php
track($user_data, $event_data): \DevCycle\Model\InlineResponse201
```

Post events to DevCycle for user

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

use DevCycle\DevCycleConfiguration;
use DevCycle\Api\DevCycleClient;
use DevCycle\Model\DevCycleUser;
use DevCycle\Model\DevCycleEvent;

// Configure API key authorization: bearerAuth
$config = DevCycleConfiguration::getDefaultConfiguration()->setApiKey('Authorization', 'DEVCYCLE_SERVER_SDK_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = DevCycleConfiguration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new DevCycleClient(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_data = new DevCycleUser();
$event_data = new DevCycleEvent(array(
  "type"=>"my-event"
));

try {
    $result = $apiInstance->track($user_data, $event_data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DevCycleClient->track: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **user_data_and_events_body** | [**\DevCycle\Model\DevCycleUserAndEventsBody**](../Model/UserDataAndEventsBody.md)|  |

### Return type

[**\DevCycle\Model\InlineResponse201**](../Model/InlineResponse201.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
