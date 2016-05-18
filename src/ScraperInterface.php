<?php
namespace Mojopollo\BingScraper;

interface ScraperInterface
{
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
}
