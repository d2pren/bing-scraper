<?php
namespace Mojopollo\BingScraper;

interface ImageInterface
{
    /**
     * Set debug mode on
     *
     * @param  bool  $value  true|false
     * @return $this
     */
    public function debug($value);

    /**
     * Will dump CURL's trace output to this file
     *
     * @param  string $value File path where the trace file should be dumped to
     * @return $this
     */
    public function traceFile($value);

    /**
     * Return a file open resource (append mode)
     *
     * @param  string $filePath Path to the file to be appended
     * @return resource           fopen()
     */
    public function openFile($filePath);

    /**
     * Makes a http request to URI path
     *
     * @see https://github.com/guzzle/guzzle Links to Guzzle docs
     * @param  string $method  GET/POST/etc
     * @param  string $uri     The url/uri of the site
     * @param  array  $options Array containing query/headers/etc
     * @return object          Returns guzzle response object
     */
    public function httpRequest($method, $uri, $options);

    /**
     * GET shortcut to request method
     *
     * @param  string $method  GET/POST/etc
     * @param  string $uri     The url/uri of the site
     * @param  array  $headers Array containing http request headers
     * @return object          Returns guzzle response object
     */
    public function httpGet($uri, $query = null, $headers = null);

    /**
     * Parses a http response
     *
     * @param  object $response Guzzle response object
     * @return array            Contains response body and meta data
     */
    public function httpResponse($response);
}
