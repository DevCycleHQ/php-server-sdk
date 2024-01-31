<?php

namespace DevCycle\Api;

use DevCycle\Model\DevCycleEvent;
use DevCycle\Model\DevCycleUser;
use DevCycle\Model\DevCycleUserAndEventsBody;
use DevCycle\Model\ErrorResponse;
use DevCycle\Model\Feature;
use DevCycle\Model\Variable;
use DevCycle\OpenFeature\DevCycleProvider;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\RequestOptions;
use DevCycle\ApiException;
use DevCycle\DevCycleConfiguration;
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
     * @var DevCycleConfiguration
     */
    protected DevCycleConfiguration $config;

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
     * @param DevCycleConfiguration|null $config
     * @param ClientInterface|null $client
     * @param HeaderSelector|null $selector
     * @param DevCycleOptions|null $dvcOptions
     */
    public function __construct(
        DevCycleConfiguration $config = null,
        ClientInterface       $client = null,
        HeaderSelector        $selector = null,
        DevCycleOptions       $dvcOptions = null
    )
    {
        $this->client = $client ?? new Client();
        $this->config = $config ?? new DevCycleConfiguration();
        $this->headerSelector = $selector ?? new HeaderSelector();
        $this->dvcOptions = $dvcOptions ?? new DevCycleOptions();
        $this->openFeatureProvider = new DevCycleProvider($this);
    }

    public function getOpenFeatureProvider(): DevCycleProvider
    {
        return $this->openFeatureProvider;
    }

    /**
     * @return DevCycleConfiguration
     */
    public function getConfig(): DevCycleConfiguration
    {
        return $this->config;
    }

    /**
     * Validate user data exists and has valid data
     * @param DevCycleUser $user_data user_data (required)
     *
     * @throws InvalidArgumentException
     */
    public function validateUserData(DevCycleUser $user_data): bool
    {
        if (!$user_data->valid()) {
            $errors = $user_data->listInvalidProperties();
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
     * @return array<string,Feature>|ErrorResponse
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
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
     * @throws ApiException on non-2xx response
     */
    public function allFeaturesWithHttpInfo(DevCycleUser $user_data): array
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
    public function allFeaturesAsyncWithHttpInfo(DevCycleUser $user_data): PromiseInterface
    {
        $returnType = 'array<string,\DevCycle\Model\Feature>';
        $request = $this->allFeaturesRequest($user_data);

        return $this->getThen($request, $returnType);
    }

    /**
     * Create request for operation 'allFeatures'
     *
     * @param DevCycleUser $user_data (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    public function allFeaturesRequest(DevCycleUser $user_data): Request
    {
        $resourcePath = '/v1/features';
        return $this->bucketingAPIRequest($user_data, $resourcePath);
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
     * @return object|ErrorResponse|ErrorResponse|ErrorResponse|ErrorResponse
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function variableValue(DevCycleUser $user_data, string $key, mixed $default)
    {
        return $this->variable($user_data, $key, $default)->getValue();
    }

    /**
     * Operation variable
     *
     * Get variable object by key for user data
     *
     * @param DevCycleUser $user_data user_data (required)
     * @param string $key Variable key (required)
     * @param mixed $default Default value if variable is not found (required)
     *
     * @return Variable|ErrorResponse
     * @throws InvalidArgumentException
     */
    public function variable(DevCycleUser $user_data, string $key, mixed $default): Variable|ErrorResponse
    {
        $this->validateUserData($user_data);

        try {
            list($response) = $this->variableWithHttpInfo($user_data, $key);
            return $this->reformatVariable($key, $response, $default);
        } catch (ApiException $e) {
            if ($e->getCode() != 404) {
                error_log("Failed to get variable value for key $key, $e");
            }
            return new Variable(array("key" => $key, "value" => $default, "isDefaulted" => true));
        }
    }


    private function reformatVariable(string $key, array $response, mixed $default): Variable
    {
        $isArrayWrapped = gettype($response["value"]) === "array" && (gettype($default) !== "array" && gettype($default) !== "object");
        $unwrappedValue = $isArrayWrapped ? $response["value"][0] : $response["value"];

        $isObjectDefault = gettype($default) === "object";
        $responseType = gettype($unwrappedValue);
        $defaultType = gettype($default);

        $doTypesMatch = $isArrayWrapped ? gettype($response["value"][0]) === $defaultType : $responseType == $defaultType || $isObjectDefault;

        if ($default === null) {
            $doTypesMatch = true;
        }

        if (!$doTypesMatch) {
            return new Variable(array("key" => $key, "value" => $default, "isDefaulted" => true));
        } else {
            return new Variable(array("key" => $key, "value" => $unwrappedValue, "isDefaulted" => false));
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
     * @throws ApiException on non-2xx response
     */
    public function variableWithHttpInfo(DevCycleUser $user_data, string $key): array
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
    public function variableAsync(DevCycleUser $user_data, string $key, mixed $default)
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
    public function variableAsyncWithHttpInfo(DevCycleUser $user_data, string $key)
    {
        $returnType = '\DevCycle\Model\Variable';
        $request = $this->variableRequest($user_data, $key);

        return $this->getThen($request, $returnType);
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
    public function variableRequest(DevCycleUser $user_data, string $key)
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
        return $this->makeAuthorizedRequest($headers, $headerParams, $queryParams, $resourcePath, $httpBody);
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
     * @throws ApiException on non-2xx response
     */
    public function allVariablesWithHttpInfo(DevCycleUser $user_data): array
    {
        $request = $this->allVariablesRequest($user_data);

        try {
            list($response, $statusCode) = $this->makeRequest($request);

            if ($statusCode == 200) {
                if ('array<string,\DevCycle\Model\Variable>' === '\SplFileObject') {
                    $content = $response->getBody(); //stream goes to serializer
                } else {
                    $content = (string)$response->getBody();
                }

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
    public function allVariablesAsync($user_data)
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
    public function allVariablesAsyncWithHttpInfo($user_data)
    {
        $returnType = 'array<string,\DevCycle\Model\Variable>';
        $request = $this->allVariablesRequest($user_data);

        return $this->getThen($request, $returnType);
    }

    /**
     * Create request for operation 'allVariables'
     *
     * @param DevCycleUser $user_data (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    public function allVariablesRequest($user_data)
    {
        // verify the required parameter 'user_data' is set
        if ($user_data === null || (is_array($user_data) && count($user_data) === 0)) {
            throw new InvalidArgumentException(
                'Missing the required parameter $user_data when calling allVariables'
            );
        }

        $resourcePath = '/v1/variables';
        $formParams = [];
        $queryParams = [];
        if ($this->dvcOptions->isEdgeDBEnabled()) {
            $queryParams = ['enableEdgeDB' => 'true'];
        }
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($user_data)) {
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($user_data));
            } else {
                $httpBody = $user_data;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = Query::build($formParams);
            }
        }

        // this endpoint requires API key authentication
        return $this->makeAuthorizedRequest($headers, $headerParams, $queryParams, $resourcePath, $httpBody);
    }

    /**
     * Operation postEvents
     *
     * Post events to DevCycle for user
     *
     * @param DevCycleUser $user_data user_data (required)
     * @param DevCycleEvent $event_data event_data (required)
     *
     * @return \DevCycle\Model\InlineResponse201|ErrorResponse|ErrorResponse|ErrorResponse|ErrorResponse
     * @throws InvalidArgumentException
     * @throws ApiException on non-2xx response
     */
    public function track(DevCycleUser $user_data, DevCycleEvent $event_data)
    {
        $this->validateUserData($user_data);
        $this->validateEventData($event_data);

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
                if ('\DevCycle\Model\InlineResponse201' === '\SplFileObject') {
                    $content = $response->getBody(); //stream goes to serializer
                } else {
                    $content = (string)$response->getBody();
                }

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
    public function trackAsync(DevCycleUser $user, $event): PromiseInterface
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
     * @param DevCycleUserAndEventsBody $user_data_and_events_body (required)
     *
     * @return PromiseInterface
     * @throws InvalidArgumentException
     */
    public function postEventsAsyncWithHttpInfo(DevCycleUserAndEventsBody $user_data_and_events_body): PromiseInterface
    {
        $returnType = '\DevCycle\Model\InlineResponse201';
        $request = $this->postEventsRequest($user_data_and_events_body);

        return $this->getThen($request, $returnType);
    }

    /**
     * Create request for operation 'postEvents'
     *
     * @param DevCycleUserAndEventsBody $user_data_and_events_body (required)
     *
     * @return Request
     * @throws InvalidArgumentException
     */
    public function postEventsRequest(DevCycleUserAndEventsBody $user_data_and_events_body): Request
    {
        $resourcePath = '/v1/track';

        return $this->bucketingAPIRequest($user_data_and_events_body, $resourcePath);
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
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }
        $options["curl"] = $this->config->getUDSPath() == "" ? [] : [
            CURLOPT_UNIX_SOCKET_PATH => $this->config->getUDSPath()
        ];

        return $options;
    }

    /**
     * @param Request $request
     * @param string $returnType
     * @return PromiseInterface
     */
    private function getThen(Request $request, string $returnType): PromiseInterface
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
    private function makeAuthorizedRequest(array $headers, array $headerParams, array $queryParams, string $resourcePath, DevCycleUserAndEventsBody|string $httpBody): Request
    {
        $apiKey = $this->config->getApiKeyWithPrefix('Authorization');
        if ($apiKey !== null) {
            $headers['Authorization'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = Query::build($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * @param Request $request
     * @return array
     * @throws ApiException
     * @throws \GuzzleHttp\Exception\GuzzleException
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
        } catch (ConnectException $e) {
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
                    (string)$request->getUri()
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
     * @return \GuzzleHttp\Psr7\Request
     */
    private function bucketingAPIRequest(DevCycleUser $user_data, string $resourcePath): Request
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
            $httpBody = json_encode(ObjectSerializer::sanitizeForSerialization($user_data));
        } else {
            $httpBody = $user_data;
        }


        // this endpoint requires API key authentication
        return $this->makeAuthorizedRequest($headers, $headerParams, $queryParams, $resourcePath, $httpBody);
    }
}
