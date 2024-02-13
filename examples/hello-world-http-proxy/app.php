<?php

require_once(__DIR__ . '/vendor/autoload.php');

use DevCycle\Api\DevCycleClient;
use DevCycle\Model\DevCycleOptions;
use DevCycle\Model\DevCycleUser;

$options = new DevCycleOptions(
    enableEdgeDB: false,
    bucketingApiHostname: "http://localhost:8099"
);

$apiInstance = new DevCycleClient(
    getenv("DEVCYCLE_SDK_KEY"),
    dvcOptions: $options
);

$user_data = new DevCycleUser(array(
    'user_id' => 'integration-test',
    'email' => 'email@example.com',
    'country' => 'US',
));
