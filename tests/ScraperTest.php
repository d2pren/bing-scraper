<?php
namespace Tests;

use Mojopollo\BingScraper\Scraper;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;

class ScraperTest extends \PHPUnit_Framework_TestCase
{
    /**
    * Scraper class object
    *
    * @var Scraper
    */
    protected $scraper;

    /**
    * MockHandler class object
    *
    * @var MockHandler
    */
    protected $mockImageHandler;

    /**
    * MockHandler class object
    *
    * @var MockHandler
    */
    protected $mockWebHandler;

    /**
    * This will run at the beginning of every test method
    */
    public function setUp()
    {
        // Parent setup
        parent::SetUp();

        // Set Scraper instance
        $this->scraper = new Scraper;

        // Create mock handlers
        $this->createMockHandlers();
    }

    /**
    * This will run at the end of every test method
    */
    public function tearDown()
    {
        // Parent teardown
        parent::tearDown();

        // Unset Scraper instance
        $this->scraper = null;
    }

    /**
     * Creates and sets a mock handler for tests
     * @return void
     */
    public function createMockHandlers()
    {
        // Create a mock response from bing images
        $body = file_get_contents('./tests/samples/image-results-sloth-smiling.html');
        $mock = new MockHandler([
            new Response(200, [
                'Cache-Control' => 'no-cache, no-store, must-revalidate',
                'Pragma' => 'no-cache',
                'Content-Length' => strlen($body),
                'Content-Type' => 'text/html; charset=utf-8',
                'Expires' => '-1',
                'Vary' => 'Accept-Encoding',
                'Server' => 'Microsoft-IIS/8.5',
                'P3P' => 'CP="NON UNI COM NAV STA LOC CURa DEVa PSAa PSDa OUR IND"',
                'Set-Cookie' => 'SRCHD=AF=NOFORM; domain=.bing.com; expires=Thu, 24-May-2018 22:38:01 GMT; path=/',
                'Set-Cookie' => 'SRCHUID=V=2&GUID=25BFFF139EEB43ACB51D97F5FE417394;'
                    . ' expires=Thu, 24-May-2018 22:38:01 GMT; path=/',
                'Set-Cookie' => 'SRCHUSR=DOB=20160524; domain=.bing.com; expires=Thu, 24-May-2018 22:38:01 GMT; path=/',
                'Set-Cookie' => '_SS=SID=39FB709809126CDA3221798708AF6DB3; domain=.bing.com; path=/',
                'X-MSEdge-Ref' => 'Ref A: 11255786FA1448E696EED7B409F011A9'
                    . ' Ref B: F22E7D577CC3C9680B467201976260F6'
                    . ' Ref C: Tue May 24 15:38:02 2016 PST',
                'Set-Cookie' => '_EDGE_S=F=1&SID=39FB709809126CDA3221798708AF6DB3; path=/; httponly; domain=bing.com',
                'Set-Cookie' => '_EDGE_V=1; path=/; httponly; expires=Thu, 24-May-2018 22:38:02 GMT; domain=bing.com',
                'Set-Cookie' => 'MUID=2F27874E3FE86FC72BDE8E513E556EAB;'
                    . ' path=/; expires=Thu, 24-May-2018 22:38:02 GMT; domain=bing.com',
                'Set-Cookie' => 'MUIDB=2F27874E3FE86FC72BDE8E513E556EAB;'
                    . ' path=/; httponly; expires=Thu, 24-May-2018 22:38:02 GMT',
                'Date' => 'Tue, 24 May 2016 22:38:02 GMT',
            ], $body),
        ]);

        // Set mock image handler
        $this->mockImageHandler = HandlerStack::create($mock);
    }

    /**
    * Test httpRequest()
    *
    * @return void
    */
    public function testHttpRequest()
    {
        // Set mock handler
        $this->scraper->handler = $this->mockImageHandler;

        // Send request
        $response = $this->scraper->httpRequest('GET', '/', []);

        // Test that we got back a GuzzleHttp\Psr7\Response back
        $this->assertTrue(
            $response instanceof Response,
            'httpRequest() return is not an instance of GuzzleHttp\Psr7\Response'
        );

        // Check that we received body contents back
        $this->assertFalse(
            empty($response->getBody()->getContents()),
            '$response->getBody()->getContents() was empty'
        );

        // Send back response
        return $response;
    }

    /**
    * Test httpRequest() with trace file optoin
    *
    * @return void
    */
    public function testHttpRequestTraceFileOption()
    {
        // Set mock handler
        $this->scraper->handler = $this->mockImageHandler;

        // Set trace file
        $traceFile = './trace-file.txt';

        // Send request
        $response = $this->scraper->traceFile($traceFile)->httpRequest('GET', '/', []);

        // Check for trace file creation
        $traceFileExists = file_exists($traceFile);
        $this->assertTrue(
            $traceFileExists,
            "{$traceFile} was not created"
        );

        // Remove trace file created
        if ($traceFileExists) {
            unlink($traceFile);
        }
    }

    /**
    * Test httpResponse() with response results
    *
    * @depends testHttpRequest
    * @return void
    */
    public function testHttpResponse($response)
    {
        // Rewind stream (since ->getContents() was called in previous test)
        // so we can get the contents below
        $stream = $response->getBody();
        $stream->rewind();

        // Parse response
        $result = $this->scraper->httpResponse($response);

        fwrite(STDERR, print_r($result, true));

        // Execute method
        // $response = $this->scraper->traceFile('./trace-file.txt')->httpRequest('GET', 'http://www.qujo.com', []);
        // $result = $this->scraper->debug(true)->httpResponse($response);
        // fwrite(STDERR, print_r($result, true));

        // Check result
        // $this->assertEquals($result, $expectedArray);
    }
}
