<?php

global $user, $devCycleClient;

use DevCycle\Model\DevCycleEvent;

require_once(__DIR__ . '/app.php');

$event_data = new DevCycleEvent(array(
    "type" => "some_event"
));

try {
    $result = $devCycleClient->track($user, $event_data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DevCycleClient->track: ', $e->getMessage(), PHP_EOL;
}