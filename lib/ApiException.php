<?php
namespace DevCycle;

use Exception;
use stdClass;

/**
 * ApiException Class Doc Comment
 *
 */
class ApiException extends Exception
{

    /**
     * The HTTP body of the server response either as Json or string.
     *
     * @var stdClass|string|null
     */
    protected stdClass|string|null $responseBody;

    /**
     * The HTTP header of the server response.
     *
     * @var string[]|null
     */
    protected ?array $responseHeaders;

    /**
     * The deserialized response object
     *
     * @var stdClass|string|null
     */
    protected stdClass|string|null $responseObject;

    /**
     * Constructor
     *
     * @param string $message         Error message
     * @param int $code            HTTP status code
     * @param string[]|null         $responseHeaders HTTP response header
     * @param string|stdClass|null $responseBody    HTTP decoded body of the server response either as \stdClass or string
     */
    public function __construct(string $message = "", int $code = 0, $responseHeaders = [], string|stdClass $responseBody = null)
    {
        parent::__construct($message, $code);
        $this->responseHeaders = $responseHeaders;
        $this->responseBody = $responseBody;
    }

    /**
     * Gets the HTTP response header
     *
     * @return string[]|null HTTP response header
     */
    public function getResponseHeaders(): ?array
    {
        return $this->responseHeaders;
    }

    /**
     * Gets the HTTP body of the server response either as Json or string
     *
     * @return stdClass|string|null HTTP body of the server response either as \stdClass or string
     */
    public function getResponseBody(): stdClass|string|null
    {
        return $this->responseBody;
    }

    /**
     * Sets the deserialized response object (during deserialization)
     *
     * @param mixed $obj Deserialized response object
     *
     * @return void
     */
    public function setResponseObject(mixed $obj): void
    {
        $this->responseObject = $obj;
    }

    /**
     * Gets the deserialized response object (during deserialization)
     *
     * @return stdClass|string|null the deserialized response object
     */
    public function getResponseObject(): stdClass|string|null
    {
        return $this->responseObject;
    }
}
