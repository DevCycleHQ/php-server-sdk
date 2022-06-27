<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = DevCycle\Configuration::getDefaultConfiguration()->setApiKey('Authorization', '<INSERT SDK KEY>');
$options = new DevCycle\Model\DVCOptions(true);
$apiInstance = new DevCycle\Api\DVCClient(
    $config,
    dvcOptions:$options
);
$user_data = new \DevCycle\Model\UserData(array(
    "user_id"=>"user"
));