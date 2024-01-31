<?php

require_once(__DIR__ . '/vendor/autoload.php');

use DevCycle\HTTPConfiguration;
use DevCycle\Api\DevCycleClient;
use DevCycle\Model\DevCycleOptions;
use DevCycle\Model\DevCycleUser;

$bucketingHostname = null;
$unixSocketPath = null;
// Uncomment the below two lines to enable SDK Proxy use.
// $bucketingHostname = "http:/localhost";
// $unixSocketPath = "/tmp/devcycle.sock";


$options = new DevCycleOptions(
    false,
    $bucketingHostname,
    $unixSocketPath
);
$apiInstance = new DevCycleClient(
    sdkKey: getenv("DEVCYCLE_SERVER_SDK_KEY"),
    dvcOptions: $options
);
$user_data = new DevCycleUser(array(
    "user_id" => "test"
));

echo $user_data->__toString();

echo $apiInstance->variable($user_data, "test", false);
