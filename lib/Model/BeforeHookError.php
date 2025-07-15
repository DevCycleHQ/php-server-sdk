<?php

namespace DevCycle\Model;

use Exception;

/**
 * BeforeHookError Class
 *
 * Exception thrown when before hooks fail during variable evaluation.
 *
 * @category Class
 * @package  DevCycle
 */
class BeforeHookError extends Exception
{
    /**
     * Constructor
     *
     * @param string $message The error message
     * @param int $code The error code
     * @param Exception|null $previous The previous exception
     */
    public function __construct(string $message = "", int $code = 0, ?Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
} 