<?php

declare(strict_types=1);

namespace Http\HttplugBundle\Collector;

/**
 * A Stack hold a collection of Profile to track the whole request execution.
 *
 * @author Fabien Bourigault <bourigaultfabien@gmail.com>
 *
 * @internal
 */
final class Stack
{
    /**
     * @var string
     */
    private $client;

    /**
     * @var Stack
     */
    private $parent;

    /**
     * @var Profile[]
     */
    private $profiles = [];

    /**
     * @var string
     */
    private $request;

    /**
     * @var string
     */
    private $response;

    /**
     * @var bool
     */
    private $failed = false;

    /**
     * @var string
     */
    private $requestTarget;

    /**
     * @var string
     */
    private $requestMethod;

    /**
     * @var string
     */
    private $requestHost;

    /**
     * @var string
     */
    private $requestScheme;

    /**
     * @var string
     */
    private $clientRequest;

    /**
     * @var string
     */
    private $clientResponse;

    /**
     * @var string
     */
    private $clientException;

    /**
     * @var int
     */
    private $responseCode;

    /**
     * @var int
     */
    private $duration = 0;

    /**
     * @var string
     */
    private $curlCommand;

    /**
     * @param string $client
     * @param string $request
     */
    public function __construct($client, $request)
    {
        $this->client = $client;
        $this->request = $request;
    }

    /**
     * @return string
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @return Stack
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param Stack $parent
     */
    public function setParent(self $parent)
    {
        $this->parent = $parent;
    }

    public function addProfile(Profile $profile)
    {
        $this->profiles[] = $profile;
    }

    /**
     * @return Profile[]
     */
    public function getProfiles()
    {
        return $this->profiles;
    }

    /**
     * @return string
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @return string
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param string $response
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }

    /**
     * @return bool
     */
    public function isFailed()
    {
        return $this->failed;
    }

    /**
     * @param bool $failed
     */
    public function setFailed($failed)
    {
        $this->failed = $failed;
    }

    /**
     * @return string
     */
    public function getRequestTarget()
    {
        return $this->requestTarget;
    }

    /**
     * @param string $requestTarget
     */
    public function setRequestTarget($requestTarget)
    {
        $this->requestTarget = $requestTarget;
    }

    /**
     * @return string
     */
    public function getRequestMethod()
    {
        return $this->requestMethod;
    }

    /**
     * @param string $requestMethod
     */
    public function setRequestMethod($requestMethod)
    {
        $this->requestMethod = $requestMethod;
    }

    /**
     * @return string
     */
    public function getClientRequest()
    {
        return $this->clientRequest;
    }

    /**
     * @param string $clientRequest
     */
    public function setClientRequest($clientRequest)
    {
        $this->clientRequest = $clientRequest;
    }

    /**
     * @return mixed
     */
    public function getClientResponse()
    {
        return $this->clientResponse;
    }

    /**
     * @param mixed $clientResponse
     */
    public function setClientResponse($clientResponse)
    {
        $this->clientResponse = $clientResponse;
    }

    /**
     * @return string
     */
    public function getClientException()
    {
        return $this->clientException;
    }

    /**
     * @param string $clientException
     */
    public function setClientException($clientException)
    {
        $this->clientException = $clientException;
    }

    /**
     * @return int
     */
    public function getResponseCode()
    {
        return $this->responseCode;
    }

    /**
     * @param int $responseCode
     */
    public function setResponseCode($responseCode)
    {
        $this->responseCode = $responseCode;
    }

    /**
     * @return string
     */
    public function getRequestHost()
    {
        return $this->requestHost;
    }

    /**
     * @param string $requestHost
     */
    public function setRequestHost($requestHost)
    {
        $this->requestHost = $requestHost;
    }

    /**
     * @return string
     */
    public function getRequestScheme()
    {
        return $this->requestScheme;
    }

    /**
     * @param string $requestScheme
     */
    public function setRequestScheme($requestScheme)
    {
        $this->requestScheme = $requestScheme;
    }

    /**
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return string
     */
    public function getCurlCommand()
    {
        return $this->curlCommand;
    }

    /**
     * @param string $curlCommand
     */
    public function setCurlCommand($curlCommand)
    {
        $this->curlCommand = $curlCommand;
    }

    /**
     * @return string
     */
    public function getClientSlug()
    {
        return preg_replace('/[^a-zA-Z0-9_-]/u', '_', $this->client);
    }
}
