<?php
namespace DevCycle\Model;

use \ArrayAccess;
use \DevCycle\ObjectSerializer;

/**
 * DevCycleEvent Class Doc Comment
 *
 * @category Class
 * @package  DevCycle
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class DevCycleEvent implements ModelInterface, ArrayAccess, \JsonSerializable
{

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static string $openAPIModelName = 'Event';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static array $openAPITypes = [
        'type' => 'string',
        'target' => 'string',
        'date' => 'float',
        'value' => 'float',
        'meta_data' => 'object'
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     * @phpstan-var array<string, string|null>
     * @psalm-var array<string, string|null>
     */
    protected static array $openAPIFormats = [
        'type' => null,
        'target' => null,
        'date' => null,
        'value' => null,
        'meta_data' => null
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
        'type' => 'type',
        'target' => 'target',
        'date' => 'date',
        'value' => 'value',
        'meta_data' => 'metaData'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static array $setters = [
        'type' => 'setType',
        'target' => 'setTarget',
        'date' => 'setDate',
        'value' => 'setValue',
        'meta_data' => 'setMetaData'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static array $getters = [
        'type' => 'getType',
        'target' => 'getTarget',
        'date' => 'getDate',
        'value' => 'getValue',
        'meta_data' => 'getMetaData'
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


    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected array $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['type'] = $data['type'] ?? null;
        $this->container['target'] = $data['target'] ?? null;
        $this->container['date'] = $data['date'] ?? null;
        $this->container['value'] = $data['value'] ?? null;
        $this->container['meta_data'] = $data['meta_data'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties(): array
    {
        $invalidProperties = [];

        if ($this->container['type'] === null) {
            $invalidProperties[] = "'type' can't be null";
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
     * @param string $type Custom event type
     *
     * @return self
     */
    public function setType(string $type): static
    {
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets target
     *
     * @return string|null
     */
    public function getTarget(): ?string
    {
        return $this->container['target'];
    }

    /**
     * Sets target
     *
     * @param string|null $target Custom event target / subject of event. Contextual to event type
     *
     * @return self
     */
    public function setTarget(?string $target): static
    {
        $this->container['target'] = $target;

        return $this;
    }

    /**
     * Gets date
     *
     * @return float|null
     */
    public function getDate(): ?float
    {
        return $this->container['date'];
    }

    /**
     * Sets date
     *
     * @param float|null $date Unix epoch time the event occurred according to client
     *
     * @return self
     */
    public function setDate($date): static
    {
        $this->container['date'] = $date;

        return $this;
    }

    /**
     * Gets value
     *
     * @return float|null
     */
    public function getValue(): ?float
    {
        return $this->container['value'];
    }

    /**
     * Sets value
     *
     * @param float|null $value Value for numerical events. Contextual to event type
     *
     * @return self
     */
    public function setValue(?float $value): static
    {
        $this->container['value'] = $value;

        return $this;
    }

    /**
     * Gets meta_data
     *
     * @return object|null
     */
    public function getMetaData(): ?object
    {
        return $this->container['meta_data'];
    }

    /**
     * Sets meta_data
     *
     * @param object|null $meta_data Extra JSON metadata for event. Contextual to event type
     *
     * @return self
     */
    public function setMetaData(?object $meta_data): self
    {
        $this->container['meta_data'] = $meta_data;

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
