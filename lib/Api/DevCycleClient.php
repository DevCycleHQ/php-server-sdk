<?php

namespace DevCycle\Api;

use DevCycle\Model\DevCycleEvent;
use DevCycle\Model\DevCycleUser;
use DevCycle\Model\DevCycleUserAndEventsBody;
use DevCycle\Model\ErrorResponse;
use DevCycle\Model\Feature;
use DevCycle\Model\InlineResponse201;
use DevCycle\Model\Variable;
use DevCycle\OpenFeature\DevCycleProvider;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Query;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use DevCycle\ApiException;
use DevCycle\HTTPConfiguration;
use DevCycle\Model\DevCycleOptions;
use DevCycle\HeaderSelector;
use DevCycle\ObjectSerializer;
use InvalidArgumentException;
use RuntimeException;

/**
 * DVCClient Class Doc Comment
 *
 * @category Class
 * @package  DevCycle
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class DevCycleClient
{
    /**
     * @var ClientInterface
     */
    protected ClientInterface $client;

    /**
     * @var HTTPConfiguration
     */
    protected HTTPConfiguration $httpConfiguration;

    /**
     * @var DevCycleOptions
     */
    protected DevCycleOptions $dvcOptions;

    /**
     * @var HeaderSelector
     */
    protected HeaderSelector $headerSelector;

    protected DevCycleProvider $openFeatureProvider;


    /**
     * @param string $sdkKey
     * @param DevCycleOptions $dvcOptions
     * @param HTTPConfiguration|null $config
     * @param ClientInterface|null $client
     * @param HeaderSelector|null $selector
     */
    public function __construct(
        string $sdkKey,
        DevCycleOptions   $dvcOptions,
        ?HTTPConfiguration $config = null,
        ?ClientInterface   $client = null,
        ?HeaderSelector    $selector = null,
    )
    {
        if ($sdkKey === '') {
            throw new InvalidArgumentException("SDK Key is required");
        }
        $this->client = $client ?? new Client();
        $this->httpConfiguration = $config ?? new HTTPConfiguration();
        $this->httpConfiguration->setApiKey('Authorization', $sdkKey);
        $this->headerSelector = $selector ?? new HeaderSelector();
        $this->dvcOptions = $dvcOptions;
        $this->openFeatureProvider = new DevCycleProvider($this);
    }

    public function getOpenFeatureProvider(): DevCycleProvider
    {
        return $this->openFeatureProvider;
    }

    /**
     * Validate user data exists and has valid data
     * @param DevCycleUser $user user (required)
     * @return bool
     */
    public function validateUserData(DevCycleUser $user): bool
    {
        if (!$user->valid()) {
            $errors = $user->listInvalidProperties();
            throw new InvalidArgumentException("User data is invalid: " . implode(', ', $errors));
        }
        return true;
    }

    /**
     * Validate user data exists and has valid data
     * @param DevCycleEvent $event_data event_data (required)
     *
     * @throws InvalidArgumentException
     */
    public function validateEventData(DevCycleEvent $event_data): bool
    {
        if (!$event_data->valid()) {
            $errors = $event_data->listInvalidProperties();
            throw new InvalidArgumentException("Event data is invalid: " . implode(', ', $errors));
        }
        return true;
    }

    /**
     * Operation allFeatures
     *
     * Get all features by key for user data
     *
     * @param DevCycleUser $user_data user_data (required)
     *
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     * @throws GuzzleException
     */
    public function allFeatures(DevCycleUser $user_data)
    {
        $this->validateUserData($user_data);

        list($response) = $this->allFeaturesWithHttpInfo($user_data);
        return $response;
    }

    /**
     * Operation allFeaturesWithHttpInfo
     *
     * Get all features by key for user data
     *
     * @param DevCycleUser $user_data (required)
     *
     * @return array of array<string,\Feature>|\ErrorResponse
     * @throws InvalidArgumentException
     * @throws ApiException|GuzzleException on non-2xx response
     */
    private function allFeaturesWithHttpInfo(DevCycleUser $user_data): array
    {
        $request = $this->allFeaturesRequest($user_data);

        try {

            list($response, $statusCode) = $this->makeRequest($request);

            if ($statusCode == 200) {
                $content = (string)$response->getBody();
                return [
                    ObjectSerializer::deserialize($content, 'array<string,\DevCycle\Model\Feature>', []),
                    $response->getStatusCode(),
                    $response->getHeaders()
                ];
            }

            $returnType = 'array<string,\DevCycle\Model\Feature>';
            $content = (string)$response->getBody();

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'array<string,\DevCycle\Model\Feature>',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                case 404:
                case 500:
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DevCycle\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation allFeaturesAsync
     *
     * Get all features by key for user data
     *
     * @param DevCycleUser $user_data (required)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function allFeaturesAsync(DevCycleUser $user_data): PromiseInterface
    {
        $this->validateUserData($user_data);

        return $this->allFeaturesAsyncWithHttpInfo($user_data)
            ->then(
                function ($response) {
                    return $response;
                }
            );
    }

    /**
     * Operation allFeaturesAsyncWithHttpInfo
     *
     * Get all features by key for user data
     *
     * @param DevCycleUser $user_data (required)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    private function allFeaturesAsyncWithHttpInfo(DevCycleUser $user_data): PromiseInterface
    {
        $returnType = 'array<string,\DevCycle\Model\Feature>';
        $request = $this->allFeaturesRequest($user_data);
        return $this->asyncMakeRequest($request, $returnType);
    }

    /**
     * Create request for operation 'allFeatures'
     *
     * @param DevCycleUser $user_data (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    private function allFeaturesRequest(DevCycleUser $user_data): Request
    {
        $resourcePath = '/v1/features';
        return $this->buildBucketingApiRequest($user_data, $resourcePath);
    }

    /**
     * Operation variableValue
     *
     * Get variable value by key for user data
     *
     * @param DevCycleUser $user_data user_data (required)
     * @param string $key Variable key (required)
     * @param mixed $default Default value if variable is not found (required)
     *
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function variableValue(DevCycleUser $user_data, string $key, mixed $default): mixed
    {
        return $this->variable($user_data, $key, $default)->getValue();
    }

    /**
     * Operation variable
     *
     * Get variable object by key for user data
     *
     * @param DevCycleUser $user user_data (required)
     * @param string $key Variable key (required)
     * @param mixed $default Default value if variable is not found (required)
     */
    public function variable(DevCycleUser $user, string $key, mixed $default): Variable
    {
        $this->validateUserData($user);

        try {
            list($response) = $this->variableWithHttpInfo($user, $key);
            return $this->reformatVariable($key, $response, $default);
        } catch (GuzzleException|ApiException $e) {
            if ($e->getCode() != 404) {

                error_log("Failed to get variable value for key $key, ".$e->getMessage());
            }
            return new Variable(array("key" => $key, "value" => $default, "type" => gettype($default), "isDefaulted" => true));
        }
    }


    private function reformatVariable(string $key, Variable $response, mixed $default): Variable
    {
        $isArrayWrapped = gettype($response->getValue()) === "array" && (gettype($default) !== "array" && gettype($default) !== "object");
        $unwrappedValue = $isArrayWrapped ? $response->getValue()[0] : $response->getValue();

        $isObjectDefault = gettype($default) === "object";
        $responseType = gettype($unwrappedValue);
        $defaultType = gettype($default);

        $doTypesMatch = $isArrayWrapped ? gettype($response->getValue()[0]) === $defaultType : $responseType == $defaultType || $isObjectDefault;

        if ($default === null) {
            $doTypesMatch = true;
        }

        if (!$doTypesMatch) {
            return new Variable(array("key" => $key, "value" => $default, "type" => $defaultType, "isDefaulted" => true));
        } else {
            if ($responseType === 'array') {
                $jsonValue = json_decode(json_encode($unwrappedValue), true);
                $unwrappedValue = $jsonValue;
            }
            return new Variable(array("key" => $key, "value" => $unwrappedValue, "type" => $responseType, "isDefaulted" => false));
        }
    }

    private function fixVariableValueNesting($variable)
    {
        $isArrayWrapped = gettype($variable["value"]) === "array";
        if ($isArrayWrapped && sizeof($variable["value"]) > 0 && in_array(0, array_keys($variable["value"]))) {
            $variable["value"] = $variable["value"][0];
        }
        return $variable;
    }

    /**
     * Operation variableWithHttpInfo
     *
     * Get variable by key for user data
     *
     * @param string $key Variable key (required)
     * @param DevCycleUser $user_data (required)
     *
     * @return array of \DevCycle\Model\Variable|\DevCycle\Model\ErrorResponse|\DevCycle\Model\ErrorResponse|\DevCycle\Model\ErrorResponse|\DevCycle\Model\ErrorResponse, HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException|GuzzleException on non-2xx response
     */
    private function variableWithHttpInfo(DevCycleUser $user_data, string $key): array
    {
        $request = $this->variableRequest($user_data, $key);

        try {
            list($response, $statusCode) = $this->makeRequest($request);

            switch ($statusCode) {
                case 200:
                    $content = (string)$response->getBody();

                    return [
                        ObjectSerializer::deserialize($content, '\DevCycle\Model\Variable', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 500:
                case 404:
                case 401:
                case 400:
                    $content = (string)$response->getBody();

                    return [
                        ObjectSerializer::deserialize($content, '\DevCycle\Model\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\DevCycle\Model\Variable';
            $content = (string)$response->getBody();

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DevCycle\Model\Variable',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                case 404:
                case 500:
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DevCycle\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation variableAsync
     *
     * Get variable by key for user data
     *
     * @param DevCycleUser $user_data (required)
     * @param string $key Variable key (required)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function variableAsync(DevCycleUser $user_data, string $key, mixed $default): PromiseInterface
    {
        $this->validateUserData($user_data);

        return $this->variableAsyncWithHttpInfo($user_data, $key)
            ->then(
                function ($response) {
                    return $response[0];
                },
                function ($e) use ($default, $key) {
                    if ($e->getCode() != 404) {
                        error_log("Failed to get variable value for key $key, $e");
                    }

                    return new Variable(array(
                        "value" => $default,
                        "key" => $key
                    ));
                }
            );
    }

    /**
     * Operation variableAsyncWithHttpInfo
     *
     * Get variable by key for user data
     *
     * @param DevCycleUser $user_data (required)
     * @param string $key Variable key (required)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    private function variableAsyncWithHttpInfo(DevCycleUser $user_data, string $key): PromiseInterface
    {
        $returnType = '\DevCycle\Model\Variable';
        $request = $this->variableRequest($user_data, $key);

        return $this->asyncMakeRequest($request, $returnType);
    }

    /**
     * Create request for operation 'variable'
     *
     * @param DevCycleUser $user_data (required)
     * @param string $key Variable key (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    private function variableRequest(DevCycleUser $user_data, string $key): Request
    {
        $resourcePath = '/v1/variables/{key}';
        $queryParams = [];
        if ($this->dvcOptions->isEdgeDBEnabled()) {
            $queryParams = ['enableEdgeDB' => 'true'];
        }
        $headerParams = [];


        // path params
        $resourcePath = str_replace(
            '{' . 'key' . '}',
            ObjectSerializer::toPathValue($key),
            $resourcePath
        );


        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            ['application/json']
        );


        if ($headers['Content-Type'] === 'application/json') {
            $httpBody = json_encode(ObjectSerializer::sanitizeForSerialization($user_data));
        } else {
            $httpBody = $user_data;
        }


        // this endpoint requires API key authentication
        return $this->buildAuthorizedRequest($headers, $headerParams, $queryParams, $resourcePath, $httpBody);
    }

    /**
     * Operation allVariables
     *
     * Get all variables by key for user data
     *
     * @param DevCycleUser $user_data user_data (required)
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function allVariables(DevCycleUser $user_data): array
    {
        $this->validateUserData($user_data);

        list($response) = $this->allVariablesWithHttpInfo($user_data);
        $variables = [];
        foreach ($response as $key => $variable) {
            $variables[$key] = $this->fixVariableValueNesting($variable);
        }
        return $variables;
    }

    /**
     * Operation allVariablesWithHttpInfo
     *
     * Get all variables by key for user data
     *
     * @param DevCycleUser $user_data (required)
     *
     * @return array of array<string,\DevCycle\Model\Variable>|\DevCycle\Model\ErrorResponse|\DevCycle\Model\ErrorResponse|\DevCycle\Model\ErrorResponse|\DevCycle\Model\ErrorResponse, HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException|GuzzleException on non-2xx response
     */
    private function allVariablesWithHttpInfo(DevCycleUser $user_data): array
    {
        $request = $this->allVariablesRequest($user_data);

        try {
            list($response, $statusCode) = $this->makeRequest($request);

            if ($statusCode == 200) {

                $content = (string)$response->getBody();

                return [
                    ObjectSerializer::deserialize($content, 'array<string,\DevCycle\Model\Variable>', []),
                    $response->getStatusCode(),
                    $response->getHeaders()
                ];
            }

            $returnType = 'array<string,\DevCycle\Model\Variable>';
            $content = (string)$response->getBody();


            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        'array<string,\DevCycle\Model\Variable>',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                case 404:
                case 500:
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DevCycle\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation allVariablesAsync
     *
     * Get all variables by key for user data
     *
     * @param DevCycleUser $user_data (required)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function allVariablesAsync(DevCycleUser $user_data): PromiseInterface
    {
        $this->validateUserData($user_data);

        return $this->allVariablesAsyncWithHttpInfo($user_data)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation allVariablesAsyncWithHttpInfo
     *
     * Get all variables by key for user data
     *
     * @param DevCycleUser $user_data (required)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    private function allVariablesAsyncWithHttpInfo(DevCycleUser $user_data): PromiseInterface
    {
        $returnType = 'array<string,\DevCycle\Model\Variable>';
        $request = $this->allVariablesRequest($user_data);

        return $this->asyncMakeRequest($request, $returnType);
    }

    /**
     * Create request for operation 'allVariables'
     *
     * @param DevCycleUser $user_data (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    private function allVariablesRequest(DevCycleUser $user_data): Request
    {
        $resourcePath = '/v1/variables';
        return $this->buildBucketingApiRequest($user_data, $resourcePath);
    }

    /**
     * Operation postEvents
     *
     * Post events to DevCycle for user
     *
     * @param DevCycleUser $user_data user_data (required)
     * @param DevCycleEvent $event_data event_data (required)
     *
     * @return InlineResponse201|ErrorResponse
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function track(DevCycleUser $user_data, DevCycleEvent $event_data): ErrorResponse|InlineResponse201
    {
        try {
            $this->validateUserData($user_data);
            $this->validateEventData($event_data);
        } catch(InvalidArgumentException $e) {
            return new ErrorResponse(array("message" => $e->getMessage()));
        }
        $user_data_and_events_body = new DevCycleUserAndEventsBody(array(
            "user" => $user_data,
            "events" => [$event_data]
        ));

        list($response) = $this->postEventsWithHttpInfo($user_data_and_events_body);
        return $response;
    }

    /**
     * Operation postEventsWithHttpInfo
     *
     * Post events to DevCycle for user
     *
     * @param DevCycleUserAndEventsBody $userEvents (required)
     *
     * @return array of \DevCycle\Model\InlineResponse201|\DevCycle\Model\ErrorResponse, HTTP status code, HTTP response headers (array of strings)
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    private function postEventsWithHttpInfo(DevCycleUserAndEventsBody $userEvents): array
    {
        $request = $this->postEventsRequest($userEvents);

        try {

            list($response, $statusCode) = $this->makeRequest($request);

            if ($statusCode == 201) {

                $content = (string)$response->getBody();


                return [
                    ObjectSerializer::deserialize($content, '\DevCycle\Model\InlineResponse201', []),
                    $response->getStatusCode(),
                    $response->getHeaders()
                ];
            }

            $returnType = '\DevCycle\Model\InlineResponse201';

            $content = (string)$response->getBody();


            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DevCycle\Model\InlineResponse201',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                case 404:
                case 500:
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\DevCycle\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation postEventsAsync
     *
     * Post events to DevCycle for user
     *
     * @param DevCycleUser $user
     * @param DevCycleEvent $event
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function trackAsync(DevCycleUser $user, DevCycleEvent $event): PromiseInterface
    {
        $this->validateUserData($user);
        $this->validateEventData($event);

        $user_data_and_events_body = new DevCycleUserAndEventsBody(array(
            "user" => $user,
            "events" => [$event]
        ));

        return $this->postEventsAsyncWithHttpInfo($user_data_and_events_body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation postEventsAsyncWithHttpInfo
     *
     * Post events to DevCycle for user
     *
     * @param DevCycleUserAndEventsBody $userEvents (required)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    private function postEventsAsyncWithHttpInfo(DevCycleUserAndEventsBody $userEvents): PromiseInterface
    {
        $returnType = '\DevCycle\Model\InlineResponse201';
        $request = $this->postEventsRequest($userEvents);

        return $this->asyncMakeRequest($request, $returnType);
    }

    /**
     * Create request for operation 'postEvents'
     *
     * @param DevCycleUserAndEventsBody $user_data_and_events_body (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    private function postEventsRequest(DevCycleUserAndEventsBody $user_data_and_events_body): Request
    {
        $resourcePath = '/v1/track';

        return $this->buildBucketingApiRequest($user_data_and_events_body, $resourcePath);
    }

    /**
     * Create http client option
     *
     * @return array of http client options
     * @throws RuntimeException on file opening failure
     */
    protected function createHttpClientOption(): array
    {
        $options = [];
        $options["curl"] = $this->dvcOptions->getUnixSocketPath() == "" ? [] : [
            CURLOPT_UNIX_SOCKET_PATH => $this->dvcOptions->getUnixSocketPath()
        ];
        $options['http_errors'] = false;
        return array_merge($options, $this->dvcOptions->getHttpOptions());
    }

    /**
     * @param Request $request
     * @param string $returnType
     * @return PromiseInterface
     */
    private function asyncMakeRequest(Request $request, string $returnType): PromiseInterface
    {
        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $content = (string)$response->getBody();
                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string)$response->getBody()
                    );
                }
            );
    }

    /**
     * @param array $headers
     * @param array $headerParams
     * @param array $queryParams
     * @param string $resourcePath
     * @param DevCycleUserAndEventsBody|string $httpBody
     * @return Request
     */
    private function buildAuthorizedRequest(array $headers, array $headerParams, array $queryParams, string $resourcePath, DevCycleUserAndEventsBody|string $httpBody): Request
    {
        $apiKey = $this->httpConfiguration->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->httpConfiguration->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->httpConfiguration->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = Query::build($queryParams);
        return new Request(
            'POST',
            $this->dvcOptions->getBucketingApiHostname() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * @param Request $request
     * @return array
     * @throws ApiException
     * @throws GuzzleException
     */
    private function makeRequest(Request $request): array
    {
        $options = $this->createHttpClientOption();
        try {
            $response = $this->client->send($request, $options);
        } catch (RequestException $e) {
            throw new ApiException(
                "[{$e->getCode()}] {$e->getMessage()}",
                (int)$e->getCode(),
                $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                $e->getResponse() ? (string)$e->getResponse()->getBody() : null
            );
        } catch (Exception $e) {
            throw new ApiException(
                "[{$e->getCode()}] {$e->getMessage()}",
                (int)$e->getCode(),
                null,
                null
            );
        }

        $statusCode = $response->getStatusCode();

        if ($statusCode < 200 || $statusCode > 299) {
            throw new ApiException(
                sprintf(
                    '[%d] Error connecting to the API (%s)',
                    $statusCode,
                    $request->getUri()
                ),
                $statusCode,
                $response->getHeaders(),
                (string)$response->getBody()
            );
        }
        return array($response, $statusCode);
    }

    /**
     * @param DevCycleUser $user_data
     * @param string $resourcePath
     * @return Request
     */
    private function buildBucketingApiRequest(DevCycleUser|DevCycleUserAndEventsBody $body, string $resourcePath): Request
    {
        $queryParams = [];
        if ($this->dvcOptions->isEdgeDBEnabled()) {
            $queryParams = ['enableEdgeDB' => 'true'];
        }
        $headerParams = [];

        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            ['application/json']
        );

        if ($headers['Content-Type'] === 'application/json') {
            $httpBody = json_encode(ObjectSerializer::sanitizeForSerialization($body));
        } else {
            $httpBody = $body;
        }
        // this endpoint requires API key authentication
        return $this->buildAuthorizedRequest($headers, $headerParams, $queryParams, $resourcePath, $httpBody);
    }
}
