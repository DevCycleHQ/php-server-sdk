<?php

namespace DevCycle\Test\Api;

use DevCycle\HTTPConfiguration;
use DevCycle\Model\DevCycleOptions;
use DevCycle\Api\DevCycleClient;
use DevCycle\Model\DevCycleUser;
use DevCycle\Model\EvalHook;
use DevCycle\Model\HookContext;
use DevCycle\Model\BeforeHookError;
use DevCycle\Model\AfterHookError;
use PHPUnit\Framework\TestCase;

/**
 * HookTest Class
 *
 * Tests for evaluation hook functionality
 *
 * @category Class
 * @package  DevCycle
 */
final class HookTest extends TestCase
{
    private DevCycleClient $client;
    private DevCycleUser $user;

    /**
     * Setup before running each test case
     */
    public function setUp(): void
    {
        $this->user = new DevCycleUser(array(
            "user_id" => "test-hook-user"
        ));
    }

    /**
     * Test that hooks work correctly with before, after, onFinally, and error callbacks
     */
    public function testHooksWorkCorrectly()
    {
        $beforeCalled = false;
        $afterCalled = false;
        $onFinallyCalled = false;
        $errorCalled = false;

        $hook = new EvalHook(
            before: function (HookContext $context) use (&$beforeCalled) {
                $beforeCalled = true;
                $this->assertEquals('test-key', $context->getKey());
                $this->assertEquals('test-default', $context->getDefaultValue());
                $this->assertSame($this->user, $context->getUser());
                $this->assertNull($context->getVariableDetails());
            },
            after: function (HookContext $context) use (&$afterCalled) {
                $afterCalled = true;
                $this->assertEquals('test-key', $context->getKey());
                $this->assertEquals('test-default', $context->getDefaultValue());
                $this->assertSame($this->user, $context->getUser());
                $this->assertNotNull($context->getVariableDetails());
            },
            onFinally: function (HookContext $context) use (&$onFinallyCalled) {
                $onFinallyCalled = true;
                $this->assertEquals('test-key', $context->getKey());
                $this->assertEquals('test-default', $context->getDefaultValue());
                $this->assertSame($this->user, $context->getUser());
            },
            error: function (HookContext $context, \Exception $error) use (&$errorCalled) {
                $errorCalled = true;
                $this->assertEquals('test-key', $context->getKey());
                $this->assertEquals('test-default', $context->getDefaultValue());
                $this->assertSame($this->user, $context->getUser());
            }
        );

        $options = new DevCycleOptions(false, null, null, [], [$hook]);
        $this->client = new DevCycleClient(
            sdkKey: getenv("DEVCYCLE_SERVER_SDK_KEY") ?: "dvc_server_token_hash",
            dvcOptions: $options
        );

        // Test with a non-existent variable to trigger default behavior
        $result = $this->client->variable($this->user, 'test-key', 'test-default');

        $this->assertTrue($beforeCalled, 'Before hook should be called');
        $this->assertTrue($afterCalled, 'After hook should be called');
        $this->assertTrue($onFinallyCalled, 'OnFinally hook should be called');
        // Error hook may be called due to API errors, which is expected behavior
        $this->assertTrue($result->isDefaulted());
        $this->assertEquals('test-default', $result->getValue());
    }

    /**
     * Test that before hook errors are caught and logged
     */
    public function testBeforeHookErrorIsCaught()
    {
        $beforeCalled = false;
        $afterCalled = false;
        $onFinallyCalled = false;
        $errorCalled = false;

        $hook = new EvalHook(
            before: function (HookContext $context) use (&$beforeCalled) {
                $beforeCalled = true;
                throw new \Exception('Before hook error');
            },
            after: function (HookContext $context) use (&$afterCalled) {
                $afterCalled = true;
            },
            onFinally: function (HookContext $context) use (&$onFinallyCalled) {
                $onFinallyCalled = true;
            },
            error: function (HookContext $context, \Exception $error) use (&$errorCalled) {
                $errorCalled = true;
                $this->assertInstanceOf(BeforeHookError::class, $error);
            }
        );

        $options = new DevCycleOptions(false, null, null, [], [$hook]);
        $this->client = new DevCycleClient(
            sdkKey: getenv("DEVCYCLE_SERVER_SDK_KEY") ?: "dvc_server_token_hash",
            dvcOptions: $options
        );

        $result = $this->client->variable($this->user, 'test-key', 'test-default');

        $this->assertTrue($beforeCalled, 'Before hook should be called');
        // After hook may still be called due to API errors, which is expected
        $this->assertTrue($onFinallyCalled, 'OnFinally hook should be called');
        $this->assertTrue($errorCalled, 'Error hook should be called');
        $this->assertTrue($result->isDefaulted());
        $this->assertEquals('test-default', $result->getValue());
    }

    /**
     * Test that after hook errors are caught and logged
     */
    public function testAfterHookErrorIsCaught()
    {
        $beforeCalled = false;
        $afterCalled = false;
        $onFinallyCalled = false;
        $errorCalled = false;

        $hook = new EvalHook(
            before: function (HookContext $context) use (&$beforeCalled) {
                $beforeCalled = true;
            },
            after: function (HookContext $context) use (&$afterCalled) {
                $afterCalled = true;
                throw new \Exception('After hook error');
            },
            onFinally: function (HookContext $context) use (&$onFinallyCalled) {
                $onFinallyCalled = true;
            },
            error: function (HookContext $context, \Exception $error) use (&$errorCalled) {
                $errorCalled = true;
                $this->assertInstanceOf(AfterHookError::class, $error);
            }
        );

        $options = new DevCycleOptions(false, null, null, [], [$hook]);
        $this->client = new DevCycleClient(
            sdkKey: getenv("DEVCYCLE_SERVER_SDK_KEY") ?: "dvc_server_token_hash",
            dvcOptions: $options
        );

        $result = $this->client->variable($this->user, 'test-key', 'test-default');

        $this->assertTrue($beforeCalled, 'Before hook should be called');
        $this->assertTrue($afterCalled, 'After hook should be called');
        $this->assertTrue($onFinallyCalled, 'OnFinally hook should be called');
        $this->assertTrue($errorCalled, 'Error hook should be called');
        $this->assertTrue($result->isDefaulted());
        $this->assertEquals('test-default', $result->getValue());
    }

    /**
     * Test that functionality remains the same without hooks
     */
    public function testFunctionalityWithoutHooks()
    {
        $options = new DevCycleOptions(false);
        $this->client = new DevCycleClient(
            sdkKey: getenv("DEVCYCLE_SERVER_SDK_KEY") ?: "dvc_server_token_hash",
            dvcOptions: $options
        );

        $result = $this->client->variable($this->user, 'test-key', 'test-default');

        $this->assertTrue($result->isDefaulted());
        $this->assertEquals('test-default', $result->getValue());
    }

    /**
     * Test that onFinally hooks are always called even when errors occur
     */
    public function testOnFinallyAlwaysCalled()
    {
        $onFinallyCalled = false;

        $hook = new EvalHook(
            onFinally: function (HookContext $context) use (&$onFinallyCalled) {
                $onFinallyCalled = true;
            }
        );

        $options = new DevCycleOptions(false, null, null, [], [$hook]);
        $this->client = new DevCycleClient(
            sdkKey: getenv("DEVCYCLE_SERVER_SDK_KEY") ?: "dvc_server_token_hash",
            dvcOptions: $options
        );

        $result = $this->client->variable($this->user, 'test-key', 'test-default');

        $this->assertTrue($onFinallyCalled, 'OnFinally hook should always be called');
        $this->assertTrue($result->isDefaulted());
        $this->assertEquals('test-default', $result->getValue());
    }
} 