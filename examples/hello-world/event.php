<?php
require_once(__DIR__ . '/app.php');

$event_data = new \DevCycle\Model\DevCycleEvent(array(
    "type" => "some_event"
));

try {
    $result = $apiInstance->track($user_data, $event_data);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DevCycleClient->track: ', $e->getMessage(), PHP_EOL;
}