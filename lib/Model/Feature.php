<?php
namespace DevCycle\Model;

use \ArrayAccess;
use \DevCycle\ObjectSerializer;

/**
 * Feature Class Doc Comment
 *
 * @category Class
 * @package  DevCycle
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class Feature implements ModelInterface, ArrayAccess, \JsonSerializable
{

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static string $openAPIModelName = 'Feature';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static array $openAPITypes = [
        '_id' => 'string',
        'key' => 'string',
        'type' => 'string',
        '_variation' => 'string',
        'variationKey' => 'string',
        'variationName' => 'string',
        'eval_reason' => 'string'
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     * @phpstan-var array<string, string|null>
     * @psalm-var array<string, string|null>
     */
    protected static array $openAPIFormats = [
        '_id' => null,
        'key' => null,
        'type' => null,
        '_variation' => null,
        'variationKey' => null,
        'variationName' => null,
        'eval_reason' => null
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
        '_id' => '_id',
        'key' => 'key',
        'type' => 'type',
        '_variation' => '_variation',
        'variationKey' => 'variationKey',
        'variationName' => 'variationName',
        'eval_reason' => 'evalReason'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static array $setters = [
        '_id' => 'setId',
        'key' => 'setKey',
        'type' => 'setType',
        '_variation' => 'setVariation',
        'variationKey' => 'setVariationKey',
        'variationName' => 'setVariationName',
        'eval_reason' => 'setEvalReason'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static array $getters = [
        '_id' => 'getId',
        'key' => 'getKey',
        'type' => 'getType',
        '_variation' => 'getVariation',
        'variationKey' => 'getVariationKey',
        'variationName' => 'getVariationName',
        'eval_reason' => 'getEvalReason'
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

    const TYPE_RELEASE = 'release';
    const TYPE_EXPERIMENT = 'experiment';
    const TYPE_PERMISSION = 'permission';
    const TYPE_OPS = 'ops';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues(): array
    {
        return [
            self::TYPE_RELEASE,
            self::TYPE_EXPERIMENT,
            self::TYPE_PERMISSION,
            self::TYPE_OPS,
        ];
    }

    /**
     * Associative array for storing property values
     *
     * @var array
     */
    protected array $container = [];

    /**
     * Constructor
     *
     * @param array[]|null $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(?array $data = null)
    {
        $this->container['_id'] = $data['_id'] ?? null;
        $this->container['key'] = $data['key'] ?? null;
        $this->container['type'] = $data['type'] ?? null;
        $this->container['_variation'] = $data['_variation'] ?? null;
        $this->container['variationKey'] = $data['variationKey'] ?? null;
        $this->container['variationName'] = $data['variationName'] ?? null;
        $this->container['eval_reason'] = $data['eval_reason'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties(): array
    {
        $invalidProperties = [];

        if ($this->container['_id'] === null) {
            $invalidProperties[] = "'_id' can't be null";
        }
        if ($this->container['key'] === null) {
            $invalidProperties[] = "'key' can't be null";
        }
        if ($this->container['type'] === null) {
            $invalidProperties[] = "'type' can't be null";
        }
        $allowedValues = $this->getTypeAllowableValues();
        if (!is_null($this->container['type']) && !in_array($this->container['type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'type', must be one of '%s'",
                $this->container['type'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['_variation'] === null) {
            $invalidProperties[] = "'_variation' can't be null";
        }
        if ($this->container['variationKey'] === null) {
            $invalidProperties[] = "'variationKey' can't be null";
        }
        if ($this->container['variationName'] === null) {
            $invalidProperties[] = "'variationName' can't be null";
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
     * Gets _id
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->container['_id'];
    }

    /**
     * Sets _id
     *
     * @param string $_id unique database id
     *
     * @return self
     */
    public function setId($_id): self
    {
        $this->container['_id'] = $_id;

        return $this;
    }

    /**
     * Gets key
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->container['key'];
    }

    /**
     * Sets key
     *
     * @param string $key Unique key by Project, can be used in the SDK / API to reference by 'key' rather than _id.
     *
     * @return self
     */
    public function setKey($key): self
    {
        $this->container['key'] = $key;

        return $this;
    }

    /**
     * Gets type
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string $type Feature type
     *
     * @return self
     */
    public function setType($type): self
    {
        $allowedValues = $this->getTypeAllowableValues();
        if (!in_array($type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'type', must be one of '%s'",
                    $type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets _variation
     *
     * @return string
     */
    public function getVariation(): string
    {
        return $this->container['_variation'];
    }

    /**
     * Sets _variation
     *
     * @param string $_variation Bucketed feature variation
     *
     * @return self
     */
    public function setVariation($_variation): self
    {
        $this->container['_variation'] = $_variation;

        return $this;
    }

    /**
     * Gets variationKey
     *
     * @return string
     */
    public function getVariationKey(): string
    {
        return $this->container['variationKey'];
    }

    /**
     * Sets variationKey
     *
     * @param string $variationKey Bucketed feature variation key
     *
     * @return self
     */
    public function setVariationKey(string $variationKey): self
    {
        $this->container['variationKey'] = $variationKey;

        return $this;
    }

    /**
     * Gets variationName
     *
     * @return string
     */
    public function getVariationName(): string
    {
        return $this->container['variationName'];
    }

    /**
     * Sets variationName
     *
     * @param string $variationName Bucketed feature variation name
     *
     * @return self
     */
    public function setVariationName(string $variationName): self
    {
        $this->container['variationName'] = $variationName;

        return $this;
    }

    /**
     * Gets eval_reason
     *
     * @return string|null
     */
    public function getEvalReason(): ?string
    {
        return $this->container['eval_reason'];
    }

    /**
     * Sets eval_reason
     *
     * @param string|null $eval_reason Evaluation reasoning
     *
     * @return self
     */
    public function setEvalReason(?string $eval_reason): self
    {
        $this->container['eval_reason'] = $eval_reason;

        return $this;
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
     * @return mixed
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
    public function __toString()
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
}
