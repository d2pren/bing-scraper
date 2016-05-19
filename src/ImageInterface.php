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
