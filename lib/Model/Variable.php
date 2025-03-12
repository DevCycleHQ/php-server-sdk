<?php



namespace DevCycle\Model;

use \ArrayAccess;
use \DevCycle\ObjectSerializer;
use OpenFeature\implementation\provider\ResolutionDetails;
use OpenFeature\implementation\provider\ResolutionError;
use OpenFeature\interfaces\provider\ErrorCode;
use OpenFeature\interfaces\provider\Reason;

/**
 * Variable Class Doc Comment
 *
 * @category Class
 * @package  DevCycle
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class Variable implements ModelInterface, ArrayAccess, \JsonSerializable
{

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static string $openAPIModelName = 'Variable';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static array $openAPITypes = [
        '_id' => 'string',
        'key' => 'string',
        'type' => 'string',
        'value' => 'object'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        '_id' => null,
        'key' => null,
        'type' => null,
        'value' => null
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
    protected static $attributeMap = [
        '_id' => '_id',
        'key' => 'key',
        'type' => 'type',
        'value' => 'value',
        'isDefaulted' => 'isDefaulted'
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
        'value' => 'setValue',
        'isDefaulted' => 'setIsDefaulted'
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
        'value' => 'getValue',
        'isDefaulted' => 'getIsDefaulted'
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

    const TYPE_STRING = 'String';
    const TYPE_BOOLEAN = 'Boolean';
    const TYPE_NUMBER = 'Number';
    const TYPE_JSON = 'JSON';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues(): array
    {
        return [
            self::TYPE_STRING,
            self::TYPE_BOOLEAN,
            self::TYPE_NUMBER,
            self::TYPE_JSON,
        ];
    }

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected array $container = [];

    /**
     * Constructor
     *
     * @param mixed[]|null $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(?array $data = null)
    {
        $this->container['_id'] = $data['_id'] ?? null;
        $this->container['key'] = $data['key'] ?? null;
        $this->container['type'] = $data['type'] ?? null;
        $this->container['value'] = $data['value'] ?? null;
        $this->container['isDefaulted'] = $data['isDefaulted'] ?? false;
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

        if ($this->container['value'] === null) {
            $invalidProperties[] = "'value' can't be null";
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
    public function getId(): ?string
    {
        return $this->container['_id'];
    }

    /**
     * Sets _id
     *
     * @param string|null $_id unique database id
     *
     * @return self
     */
    public function setId(?string $_id): self
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
    public function setKey($key): static
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
     * @param string $type Variable type
     *
     * @return self
     */
    public function setType(string $type): static
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
     * Gets value
     *
     * @return mixed object
     */
    public function getValue(): mixed
    {
        return $this->container['value'];
    }

    /**
     * Sets value
     *
     * @param object $value Variable value can be a string, number, boolean, or JSON
     *
     * @return self
     */
    public function setValue(mixed $value): self
    {
        $this->container['value'] = $value;

        return $this;
    }

    /**
     * Gets isDefaulted
     *
     * @return bool
     */
    public function isDefaulted(): bool
    {
        return $this->container['isDefaulted'];
    }

    /**
     * Sets isDefaulted
     *
     * @param bool $isDefaulted Variable set to true if the Variable could not be fetched
     *
     * @return self
     */
    public function setIsDefaulted(bool $isDefaulted): static
    {
        $this->container['isDefaulted'] = $isDefaulted;

        return $this;
    }

    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset):bool
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
    public function offsetGet($offset):mixed
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, mixed $value):void
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
    public function offsetUnset($offset):void
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
    public function jsonSerialize():mixed
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
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }

    public function asResolutionDetails(): ResolutionDetails
    {
        $resolution = new ResolutionDetails();
        $resolution->setValue($this->getValue());
        $resolution->setReason(Reason::TARGETING_MATCH);
        if ($this->isDefaulted()) {
            $resolution->setError(new ResolutionError(ErrorCode::FLAG_NOT_FOUND(), "Defaulted"));
            $resolution->setReason(Reason::DEFAULT);
        }
        return $resolution;
    }
}
