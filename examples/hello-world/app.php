<?php

require_once(__DIR__ . '/vendor/autoload.php');

use DevCycle\DevCycleConfiguration;
use DevCycle\Api\DevCycleClient;
use DevCycle\Model\DevCycleOptions;
use DevCycle\Model\DevCycleUser;

// Configure API key authorization
$config = DevCycleConfiguration::getDefaultConfiguration()
    ->setApiKey('Authorization', getenv("DEVCYCLE_SERVER_SDK_KEY"));
    // Uncomment the below lines to use unix domain sockets:
    //->setHost("http:/v1")
    //->setUDSPath("/tmp/phpsock.sock");
$options = new DevCycleOptions(false);
$apiInstance = new DevCycleClient(
    $config,
    dvcOptions: $options
);
$user_data = new DevCycleUser(array(
    "user_id" => "test"
));

echo $user_data->__toString();

echo $apiInstance->variable($user_data, "test", false);
