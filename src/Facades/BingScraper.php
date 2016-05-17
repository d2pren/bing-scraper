<?php
namespace Mojopollo\BingScraper\Facades;

use Illuminate\Support\Facades\Facade;

class BingScraper extends Facade
{

    /**
    * Get the registered name of the component.
    *
    * @return arr
    */
    protected static function getFacadeAccessor()
    {
        return 'bingscraper';
    }
}
