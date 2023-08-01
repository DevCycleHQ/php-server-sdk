# # DevCycleUser

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**user_id** | **string** | Unique id to identify the user |
**email** | **string** | User&#39;s email used to identify the user on the dashboard / target audiences | [optional]
**name** | **string** | User&#39;s name used to identify the user on the dashboard / target audiences | [optional]
**language** | **string** | User&#39;s language in ISO 639-1 format | [optional]
**country** | **string** | User&#39;s country in ISO 3166 alpha-2 format | [optional]
**app_version** | **string** | App Version of the running application | [optional]
**app_build** | **string** | App Build number of the running application | [optional]
**custom_data** | **object** | User&#39;s custom data to target the user with, data will be logged to DevCycle for use in dashboard. | [optional]
**private_custom_data** | **object** | User&#39;s custom data to target the user with, data will not be logged to DevCycle only used for feature bucketing. | [optional]
**created_date** | **float** | Date the user was created, Unix epoch timestamp format | [optional]
**last_seen_date** | **float** | Date the user was created, Unix epoch timestamp format | [optional]
**platform** | **string** | Platform the Client SDK is running on | [optional]
**platform_version** | **string** | Version of the platform the Client SDK is running on | [optional]
**device_model** | **string** | User&#39;s device model | [optional]
**sdk_type** | **string** | DevCycle SDK type | [optional]
**sdk_version** | **string** | DevCycle SDK Version | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
