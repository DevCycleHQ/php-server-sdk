<?php
global $devCycleClient, $user;
require_once(__DIR__ . '/app.php');

try {
    $result = $devCycleClient->allFeatures($user);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DVCClient->allFeatures: ', $e->getMessage(), PHP_EOL;
}