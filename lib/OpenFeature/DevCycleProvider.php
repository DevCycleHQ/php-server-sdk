<?php

namespace DevCycle\OpenFeature;
use DevCycle\Api\DevCycleClient;
use DevCycle\ApiException;
use DevCycle\Model\DevCycleUser;
use http\Exception\InvalidArgumentException;
use OpenFeature\interfaces\common\Metadata;
use OpenFeature\interfaces\flags\EvaluationContext;
use OpenFeature\interfaces\hooks\Hook;
use OpenFeature\interfaces\provider\Provider;
use OpenFeature\interfaces\provider\ResolutionDetails;
use Psr\Log\LoggerInterface;

class DevCycleProvider implements Provider
{
    private DevCycleClient $apiClient;
    public function __construct(DevCycleClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    /**
     * @return Hook[]
     */
    public function getHooks(): array
    {
        return $this->getHooks();
    }

    /**
     * @param LoggerInterface $logger
     * @return void
     */
    public function setLogger(LoggerInterface $logger): void
    {
        // TODO: Implement setLogger() method.
    }

    /**
     * @return Metadata
     */
    public function getMetadata(): Metadata
    {
        return new \OpenFeature\implementation\common\Metadata("DevCycle-PHP");
    }

    /**
     * @param string $flagKey
     * @param bool $defaultValue
     * @param EvaluationContext|null $context
     * @return ResolutionDetails
     * @throws ApiException
     */
    public function resolveBooleanValue(string $flagKey, bool $defaultValue, ?EvaluationContext $context = null): ResolutionDetails
    {
        if ($context == null) {
            throw new \InvalidArgumentException("Context cannot be null");
        }
        $user = DevCycleUser::FromEvaluationContext($context);

        $flag = $this->apiClient->variable($user, $flagKey, $defaultValue);
        return new \OpenFeature\implementation\provider\ResolutionDetails();
        // TODO: Implement resolveBooleanValue() method.
    }

    /**
     * @param string $flagKey
     * @param string $defaultValue
     * @param EvaluationContext|null $context
     * @return ResolutionDetails
     */
    public function resolveStringValue(string $flagKey, string $defaultValue, ?EvaluationContext $context = null): ResolutionDetails
    {
        // TODO: Implement resolveStringValue() method.
    }

    /**
     * @param string $flagKey
     * @param int $defaultValue
     * @param EvaluationContext|null $context
     * @return ResolutionDetails
     */
    public function resolveIntegerValue(string $flagKey, int $defaultValue, ?EvaluationContext $context = null): ResolutionDetails
    {
        // TODO: Implement resolveIntegerValue() method.
    }

    /**
     * @param string $flagKey
     * @param float $defaultValue
     * @param EvaluationContext|null $context
     * @return ResolutionDetails
     */
    public function resolveFloatValue(string $flagKey, float $defaultValue, ?EvaluationContext $context = null): ResolutionDetails
    {
        // TODO: Implement resolveFloatValue() method.
    }

    /**
     * @param string $flagKey
     * @param array $defaultValue
     * @param EvaluationContext|null $context
     * @return ResolutionDetails
     */
    public function resolveObjectValue(string $flagKey, array $defaultValue, ?EvaluationContext $context = null): ResolutionDetails
    {
        // TODO: Implement resolveObjectValue() method.
    }


}