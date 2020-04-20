<?php
declare(strict_types=1);

namespace BuildkiteApi\Tests\Integration\Api;

use BuildkiteApi\Api\GuzzleClient;
use PHPUnit\Framework\TestCase;

final class GuzzleClientTest extends TestCase
{
    public function test(): void {
        $client = new GuzzleClient();
        $request = $client->createRequest('GET', 'https://www.google.com');
        $response = $client->send($request);

        $this->assertEquals(200, $response->getStatusCode());
    }
}
