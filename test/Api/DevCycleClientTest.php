<?php
/**
 * DevCycle Bucketing API
 *
 * Documents the DevCycle Bucketing API which provides and API interface to User Bucketing and for generated SDKs.
 *
 * The version of the OpenAPI document: 1.0.0
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.3.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Please update the test case below to test the endpoint.
 */

namespace DevCycle\Test\Api;

use DevCycle\HTTPConfiguration;
use DevCycle\Model\DevCycleOptions;
use DevCycle\Api\DevCycleClient;
use DevCycle\Model\DevCycleUser;
use DevCycle\Model\DevCycleEvent;
use DevCycle\Model\ErrorResponse;
use Exception;
use OpenFeature\implementation\flags\EvaluationContext;
use OpenFeature\interfaces\flags\Client;
use OpenFeature\interfaces\provider\Reason;
use OpenFeature\OpenFeatureAPI;
use OpenFeature\OpenFeatureClient;
use PHPUnit\Framework\TestCase;

/**
 * DevCycleClientTest Class Doc Comment
 *
 * @category Class
 * @package  DevCycle
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
final class DevCycleClientTest extends TestCase
{
    private static DevCycleClient $client;

    private static OpenFeatureAPI $api;
    private static Client $openFeatureClient;
    private static DevCycleUser $user;

    private static EvaluationContext $context;

    /**
     * Setup before running any test cases
     */
    public static function setUpBeforeClass(): void
    {
        self::$api = OpenFeatureAPI::getInstance();

    }

    /**
     * Setup before running each test case
     */
    public function setUp(): void
    {
        $options = new DevCycleOptions(true);
        self::$client = new DevCycleClient(
            sdkKey: getenv("DEVCYCLE_SERVER_SDK_KEY"),
            dvcOptions: $options
        );
        self::$user = new DevCycleUser(array(
            "user_id" => "user"
        ));
        self::$api->setProvider(self::$client->getOpenFeatureProvider());
        self::$openFeatureClient = self::$api->getClient();
        self::$context = new EvaluationContext('test');

    }

    /**
     * Clean up after running each test case
     */
    public function tearDown(): void
    {
    }

    /**
     * Clean up after running all test cases
     */
    public static function tearDownAfterClass(): void
    {
    }

    /**
     * Test case for getFeatures
     *
     * Get all features by key for user data.
     *
     */
    public function testGetFeatures()
    {
        $result = self::$client->allVariables(self::$user);

        self::assertGreaterThan(0, count($result));
    }

    /**
     * Test case for getVariableByKey
     *
     * Get variable by key for user data.
     *
     */
    public function testGetVariableByKey()
    {
        $result = self::$client->variable(self::$user, 'test', false);
        self::assertFalse($result->isDefaulted());

        // add a value to the invocation context
        $boolValue = self::$openFeatureClient->getBooleanValue('test', false, self::$context);
        self::assertTrue($boolValue);
        $resultValue = self::$client->variableValue(self::$user, 'test', false);
        self::assertTrue($resultValue);

        $result = self::$client->variable(self::$user, 'php-sdk-default-invalid', true);
        self::assertTrue($result->isDefaulted());
        self::assertTrue((bool)$result->getValue());
    }

    /**
     * Test case for getVariableByKey
     *
     * Get variable by key for user data.
     *
     */
    public function testVariable_invalidSDKKey_isDefaultedTrue()
    {
        $localApiInstance = new DevCycleClient(
            "dvc_server_invalid-sdk-key",
            new DevCycleOptions(false)
        );
        $result = $localApiInstance->variable(self::$user, 'test-feature', true);
        $openFeatureResult = self::$openFeatureClient->getBooleanDetails('test-feature', true, self::$context);
        $resultValue = (bool)$localApiInstance->variableValue(self::$user, 'test-feature', true);
        $openFeatureValue = self::$openFeatureClient->getBooleanValue('test-feature', true, self::$context);

        self::assertTrue($result->isDefaulted());
        self::assertEquals(Reason::DEFAULT, $openFeatureResult->getReason());
        self::assertTrue($resultValue);
        self::assertTrue($openFeatureValue);
    }

    public function testVariableDefaultedDoesNotThrow()
    {
        $result = self::$client->variable(self::$user, 'variable-does-not-exist', true);
        self::assertTrue($result->isDefaulted());
        self::assertTrue((bool)$result->getValue());
    }

    /**
     * Test case for getVariables
     *
     * Get all variables by key for user data.
     *
     */
    public function testGetVariables()
    {
        $result = self::$client->allVariables(self::$user);

        self::assertGreaterThan(0, $result);
    }

    /**
     * Test case for postEvents
     *
     * Post events to DevCycle for user.
     *
     */
    public function testPostEvents()
    {
        $event_data = new DevCycleEvent(array(
            "type" => "some_event"
        ));

        $result = self::$client->track(self::$user, $event_data);

        self::assertEquals("Successfully received 1 events.", $result["message"]);
    }

    public function testTrackNoType()
    {
        $event_data = new DevCycleEvent(array(
            "type" => ""
        ));

        $result = self::$client->track(self::$user, $event_data);
        self::assertTrue($result instanceof ErrorResponse);
        self::assertEquals("Event data is invalid: 'type' can't be null or empty", $result->getMessage());
    }

    public function testOpenFeature()
    {
        $boolResult = self::$openFeatureClient->getBooleanValue('test', false, self::$context);
        self::assertTrue($boolResult);

        $numberResult = self::$openFeatureClient->getIntegerValue('test-number-variable', -1, self::$context);
        self::assertNotEquals(-1, $numberResult);

        $stringResult = self::$openFeatureClient->getStringValue('test-string-variable', 'default', self::$context);
        self::assertNotEquals('default', $stringResult);

        $structResult = self::$openFeatureClient->getObjectValue('test-json-variable', array(), self::$context);
        self::assertNotEquals(array(), $structResult);
    }
}
