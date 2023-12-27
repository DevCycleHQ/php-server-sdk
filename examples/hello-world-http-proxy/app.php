<?php

require_once(__DIR__ . '/vendor/autoload.php');

use DevCycle\DevCycleConfiguration;
use DevCycle\Api\DevCycleClient;
use DevCycle\Model\DevCycleOptions;
use DevCycle\Model\DevCycleUser;

// Configure API key authorization
$config = DevCycleConfiguration::getDefaultConfiguration()
    ->setApiKey('Authorization', getenv("DEVCYCLE_SDK_KEY"))
    ->setHost("http://localhost:8099");

$options = new DevCycleOptions(false);
$apiInstance = new DevCycleClient(
    $config,
    dvcOptions: $options
);
$user_data = new DevCycleUser(array(
    'user_id' => 'integration-test',
    'email' => 'nhaynes@adaction.com',
    'country' => 'US',
));
