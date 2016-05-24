<?php
namespace Mojopollo\BingScraper;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;

/**
 * Mostly the communication with the guzzle client
 */
class Scraper implements ScraperInterface
{
    /**
     * Debug switch
     *
     * @var bool
     */
    public $debug = false;

    /**
     * Trace file path
     *
     * Will dump CURL's trace output to this file
     *
     * @var string
     */
    public $traceFile;

    /**
     * Results of the scrape
     *
     * @var array
     */
    public $results;

    /**
     * For mocks, to be set in unit tests
     *
     * @var HandlerStack
     */
    public $handler;

    public function debug($value)
    {
        // Set debug value
        $this->debug = (bool) $value;

        // Return instance
        return $this;
    }

    public function traceFile($value)
    {
        // Set debug value
        $this->traceFile = $value;

        // Return instance
        return $this;
    }

    public function openFile($filePath)
    {
        return fopen($filePath, 'a');
    }

    public function httpRequest($method, $uri, $options)
    {
        // Guzzle client options
        $clientOptions = [];

        // Set debug settings
        if (isset($this->traceFile)) {
            $clientOptions['debug'] = $this->openFile($this->traceFile);
        }

        // Set handler
        if ($this->handler instanceof HandlerStack) {
            $clientOptions['handler'] = $this->handler;
        }

        // Create guzzle client
        $client = new Client($clientOptions);

        // If no user-agent was provided, do not send one
        // Guzzle sends something like this as the User-Agent header:
        // GuzzleHttp/6.2.0 curl/7.43.0 PHP/7.0.6
        if (!isset($options['headers']['User-Agent'])) {
            $options['headers']['User-Agent'] = null;
        }

        // Send request and return results
        return $client->request($method, $uri, $options);
    }

    public function httpResponse($response)
    {
        // Create results array
        $this->results = [
            'meta' => [
                'statusCode' => $response->getStatusCode(),
                'contentType' =>
                    isset($response->getHeader('Content-Type')[0])
                    ? $response->getHeader('Content-Type')[0]
                    : $response->getHeader('Content-Type'),
                'cookies' => $response->getHeader('Set-Cookie'),
                'error' => null,
                'count' => 0,
            ],
            'results' => [
            ],
        ];

        // Set debug info if debug is on
        if ($this->debug) {
            $this->results['meta']['debug'] = [
                'headers' => $response->getHeaders(),
                'body' => $response->getBody()->getContents(),
            ];
        }

        // Return results array
        return $this->results;
    }
}
