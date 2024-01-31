<?php
/**
 * DevCycleConfiguration
 * PHP version 7.3
 *
 * @category Class
 * @package  DevCycle
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */


namespace DevCycle;

/**
 * DevCycleConfiguration Class Doc Comment
 * PHP version 7.3
 *
 * @category Class
 * @package  DevCycle
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class DevCycleConfiguration
{
    /**
     * @var DevCycleConfiguration
     */
    private static DevCycleConfiguration $defaultConfiguration;

    /**
     * Associate array to store API key(s)
     *
     * @var string[]
     */
    protected array $apiKeys = [];

    /**
     * Associate array to store API prefix (e.g. Bearer)
     *
     * @var string[]
     */
    protected array $apiKeyPrefixes = [];


    /**
     * The host
     *
     * @var string
     */
    protected string $host = 'https://bucketing-api.devcycle.com';


    /**
     * @var string path to a Unix Domain socket. Only used if host is set to 'http:'.
     */
    protected string $udsPath = "";

    /**
     * User agent of the HTTP request, set to "OpenAPI-Generator/{version}/PHP" by default
     *
     * @var string
     */
    protected string $userAgent = 'DevCycle PHP ';

    /**
     * Debug switch (default set to false)
     *
     * @var bool
     */
    protected bool $debug = false;

    /**
     * Debug file location (log to STDOUT by default)
     *
     * @var string
     */
    protected string $debugFile = 'php://output';


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->userAgent .= trim(file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'VERSION.txt')) . '/' . PHP_VERSION;
    }

    /**
     * Sets API key
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     * @param string $key API key or token
     *
     * @return $this
     */
    public function setApiKey(string $apiKeyIdentifier, string $key): self
    {
        $this->apiKeys[$apiKeyIdentifier] = $key;
        return $this;
    }

    /**
     * Gets API key
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     *
     * @return null|string API key or token
     */
    public function getApiKey(string $apiKeyIdentifier): ?string
    {
        return $this->apiKeys[$apiKeyIdentifier] ?? null;
    }

    /**
     * Sets the prefix for API key (e.g. Bearer)
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     * @param string $prefix API key prefix, e.g. Bearer
     *
     * @return $this
     */
    public function setApiKeyPrefix(string $apiKeyIdentifier, string $prefix): self
    {
        $this->apiKeyPrefixes[$apiKeyIdentifier] = $prefix;
        return $this;
    }

    /**
     * Gets API key prefix
     *
     * @param string $apiKeyIdentifier API key identifier (authentication scheme)
     *
     * @return null|string
     */
    public function getApiKeyPrefix(string $apiKeyIdentifier): ?string
    {
        return $this->apiKeyPrefixes[$apiKeyIdentifier] ?? null;
    }

    /**
     * Sets the host
     *
     * @param string $host Host
     *
     * @return $this
     */
    public function setHost(string $host): self
    {
        $this->host = $host;
        return $this;
    }

    /**
     * Gets the host
     *
     * @return string Host
     */
    public function getHost(): string
    {
        return $this->host;
    }


    public function getUDSPath(): string
    {
        return $this->udsPath;
    }

    public function setUDSPath(string $udsPath): self
    {
        $this->udsPath = $udsPath;
        return $this;
    }

    /**
     * Sets the user agent of the api client
     *
     * @param string $userAgent the user agent of the api client
     *
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function setUserAgent(string $userAgent): self
    {
        $this->userAgent = $userAgent;
        return $this;
    }

    /**
     * Gets the user agent of the api client
     *
     * @return string user agent
     */
    public function getUserAgent(): string
    {
        return $this->userAgent;
    }

    /**
     * Sets debug flag
     *
     * @param bool $debug Debug flag
     *
     * @return $this
     */
    public function setDebug(bool $debug): static
    {
        $this->debug = $debug;
        return $this;
    }

    /**
     * Gets the debug flag
     *
     * @return bool
     */
    public function getDebug(): bool
    {
        return $this->debug;
    }

    /**
     * Sets the debug file
     *
     * @param string $debugFile Debug file
     *
     * @return $this
     */
    public function setDebugFile(string $debugFile): static
    {
        $this->debugFile = $debugFile;
        return $this;
    }

    /**
     * Gets the debug file
     *
     * @return string
     */
    public function getDebugFile(): string
    {
        return $this->debugFile;
    }

    /**
     * Gets the default configuration instance
     *
     * @return DevCycleConfiguration
     */
    public static function getDefaultConfiguration(): DevCycleConfiguration
    {
        if (self::$defaultConfiguration === null) {
            self::$defaultConfiguration = new DevCycleConfiguration();
        }

        return self::$defaultConfiguration;
    }

    /**
     * Sets the default configuration instance
     *
     * @param DevCycleConfiguration $config An instance of the DevCycleConfiguration Object
     *
     * @return void
     */
    public static function setDefaultConfiguration(DevCycleConfiguration $config): void
    {
        self::$defaultConfiguration = $config;
    }

    /**
     * Gets the essential information for debugging
     *
     * @return string The report for debugging
     */
    public static function toDebugReport(): string
    {
        $report = 'PHP SDK (DevCycle) Debug Report:' . PHP_EOL;
        $report .= '    OS: ' . php_uname() . PHP_EOL;
        $report .= '    PHP Version: ' . PHP_VERSION . PHP_EOL;
        $report .= '    SDK Version' . trim(file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'VERSION.txt'));

        return $report;
    }

    /**
     * Get API key (with prefix if set)
     *
     * @param string $apiKeyIdentifier name of apikey
     *
     * @return null|string API key with the prefix
     */
    public function getApiKeyWithPrefix(string $apiKeyIdentifier): ?string
    {
        $prefix = $this->getApiKeyPrefix($apiKeyIdentifier);
        $apiKey = $this->getApiKey($apiKeyIdentifier);

        if ($apiKey === null) {
            return null;
        }

        if ($prefix === null) {
            $keyWithPrefix = $apiKey;
        } else {
            $keyWithPrefix = $prefix . ' ' . $apiKey;
        }

        return $keyWithPrefix;
    }
}
