<?php
/**
 * DevCycleOptions
 * PHP version 7.3
 *
 * @category Class
 * @package  DevCycle
 */

/**
 * DevCycle Bucketing API
 *
 * Documents the DevCycle Bucketing API which provides and API interface to User Bucketing and for generated SDKs.
 */

namespace DevCycle\Model;

/**
 * DevCycleOptions Class Doc Comment
 *
 * @category Class
 * @package  DevCycle
 */
class DevCycleOptions
{
    protected $enableEdgeDB;

    /**
     * Constructor
     *
     * @param boolean $enableEdgeDB flag to enable EdgeDB user data storage
     */
    public function __construct(bool $enableEdgeDB = false)
    {
        $this->enableEdgeDB = $enableEdgeDB;
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
     * Sets the enableEdgeDB flag
     *
     * @param boolean $enableEdgeDB
     */
    public function setEnableEdgeDB(bool $enableEdgeDB): self
    {
        $this->enableEdgeDB = $enableEdgeDB;
        return $this;
    }
}
