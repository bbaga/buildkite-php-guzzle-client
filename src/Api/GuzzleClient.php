<?php
declare(strict_types=1);

namespace bbaga\BuildkiteApi\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;

final class GuzzleClient implements HttpClientInterface
{
    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client = null)
    {
        $this->client = $client ?? new Client();
    }

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        return $this->client->send($request);
    }

    /**
     * Create a new request.
     *
     * @param string $method The HTTP method associated with the request.
     * @param UriInterface|string $uri The URI associated with the request. If
     *     the value is a string, the factory MUST create a UriInterface
     *     instance based on it.
     *
     * @return RequestInterface
     */
    public function createRequest(string $method, $uri): RequestInterface
    {
        return new Request($method, $uri);
    }
}
