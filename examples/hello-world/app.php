<?php

use DevCycle\Api\DevCycleClient;

require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization
$config = DevCycle\Configuration::getDefaultConfiguration()
    ->setApiKey('Authorization', $_ENV["DEVCYCLE_SERVER_SDK_KEY"]);
    // Uncomment the below lines to use unix domain sockets:
    //->setHost("http:/v1")
    //->setUDSPath("/tmp/phpsock.sock");
$options = new DevCycle\Model\Options(false);
$apiInstance = new DevCycleClient(
    $config,
    dvcOptions: $options
);
$user_data = new DevCycle\Model\User(array(
    "user_id" => "test"
));

echo $user_data->__toString();

echo $apiInstance->variable($user_data, "test", false);
