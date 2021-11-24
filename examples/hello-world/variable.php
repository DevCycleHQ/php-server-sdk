<?php
require_once(__DIR__ . '/app.php');

try {
    $result = $apiInstance->variable($user_data, 'test-feature', true);
    echo "Variable result is: ";
    print_r($result['value'] ? "true" : "false");
} catch (Exception $e) {
    echo 'Exception when calling DVCClient->variable: ', $e->getMessage(), PHP_EOL;
}