<?php
declare(strict_types=1);
namespace DevCycle\OpenFeature;

use DevCycle\Api\DevCycleClient;
use DevCycle\Model\DevCycleUser;

use OpenFeature\implementation\common\Metadata;
use OpenFeature\interfaces\common\LoggerAwareTrait;
use OpenFeature\interfaces\common\Metadata as IMetadata;
use OpenFeature\interfaces\flags\EvaluationContext;
use OpenFeature\interfaces\hooks\Hook;
use OpenFeature\interfaces\provider\Provider;
use OpenFeature\interfaces\provider\ResolutionDetails;

class DevCycleProvider implements Provider
{
    /**
     * Provides setLogger()/getLogger(), defaulting to a PSR NullLogger when
     * the OpenFeature API has not injected one.
     */
    use LoggerAwareTrait;

    private DevCycleClient $apiClient;
    private Metadata $metadata;

    private array $hooks;
    public function __construct(DevCycleClient $apiClient)
    {
        $this->apiClient = $apiClient;
        $this->metadata = new Metadata("DevCycle-PHP");
        $this->hooks = [];
    }

    /**
     * @return Hook[]
     */
    public function getHooks(): array
    {
        return $this->hooks;
    }

    public function setHooks(array $hooks): void
    {
        $this->hooks = $hooks;
    }

    /**
     * @return Metadata
     */
    public function getMetadata(): IMetadata
    {
        return $this->metadata;
    }

    /**
     * @param string $flagKey
     * @param bool $defaultValue
     * @param EvaluationContext|null $context
     * @return ResolutionDetails
     */
    public function resolveBooleanValue(string $flagKey, bool $defaultValue, ?EvaluationContext $context = null): ResolutionDetails
    {
        if ($context == null) {
            throw new \InvalidArgumentException("Context cannot be null");
        }
        $user = DevCycleUser::FromEvaluationContext($context);

        return $this->apiClient->variable($user, $flagKey, $defaultValue)->asResolutionDetails();
    }

    /**
     * @param string $flagKey
     * @param string $defaultValue
     * @param EvaluationContext|null $context
     * @return ResolutionDetails
     */
    public function resolveStringValue(string $flagKey, string $defaultValue, ?EvaluationContext $context = null): ResolutionDetails
    {
        if ($context == null) {
            throw new \InvalidArgumentException("Context cannot be null");
        }
        $user = DevCycleUser::FromEvaluationContext($context);

        return $this->apiClient->variable($user, $flagKey, $defaultValue)->asResolutionDetails();
    }

    /**
     * @param string $flagKey
     * @param int $defaultValue
     * @param EvaluationContext|null $context
     * @return ResolutionDetails
     */
    public function resolveIntegerValue(string $flagKey, int $defaultValue, ?EvaluationContext $context = null): ResolutionDetails
    {
        if ($context == null) {
            throw new \InvalidArgumentException("Context cannot be null");
        }
        $user = DevCycleUser::FromEvaluationContext($context);

        return $this->apiClient->variable($user, $flagKey, $defaultValue)->asResolutionDetails();
    }

    /**
     * @param string $flagKey
     * @param float $defaultValue
     * @param EvaluationContext|null $context
     * @return ResolutionDetails
     */
    public function resolveFloatValue(string $flagKey, float $defaultValue, ?EvaluationContext $context = null): ResolutionDetails
    {
        if ($context == null) {
            throw new \InvalidArgumentException("Context cannot be null");
        }
        $user = DevCycleUser::FromEvaluationContext($context);

        return $this->apiClient->variable($user, $flagKey, $defaultValue)->asResolutionDetails();
    }

    /**
     * @param string $flagKey
     * @param array $defaultValue
     * @param EvaluationContext|null $context
     * @return ResolutionDetails
     */
    public function resolveObjectValue(string $flagKey, array $defaultValue, ?EvaluationContext $context = null): ResolutionDetails
    {
        if ($context == null) {
            throw new \InvalidArgumentException("Context cannot be null");
        }
        $user = DevCycleUser::FromEvaluationContext($context);

        return $this->apiClient->variable($user, $flagKey, $defaultValue)->asResolutionDetails();
    }
}