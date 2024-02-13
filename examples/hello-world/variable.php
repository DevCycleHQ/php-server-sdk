<?php
global $user, $devCycleClient;
require_once(__DIR__ . '/app.php');

try {
    $result = $devCycleClient->variable($user, 'test-feature', true);
    echo "Variable result is: ";
    print_r($result['value'] ? "true" : "false");
} catch (Exception $e) {
    echo 'Exception when calling DVCClient->variable: ', $e->getMessage(), PHP_EOL;
}