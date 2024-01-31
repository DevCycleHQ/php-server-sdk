<?php

require_once(__DIR__ . '/vendor/autoload.php');

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

$devCycleClient = new DevCycleClient(
    sdkKey: getenv("DEVCYCLE_SERVER_SDK_KEY"),
    dvcOptions: $options
);

$user = new DevCycleUser(array(
    "user_id" => "test"
));

echo $user->__toString();

echo $devCycleClient->variable($user, "test", false);
