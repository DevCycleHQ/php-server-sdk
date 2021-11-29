<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization
$config = DevCycle\Configuration::getDefaultConfiguration()->setApiKey('Authorization', '<INSERT SDK KEY>');

$apiInstance = new DevCycle\Api\DVCClient(
    $config
);
$user_data = new \DevCycle\Model\UserData(array(
    "user_id"=>"user"
));