<?php

namespace DevCycle\Model;

/**
 * DevCycleOptions Class Doc Comment
 *
 * @category Class
 * @package  DevCycle
 */
class DevCycleOptions
{
    protected bool $enableEdgeDB;

    protected string $bucketingApiHostname = "https://bucketing-api.devcycle.com";

    protected ?string $unixSocketPath = null;

    protected array $httpOptions = [];

    protected array $hooks = [];

    /**
     * Constructor
     *
     * @param boolean $enableEdgeDB flag to enable EdgeDB user data storage
     * @param string|null $bucketingApiHostname
     * @param string|null $unixSocketPath
     * @param array $httpOptions
     * @param array $hooks Array of evaluation hooks
     */
    public function __construct(bool $enableEdgeDB = false, ?string $bucketingApiHostname = null, ?string $unixSocketPath = null, array $httpOptions = [], array $hooks = [])
    {
        $this->enableEdgeDB = $enableEdgeDB;
        if ($bucketingApiHostname !== null) {
            $this->bucketingApiHostname = $bucketingApiHostname;
        }
        $this->unixSocketPath = $unixSocketPath;
        $this->httpOptions = $httpOptions;
        $this->hooks = $hooks;
    }

    /**
     * Gets the enableEdgeDB flag
     *
     * @return boolean enable EdgeDB flag
     */
    public function isEdgeDBEnabled(): bool
    {
        return $this->enableEdgeDB;
    }

    /**
     * Gets the bucketing API hostname
     * @return string bucketing API hostname
     */
    public function getBucketingApiHostname(): string
    {
        return $this->bucketingApiHostname;
    }

    /**
     * Gets the unix socket path
     * @return string unix socket path
     */
    public function getUnixSocketPath(): ?string
    {
        return $this->unixSocketPath;
    }

    public function getHttpOptions(): array
    {
        return $this->httpOptions;
    }

    /**
     * Gets the evaluation hooks
     *
     * @return array Array of evaluation hooks
     */
    public function getHooks(): array
    {
        return $this->hooks;
    }
}
