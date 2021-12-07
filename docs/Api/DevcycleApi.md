# DevCycle\DVCClient

All URIs are relative to https://bucketing-api.devcycle.com.

Method | HTTP request | Description
------------- | ------------- | -------------
[**getFeatures()**](DVCClient.md#getFeatures) | **POST** /v1/features | Get all features by key for user data
[**getVariableByKey()**](DVCClient.md#getVariableByKey) | **POST** /v1/variables/{key} | Get variable by key for user data
[**getVariables()**](DVCClient.md#getVariables) | **POST** /v1/variables | Get all variables by key for user data
[**track()**](DVCClient.md#track) | **POST** /v1/track | Post events to DevCycle for user


## `getFeatures()`

```php
getFeatures($user_data): array<string,\DevCycle\Model\Feature>
```

Get all features by key for user data

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: bearerAuth
$config = DevCycle\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = DevCycle\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new DevCycle\Api\DVCClient(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_data = new \DevCycle\Model\UserData(); // \DevCycle\Model\UserData

try {
    $result = $apiInstance->getFeatures($user_data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DVCClient->getFeatures: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **user_data** | [**\DevCycle\Model\UserData**](../Model/UserData.md)|  |

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


// Configure API key authorization: bearerAuth
$config = DevCycle\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = DevCycle\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new DevCycle\Api\DVCClient(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$key = 'key_example'; // string | Variable key
$user_data = new \DevCycle\Model\UserData(); // \DevCycle\Model\UserData

try {
    $result = $apiInstance->getVariableByKey($key, $user_data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DVCClient->getVariableByKey: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **key** | **string**| Variable key |
 **user_data** | [**\DevCycle\Model\UserData**](../Model/UserData.md)|  |

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


// Configure API key authorization: bearerAuth
$config = DevCycle\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = DevCycle\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new DevCycle\Api\DVCClient(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_data = new \DevCycle\Model\UserData(); // \DevCycle\Model\UserData

try {
    $result = $apiInstance->getVariables($user_data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DVCClient->getVariables: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **user_data** | [**\DevCycle\Model\UserData**](../Model/UserData.md)|  |

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


// Configure API key authorization: bearerAuth
$config = DevCycle\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = DevCycle\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');


$apiInstance = new DevCycle\Api\DVCClient(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_data = new \DevCycle\Model\UserData(); // \DevCycle\Model\UserData
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

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **user_data_and_events_body** | [**\DevCycle\Model\UserDataAndEventsBody**](../Model/UserDataAndEventsBody.md)|  |

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
