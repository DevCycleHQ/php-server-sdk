<?php
namespace DevCycle\Model;

use \ArrayAccess;
use \DevCycle\ObjectSerializer;
use DevCycle\Version;
use OpenFeature\implementation\common\ValueTypeValidator;
use OpenFeature\interfaces\flags\EvaluationContext;

/**
 * DevCycleUser Class Doc Comment
 *
 * @category Class
 * @package  DevCycle
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class DevCycleUser implements ModelInterface, ArrayAccess, \JsonSerializable
{

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static string $openAPIModelName = 'User';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static array $openAPITypes = [
        'user_id' => 'string',
        'email' => 'string',
        'name' => 'string',
        'language' => 'string',
        'country' => 'string',
        'app_version' => 'string',
        'app_build' => 'string',
        'custom_data' => 'object',
        'private_custom_data' => 'object',
        'created_date' => 'float',
        'last_seen_date' => 'float',
        'platform' => 'string',
        'platform_version' => 'string',
        'sdk_type' => 'string',
        'sdk_version' => 'string'
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     * @phpstan-var array<string, string|null>
     * @psalm-var array<string, string|null>
     */
    protected static array $openAPIFormats = [
        'user_id' => null,
        'email' => null,
        'name' => null,
        'language' => null,
        'country' => null,
        'app_version' => null,
        'app_build' => null,
        'custom_data' => null,
        'private_custom_data' => null,
        'created_date' => null,
        'last_seen_date' => null,
        'platform' => null,
        'platform_version' => null,
        'sdk_type' => null,
        'sdk_version' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes(): array
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats(): array
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static array $attributeMap = [
        'user_id' => 'user_id',
        'email' => 'email',
        'name' => 'name',
        'language' => 'language',
        'country' => 'country',
        'app_version' => 'appVersion',
        'app_build' => 'appBuild',
        'custom_data' => 'customData',
        'private_custom_data' => 'privateCustomData',
        'created_date' => 'createdDate',
        'last_seen_date' => 'lastSeenDate',
        'platform' => 'platform',
        'platform_version' => 'platformVersion',
        'sdk_type' => 'sdkType',
        'sdk_version' => 'sdkVersion'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static array $setters = [
        'user_id' => 'setUserId',
        'email' => 'setEmail',
        'name' => 'setName',
        'language' => 'setLanguage',
        'country' => 'setCountry',
        'app_version' => 'setAppVersion',
        'app_build' => 'setAppBuild',
        'custom_data' => 'setCustomData',
        'private_custom_data' => 'setPrivateCustomData',
        'created_date' => 'setCreatedDate',
        'last_seen_date' => 'setLastSeenDate'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static array $getters = [
        'user_id' => 'getUserId',
        'email' => 'getEmail',
        'name' => 'getName',
        'language' => 'getLanguage',
        'country' => 'getCountry',
        'app_version' => 'getAppVersion',
        'app_build' => 'getAppBuild',
        'custom_data' => 'getCustomData',
        'private_custom_data' => 'getPrivateCustomData',
        'created_date' => 'getCreatedDate',
        'last_seen_date' => 'getLastSeenDate',
        'platform' => 'getPlatform',
        'platform_version' => 'getPlatformVersion',
        'sdk_type' => 'getSdkType',
        'sdk_version' => 'getSdkVersion'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap(): array
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters(): array
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters(): array
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName(): string
    {
        return self::$openAPIModelName;
    }

    const SDK_TYPE_API = 'api';
    const SDK_TYPE_SERVER = 'server';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getSdkTypeAllowableValues(): array
    {
        return [
            self::SDK_TYPE_API,
            self::SDK_TYPE_SERVER,
        ];
    }

    /**
     * Associative array for storing property values
     *
     * @var array[]
     */
    protected mixed $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['user_id'] = $data['user_id'] ?? null;
        $this->container['email'] = $data['email'] ?? null;
        $this->container['name'] = $data['name'] ?? null;
        $this->container['language'] = $data['language'] ?? null;
        $this->container['country'] = $data['country'] ?? null;
        $this->container['app_version'] = $data['app_version'] ?? null;
        $this->container['app_build'] = $data['app_build'] ?? null;
        $this->container['custom_data'] = $data['custom_data'] ?? null;
        $this->container['private_custom_data'] = $data['private_custom_data'] ?? null;
        $this->container['created_date'] = $data['created_date'] ?? null;
        $this->container['last_seen_date'] = $data['last_seen_date'] ?? null;
        $this->container['platform'] = 'PHP';
        $this->container['platform_version'] = PHP_VERSION;
        $this->container['sdk_type'] = 'server';
        $this->container['sdk_version'] = Version::$VERSION;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties(): array
    {
        $invalidProperties = [];

        if ($this->container['user_id'] === null) {
            $invalidProperties[] = "'user_id' can't be null";
        }
        if (!is_null($this->container['language']) && (mb_strlen($this->container['language']) > 2)) {
            $invalidProperties[] = "invalid value for 'language', the character length must be smaller than or equal to 2.";
        }

        if (!is_null($this->container['country']) && (mb_strlen($this->container['country']) > 2)) {
            $invalidProperties[] = "invalid value for 'country', the character length must be smaller than or equal to 2.";
        }

        $allowedValues = $this->getSdkTypeAllowableValues();
        if (!is_null($this->container['sdk_type']) && !in_array($this->container['sdk_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'sdk_type', must be one of '%s'",
                $this->container['sdk_type'],
                implode("', '", $allowedValues)
            );
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid(): bool
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets user_id
     *
     * @return string
     */
    public function getUserId(): string
    {
        return $this->container['user_id'];
    }

    /**
     * Sets user_id
     *
     * @param string $user_id Unique id to identify the user
     *
     * @return self
     */
    public function setUserId(string $user_id): self
    {
        $this->container['user_id'] = $user_id;

        return $this;
    }

    /**
     * Gets email
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     *
     * @param string|null $email User's email used to identify the user on the dashboard / target audiences
     *
     * @return self
     */
    public function setEmail(?string $email): self
    {
        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string|null $name User's name used to identify the user on the dashboard / target audiences
     *
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets language
     *
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->container['language'];
    }

    /**
     * Sets language
     *
     * @param string|null $language User's language in ISO 639-1 format
     *
     * @return self
     */
    public function setLanguage(?string $language): self
    {
        if (!is_null($language) && (mb_strlen($language) > 2)) {
            throw new \InvalidArgumentException('invalid length for $language when calling setLanguage, must be smaller than or equal to 2.');
        }

        $this->container['language'] = $language;

        return $this;
    }

    /**
     * Gets country
     *
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->container['country'];
    }

    /**
     * Sets country
     *
     * @param string|null $country User's country in ISO 3166 alpha-2 format
     *
     * @return self
     */
    public function setCountry(?string $country): self
    {
        if (!is_null($country) && (mb_strlen($country) > 2)) {
            throw new \InvalidArgumentException('invalid length for $country when calling setCountry., must be smaller than or equal to 2.');
        }

        $this->container['country'] = $country;

        return $this;
    }

    /**
     * Gets app_version
     *
     * @return string|null
     */
    public function getAppVersion(): ?string
    {
        return $this->container['app_version'];
    }

    /**
     * Sets app_version
     *
     * @param string|null $app_version App Version of the running application
     *
     * @return self
     */
    public function setAppVersion(?string $app_version): self
    {
        $this->container['app_version'] = $app_version;

        return $this;
    }

    /**
     * Gets app_build
     *
     * @return string|null
     */
    public function getAppBuild(): ?string
    {
        return $this->container['app_build'];
    }

    /**
     * Sets app_build
     *
     * @param string|null $app_build App Build number of the running application
     *
     * @return self
     */
    public function setAppBuild(?string $app_build): self
    {
        $this->container['app_build'] = $app_build;

        return $this;
    }

    /**
     * Gets custom_data
     *
     * @return object|null
     */
    public function getCustomData(): ?array
    {
        return $this->container['custom_data'];
    }

    /**
     * Sets custom_data
     *
     * @param array|null $custom_data User's custom data to target the user with, data will be logged to DevCycle for use in dashboard.
     *
     * @return self
     */
    public function setCustomData(?array $custom_data): self
    {
        $this->container['custom_data'] = $custom_data;

        return $this;
    }

    public function addCustomData(string $key, $value): self
    {
        $this->container['custom_data'][$key] = $value;
        return $this;
    }

    /**
     * Gets private_custom_data
     *
     * @return object|null
     */
    public function getPrivateCustomData(): ?object
    {
        return $this->container['private_custom_data'];
    }

    /**
     * Sets private_custom_data
     *
     * @param object|null $private_custom_data User's custom data to target the user with, data will not be logged to DevCycle only used for feature bucketing.
     *
     * @return self
     */
    public function setPrivateCustomData(?object $private_custom_data): self
    {
        $this->container['private_custom_data'] = $private_custom_data;

        return $this;
    }

    public function addPrivateCustomData(string $key, $value): self
    {
        $this->container['private_custom_data'][$key] = $value;
        return $this;
    }

    /**
     * Gets created_date
     *
     * @return float|null
     */
    public function getCreatedDate(): ?float
    {
        return $this->container['created_date'];
    }

    /**
     * Sets created_date
     *
     * @param float|null $created_date Date the user was created, Unix epoch timestamp format
     *
     * @return self
     */
    public function setCreatedDate(?float $created_date): self
    {
        $this->container['created_date'] = $created_date;

        return $this;
    }

    /**
     * Gets last_seen_date
     *
     * @return float|null
     */
    public function getLastSeenDate(): ?float
    {
        return $this->container['last_seen_date'];
    }

    /**
     * Sets last_seen_date
     *
     * @param float|null $last_seen_date Date the user was created, Unix epoch timestamp format
     *
     * @return self
     */
    public function setLastSeenDate(?float $last_seen_date): self
    {
        $this->container['last_seen_date'] = $last_seen_date;

        return $this;
    }

    /**
     * Gets platform
     *
     * @return string
     */
    public function getPlatform(): string
    {
        return $this->container['platform'];
    }

    /**
     * Gets platform_version
     *
     * @return string
     */
    public function getPlatformVersion(): string
    {
        return $this->container['platform_version'];
    }

    /**
     * Gets sdk_type
     *
     * @return string
     */
    public function getSdkType(): string
    {
        return $this->container['sdk_type'];
    }

    /**
     * Gets sdk_version
     *
     * @return string
     */
    public function getSdkVersion(): string
    {
        return $this->container['sdk_version'];
    }

    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    public function offsetGet($offset): mixed
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed $value Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, mixed $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    public function jsonSerialize(): mixed
    {
        return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString(): string
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue(): string
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }

    public static function FromEvaluationContext(EvaluationContext $context): DevCycleUser
    {
        $user = new DevCycleUser();
        if ($context->getTargetingKey() === null && $context->getAttributes()['user_id'] === null) {
            throw new \InvalidArgumentException('targetingKey or user_id is missing from EvaluationContext');
        }
        if ($context->getTargetingKey() !== null) {
            $userId = $context->getTargetingKey();
        } else {
            $userId = $context->getAttributes()['user_id'];
        }
        $user->setUserId($userId);

        foreach ($context->getAttributes() as $key => $value) {
            if ($key === 'user_id' || $key === 'targetingKey') {
                continue;
            }
            switch ($key) {
                case "email":
                    if (!ValueTypeValidator::isString($value)) {
                        continue 2;
                    }
                    $user->setEmail($value);
                    break;
                case "name":
                    if (!ValueTypeValidator::isString($value)) {
                        continue 2;
                    }
                    $user->setName($value);
                    break;
                case "language":
                    if (!ValueTypeValidator::isString($value)) {
                        continue 2;
                    }
                    $user->setLanguage($value);
                    break;
                case "country":
                    if (!ValueTypeValidator::isString($value)) {
                        continue 2;
                    }
                    $user->setCountry($value);
                    break;
                case "appVersion":
                    if (!ValueTypeValidator::isString($value)) {
                        continue 2;
                    }
                    $user->setAppVersion($value);
                    break;
                case "appBuild":
                    if (!ValueTypeValidator::isInteger($value) && !ValueTypeValidator::isFloat($value)) {
                        continue 2;
                    }
                    $user->setAppBuild($value);
                    break;
                case "customData":
                case "privateCustomData":
                    if (ValueTypeValidator::isStructure($value)) {
                        foreach ($value as $subkey => $subvalue) {
                            if (ValueTypeValidator::isStructure($subvalue)) {
                                throw new \InvalidArgumentException('DevCycleUser only supports flat customData properties of type string / number / boolean / null');
                            }
                            switch ($key) {
                                case "privateCustomData":
                                    $user->addPrivateCustomData($subkey, $subvalue);
                                    break;
                                case "customData":
                                    $user->addCustomData($subkey, $subvalue);
                                    break;
                            }
                        }
                    }
                    break;
                default:
                    if (ValueTypeValidator::isStructure($value)) {
                        throw new \InvalidArgumentException('DevCycleUser only supports flat customData properties of type string / number / boolean / null');
                    }
                    $user->addCustomData($key, $value);
                    break;
            }
        }
        return $user;
    }
}
