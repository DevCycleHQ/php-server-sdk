<?php
global $user, $devCycleClient;
require_once(__DIR__ . '/app.php');

echo "Starting async ", PHP_EOL;

$devCycleClient
    ->variableAsync($user, 'test-feature', false)
    ->then(
        function ($response) {
            echo "Variable result is: ";
            print_r($response['value'] ? "true" : "false");
        },
        function ($e) {
            echo 'Exception when calling DVCClient->variableAsync: ', $e->getMessage(), PHP_EOL;
        }
    )->wait();

echo PHP_EOL, "Ending async";
