<?php

namespace DevCycle\Model;

/**
 * EvalHook Class
 *
 * Represents an evaluation hook with callback functions for different stages
 * of variable evaluation.
 *
 * @category Class
 * @package  DevCycle
 */
class EvalHook
{
    /**
     * @var callable|null
     */
    private $before;

    /**
     * @var callable|null
     */
    private $after;

    /**
     * @var callable|null
     */
    private $onFinally;

    /**
     * @var callable|null
     */
    private $error;

    /**
     * Constructor
     *
     * @param callable|null $before Callback function called before variable evaluation
     * @param callable|null $after Callback function called after variable evaluation
     * @param callable|null $onFinally Callback function called in finally block
     * @param callable|null $error Callback function called when an error occurs
     */
    public function __construct(
        ?callable $before = null,
        ?callable $after = null,
        ?callable $onFinally = null,
        ?callable $error = null
    ) {
        $this->before = $before;
        $this->after = $after;
        $this->onFinally = $onFinally;
        $this->error = $error;
    }

    /**
     * Get the before callback
     *
     * @return callable|null
     */
    public function getBefore(): ?callable
    {
        return $this->before;
    }

    /**
     * Get the after callback
     *
     * @return callable|null
     */
    public function getAfter(): ?callable
    {
        return $this->after;
    }

    /**
     * Get the onFinally callback
     *
     * @return callable|null
     */
    public function getOnFinally(): ?callable
    {
        return $this->onFinally;
    }

    /**
     * Get the error callback
     *
     * @return callable|null
     */
    public function getError(): ?callable
    {
        return $this->error;
    }
}
