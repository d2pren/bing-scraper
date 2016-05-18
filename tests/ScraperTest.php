<?php
namespace Tests;

use Mojopollo\BingScraper\Scraper;

class ScraperTest extends \PHPUnit_Framework_TestCase
{
    /**
    * Scraper class object
    *
    * @var Scraper
    */
    protected $scraper;

    /**
    * This will run at the beginning of every test method
    */
    public function setUp()
    {
        // Parent setup
        parent::SetUp();

        // Set Arr class
        $this->scraper = new Scraper;
    }

    /**
    * This will run at the end of every test method
    */
    public function tearDown()
    {
        // Parent teardown
        parent::tearDown();

        // Unset Arr class
        $this->scraper = null;
    }
    /**
    * Test sortByPriority() with loose natch
    *
    * @return void
    */
    public function testRequest()
    {
        // Execute method
        $result = $this->scraper->httpRequest('GET', 'http://www.qujo.com', []);
        // fwrite(STDERR, print_r($result, true));

        // Check result
        // $this->assertEquals($result, $expectedArray);
    }
}
