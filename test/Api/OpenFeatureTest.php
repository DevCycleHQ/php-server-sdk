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

use DevCycle\Model\DevCycleUser;
use OpenFeature\implementation\flags\Attributes;
use OpenFeature\implementation\flags\EvaluationContext;
use PHPUnit\Framework\TestCase;

final class OpenFeatureTest extends TestCase
{

    public function testEvaluationContextTargetingKey()
    {
        // Test targetingKey only
        $evalContextTK = new EvaluationContext(targetingKey: "test");
        $user = DevCycleUser::FromEvaluationContext($evalContextTK);
        self::assertEquals("test", $user->getUserId(), 'User ID not properly passed through/set');

        // Test user_id only
        $attributes = new Attributes(array("user_id" => "test"));
        $evaluationContext = new EvaluationContext(attributes: $attributes);
        $user = DevCycleUser::FromEvaluationContext($evaluationContext);
        self::assertEquals("test", $user->getUserId(), 'User ID not properly passed through/set');

        // Test userId only
        $attributes = new Attributes(array("userId" => "test"));
        $evaluationContext = new EvaluationContext(attributes: $attributes);
        $user = DevCycleUser::FromEvaluationContext($evaluationContext);
        self::assertEquals("test", $user->getUserId(), 'User ID not properly passed through/set');

        // Test priority: targetingKey should take precedence over user_id
        $attributes = new Attributes(array("user_id" => "test"));
        $evaluationContext = new EvaluationContext(targetingKey: "test2", attributes: $attributes);
        $user = DevCycleUser::FromEvaluationContext($evaluationContext);
        self::assertEquals("test2", $user->getUserId(), 'targetingKey should take precedence over user_id');

        // Test priority: targetingKey should take precedence over userId
        $attributes = new Attributes(array("userId" => "test"));
        $evaluationContext = new EvaluationContext(targetingKey: "test2", attributes: $attributes);
        $user = DevCycleUser::FromEvaluationContext($evaluationContext);
        self::assertEquals("test2", $user->getUserId(), 'targetingKey should take precedence over userId');

        // Test priority: user_id should take precedence over userId
        $attributes = new Attributes(array("user_id" => "test", "userId" => "test2"));
        $evaluationContext = new EvaluationContext(attributes: $attributes);
        $user = DevCycleUser::FromEvaluationContext($evaluationContext);
        self::assertEquals("test", $user->getUserId(), 'user_id should take precedence over userId');

        // Test all three present: targetingKey should win
        $attributes = new Attributes(array("user_id" => "test", "userId" => "test2"));
        $evaluationContext = new EvaluationContext(targetingKey: "test3", attributes: $attributes);
        $user = DevCycleUser::FromEvaluationContext($evaluationContext);
        self::assertEquals("test3", $user->getUserId(), 'targetingKey should take precedence over all other user ID fields');
    }

    public function testUserIdFieldsNotInCustomData()
    {
        // Test that when user_id is used as main user ID, it doesn't appear in custom data
        $attributes = new Attributes(array("user_id" => "test-user", "other_field" => "value"));
        $evaluationContext = new EvaluationContext(attributes: $attributes);
        $user = DevCycleUser::FromEvaluationContext($evaluationContext);
        self::assertEquals("test-user", $user->getUserId(), 'user_id should be used as main user ID');
        self::assertArrayNotHasKey("user_id", $user->getCustomData(), 'user_id should not appear in custom data when used as main user ID');
        self::assertArrayHasKey("other_field", $user->getCustomData(), 'other fields should still appear in custom data');

        // Test that when userId is used as main user ID, it doesn't appear in custom data
        $attributes = new Attributes(array("userId" => "test-user", "other_field" => "value"));
        $evaluationContext = new EvaluationContext(attributes: $attributes);
        $user = DevCycleUser::FromEvaluationContext($evaluationContext);
        self::assertEquals("test-user", $user->getUserId(), 'userId should be used as main user ID');
        self::assertArrayNotHasKey("userId", $user->getCustomData(), 'userId should not appear in custom data when used as main user ID');
        self::assertArrayHasKey("other_field", $user->getCustomData(), 'other fields should still appear in custom data');

        // Test that all user ID fields are always excluded from custom data
        $attributes = new Attributes(array("user_id" => "test-user-id", "userId" => "test-userId", "other_field" => "value"));
        $evaluationContext = new EvaluationContext(targetingKey: "targeting-key", attributes: $attributes);
        $user = DevCycleUser::FromEvaluationContext($evaluationContext);
        self::assertEquals("targeting-key", $user->getUserId(), 'targetingKey should be used as main user ID');
        self::assertArrayNotHasKey("user_id", $user->getCustomData(), 'user_id should never appear in custom data');
        self::assertArrayNotHasKey("userId", $user->getCustomData(), 'userId should never appear in custom data');
        self::assertArrayHasKey("other_field", $user->getCustomData(), 'other fields should still appear in custom data');

        // Test that all user ID fields are excluded even when not used as main user ID
        $attributes = new Attributes(array("user_id" => "test-user-id", "userId" => "test-userId", "other_field" => "value"));
        $evaluationContext = new EvaluationContext(attributes: $attributes);
        $user = DevCycleUser::FromEvaluationContext($evaluationContext);
        self::assertEquals("test-user-id", $user->getUserId(), 'user_id should be used as main user ID');
        self::assertArrayNotHasKey("user_id", $user->getCustomData(), 'user_id should never appear in custom data');
        self::assertArrayNotHasKey("userId", $user->getCustomData(), 'userId should never appear in custom data');
        self::assertArrayHasKey("other_field", $user->getCustomData(), 'other fields should still appear in custom data');
    }

    public function testMissingUserIdThrowsException()
    {
        // Test that missing all user ID fields throws exception
        $attributes = new Attributes(array("other_field" => "value"));
        $evaluationContext = new EvaluationContext(attributes: $attributes);
        
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('targetingKey, user_id, or userId is missing from EvaluationContext');
        
        DevCycleUser::FromEvaluationContext($evaluationContext);
    }

    public function testInvalidUserIdTypeThrowsException()
    {
        // Test that non-string user_id throws string validation exception
        $attributes = new Attributes(array("user_id" => array("invalid", "array"), "other_field" => "value"));
        $evaluationContext = new EvaluationContext(attributes: $attributes);
        
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("User ID field 'user_id' must be a string value, got array");
        
        DevCycleUser::FromEvaluationContext($evaluationContext);
    }

    public function testInvalidUserIdFieldTypeThrowsException()
    {
        // Test that non-string userId throws string validation exception with correct field name
        $attributes = new Attributes(array("userId" => true, "other_field" => "value"));
        $evaluationContext = new EvaluationContext(attributes: $attributes);
        
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("User ID field 'userId' must be a string value, got boolean");
        
        DevCycleUser::FromEvaluationContext($evaluationContext);
    }

    public function testEvaluationContext()
    {
        $attributes = new Attributes(array(
            "user_id" => "test",
            "customData" => array(
                "customKey" => "customValue"
            ),
            "privateCustomData" => array(
                "privateKey" => "privateValue"
            ),
            "email" => "email@email.com",
            "name" => "Name Name",
            "language" => "EN",
            "country" => "CA",
            "appVersion" => "0.0.1",
            "appBuild" => 1,
            "nonSetValueBubbledCustomData" => true,
            "nonSetValueBubbledCustomData2" => "true",
            "nonSetValueBubbledCustomData3" => 1,
            "nonSetValueBubbledCustomData4" => null
        ));
        $evaluationContext = new EvaluationContext(attributes: $attributes);
        $user = DevCycleUser::FromEvaluationContext($evaluationContext);
        self::assertEquals("test", $user->getUserId(), 'User ID not properly passed through/set');
        self::assertEquals("customValue", $user->getCustomData()["customKey"], 'Custom Data not properly passed through/set');
        self::assertEquals("privateValue", $user->getPrivateCustomData()["privateKey"], 'Private Custom Data not properly passed through/set');
        self::assertEquals("email@email.com", $user->getEmail(), 'Email not properly passed through/set');
        self::assertEquals("Name Name", $user->getName(), 'Name not properly passed through/set');
        self::assertEquals("EN", $user->getLanguage(), 'Language not properly passed through/set');
        self::assertEquals("CA", $user->getCountry(), 'Country not properly passed through/set');
        self::assertEquals("0.0.1", $user->getAppVersion(), 'App Version not properly passed through/set');
        self::assertEquals(1, $user->getAppBuild(), 'App Build not properly passed through/set');
        self::assertEquals(true, $user->getCustomData()['nonSetValueBubbledCustomData'], 'Non Set Value Bubbled Custom Data not properly passed through/set');
        self::assertEquals("true", $user->getCustomData()['nonSetValueBubbledCustomData2'], 'Non Set Value Bubbled Custom Data 2 not properly passed through/set');
        self::assertEquals(1, $user->getCustomData()['nonSetValueBubbledCustomData3'], 'Non Set Value Bubbled Custom Data 3 not properly passed through/set');
        self::assertEquals(null, $user->getCustomData()['nonSetValueBubbledCustomData4'], 'Non Set Value Bubbled Custom Data 4 not properly passed through/set');
    }
}
