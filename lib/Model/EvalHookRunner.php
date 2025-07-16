<?php

namespace DevCycle\Model;

use Exception;

/**
 * EvalHookRunner Class
 *
 * Manages and executes evaluation hooks during variable evaluation.
 *
 * @category Class
 * @package  DevCycle
 */
class EvalHookRunner
{
    /**
     * @var EvalHook[]
     */
    private array $hooks;

    /**
     * Constructor
     *
     * @param EvalHook[] $hooks Array of evaluation hooks
     */
    public function __construct(array $hooks = [])
    {
        $this->hooks = $hooks;
    }

    /**
     * Get all hooks
     *
     * @return EvalHook[]
     */
    public function getHooks(): array
    {
        return $this->hooks;
    }

    /**
     * Add a hook
     *
     * @param EvalHook $hook The hook to add
     * @return void
     */
    public function addHook(EvalHook $hook): void
    {
        $this->hooks[] = $hook;
    }

    /**
     * Run before hooks
     *
     * @param EvalHook[] $hooks Array of hooks to run
     * @param HookContext $context The hook context
     * @throws BeforeHookError When a before hook fails
     * @return void
     */
    public function runBeforeHooks(array $hooks, HookContext $context): void
    {
        foreach ($hooks as $hook) {
            $beforeCallback = $hook->getBefore();
            if ($beforeCallback !== null) {
                try {
                    call_user_func($beforeCallback, $context);
                } catch (Exception $e) {
                    throw new BeforeHookError("Before hook failed: " . $e->getMessage(), 0, $e);
                }
            }
        }
    }

    /**
     * Run after hooks
     *
     * @param EvalHook[] $hooks Array of hooks to run
     * @param HookContext $context The hook context
     * @throws AfterHookError When an after hook fails
     * @return void
     */
    public function runAfterHooks(array $hooks, HookContext $context): void
    {
        foreach ($hooks as $hook) {
            $afterCallback = $hook->getAfter();
            if ($afterCallback !== null) {
                try {
                    call_user_func($afterCallback, $context);
                } catch (Exception $e) {
                    throw new AfterHookError("After hook failed: " . $e->getMessage(), 0, $e);
                }
            }
        }
    }

    /**
     * Run onFinally hooks
     *
     * @param EvalHook[] $hooks Array of hooks to run
     * @param HookContext $context The hook context
     * @return void
     */
    public function runOnFinallyHooks(array $hooks, HookContext $context): void
    {
        foreach ($hooks as $hook) {
            $onFinallyCallback = $hook->getOnFinally();
            if ($onFinallyCallback !== null) {
                try {
                    call_user_func($onFinallyCallback, $context);
                } catch (Exception $e) {
                    // Log the error but don't throw it
                    error_log("OnFinally hook failed: " . $e->getMessage());
                }
            }
        }
    }

    /**
     * Run error hooks
     *
     * @param EvalHook[] $hooks Array of hooks to run
     * @param HookContext $context The hook context
     * @param Exception $error The error that occurred
     * @return void
     */
    public function runErrorHooks(array $hooks, HookContext $context, Exception $error): void
    {
        foreach ($hooks as $hook) {
            $errorCallback = $hook->getError();
            if ($errorCallback !== null) {
                try {
                    call_user_func($errorCallback, $context, $error);
                } catch (Exception $e) {
                    // Log the error but don't throw it
                    error_log("Error hook failed: " . $e->getMessage());
                }
            }
        }
    }
}
