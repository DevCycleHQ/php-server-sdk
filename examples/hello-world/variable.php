<?php
global $user, $devCycleClient;
require_once(__DIR__ . '/app.php');

try {
    $result = $devCycleClient->variableValue($user, 'number-test', -1);
    var_dump($result);
    var_dump($user);
} catch (Exception $e) {
    echo 'Exception when calling DVCClient->variable: ', $e->getMessage(), PHP_EOL;
}