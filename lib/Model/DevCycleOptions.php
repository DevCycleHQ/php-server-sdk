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

    /**
     * Constructor
     *
     * @param boolean $enableEdgeDB flag to enable EdgeDB user data storage
     */
    public function __construct(bool $enableEdgeDB = false, string $bucketingApiHostname = "https://bucketing-api.devcycle.com", ?string $unixSocketPath = null)
    {
        $this->enableEdgeDB = $enableEdgeDB;
        $this->bucketingApiHostname = $bucketingApiHostname;
        $this->unixSocketPath = $unixSocketPath;
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
    public function getUnixSocketPath(): string
    {
        return $this->unixSocketPath;
    }
}
