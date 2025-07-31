<?php

namespace DevCycle\Model;

/**
 * Evaluation reasons for successful evaluations
 */
class EvalReasons
{
    /**
     * Default evaluation reason
     */
    public const DEFAULT = 'DEFAULT';
    
    /**
     * Error evaluation reason
     */
    public const ERROR = 'ERROR';
}

/**
 * Default reason details
 */
class DefaultReasonDetails
{
    /**
     * Missing configuration reason detail
     */
    public const MISSING_CONFIG = 'Missing Config';
    
    /**
     * User not targeted reason detail
     */
    public const USER_NOT_TARGETED = 'User Not Targeted';

    /**
     * Type mismatch reason detail
     */
    public const TYPE_MISMATCH = 'Variable Type Mismatch';

    /**
     * Evaluation error reason detail
     */
    public const ERROR = 'Error';
}
