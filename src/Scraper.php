<?php
namespace Mojopollo\BingScraper;

use GuzzleHttp\Client as GuzzleClient;

/**
 * Mostly the communication with the guzzle client
 */
class Scraper implements ScraperInterface
{
    public function httpRequest($method, $uri, $options)
    {
        // Create guzzle client
        $client = new GuzzleClient();

        // If no user-agent was provided, do not send one
        // Guzzle sends something like this as the User-Agent:
        // GuzzleHttp/6.2.0 curl/7.43.0 PHP/7.0.6
        if (!isset($options['headers']['User-Agent'])) {
            $options['headers']['User-Agent'] = null;
        }

        // Send request and return results
        return $client->request($method, $uri, $options);
    }

    public function httpGet($uri, $query = null, $headers = null)
    {
        return $this->request('GET', $uri, [
            'query' => $query,
            'headers' => $headers,
        ]);
    }

    public function httpResponse($response)
    {
        return $response->getStatusCode();
    }
}
