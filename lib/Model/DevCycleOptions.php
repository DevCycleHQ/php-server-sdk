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
     * @param boolean                $enableEdgeDB         flag to enable EdgeDB user data storage 
     */
    public function __construct($enableEdgeDB = false)
    {
        $this->enableEdgeDB = $enableEdgeDB;
    }

    /**
     * Gets the enableEdgeDB flag
     *
     * @return boolean enable EdgeDB flag
     */
    public function getEnableEdgeDB()
    {
        return $this->enableEdgeDB;
    }

    /**
     * Sets the enableEdgeDB flag
     *
     * @param boolean $enableEdgeDB
     */
    public function setEnableEdgeDB($enableEdgeDB)
    {
        $this->enableEdgeDB = $enableEdgeDB;
    }
}

/**
 * @deprecated Use DevCycle\Model\Options instead
 */
class_alias('DevCycle\\Model\\DevCycleOptions', 'DevCycle\\Model\\DVCOptions');