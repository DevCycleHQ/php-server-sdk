<?php

namespace DevCycle\Model;

/**
 * HookContext Class
 *
 * Stores context data for hook execution during variable evaluation.
 *
 * @category Class
 * @package  DevCycle
 */
class HookContext
{
    /**
     * @var DevCycleUser
     */
    private DevCycleUser $user;

    /**
     * @var string
     */
    private string $key;

    /**
     * @var mixed
     */
    private $defaultValue;

    /**
     * @var Variable|null
     */
    private ?Variable $variableDetails;

    /**
     * Constructor
     *
     * @param DevCycleUser $user The user data
     * @param string $key The variable key
     * @param mixed $defaultValue The default value
     * @param Variable|null $variableDetails The evaluated variable details
     */
    public function __construct(
        DevCycleUser $user,
        string $key,
        $defaultValue,
        ?Variable $variableDetails = null
    ) {
        $this->user = $user;
        $this->key = $key;
        $this->defaultValue = $defaultValue;
        $this->variableDetails = $variableDetails;
    }

    /**
     * Get the user data
     *
     * @return DevCycleUser
     */
    public function getUser(): DevCycleUser
    {
        return $this->user;
    }

    /**
     * Get the variable key
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * Get the default value
     *
     * @return mixed
     */
    public function getDefaultValue()
    {
        return $this->defaultValue;
    }

    /**
     * Get the variable details
     *
     * @return Variable|null
     */
    public function getVariableDetails(): ?Variable
    {
        return $this->variableDetails;
    }

    /**
     * Set the variable details
     *
     * @param Variable|null $variableDetails
     * @return void
     */
    public function setVariableDetails(?Variable $variableDetails): void
    {
        $this->variableDetails = $variableDetails;
    }
}
