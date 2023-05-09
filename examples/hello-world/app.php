<?php

use DevCycle\Model\UserData;

require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = DevCycle\Configuration::getDefaultConfiguration()
    ->setApiKey('Authorization', 'SDK KEY HERE');
    // Uncomment the below lines to use unix domain sockets:
    //->setHost("http:/v1")
    //->setUDSPath("/tmp/phpsock.sock");
$options = new DevCycle\Model\DVCOptions(false);
$apiInstance = new DevCycle\Api\DVCClient(
    $config,
    dvcOptions: $options
);
$user_data = new UserData(array(
    "user_id" => "test"
));

echo $user_data->__toString();

echo $apiInstance->variable($user_data, "test", false);
