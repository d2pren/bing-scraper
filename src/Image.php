<?php
namespace Mojopollo\BingScraper;

class Image
{
    /**
    * Search filter options and their query parameter equivalents
    *
    * @var array
    */
    protected $filterOptions = [

        // Safe search
        'safe' => [
            'strict' => '&adlt=strict',
            'moderate' => '&adlt=demote',
            'off' => '&adlt=off',
        ],

        // Type
        'type' => [
            'photograph' => '&qft=+filterui:photo-photo',
            'clipart' => '&qft=+filterui:photo-clipart',
            'line-drawing' => '&qft=+filterui:photo-linedrawing',
            'animated-gif' => '&qft=+filterui:photo-animatedgif',
            'transparent' => '&qft=+filterui:photo-transparent',
            'shopping' => '&qft=+filterui:photo-shopping',
        ],

        // People
        'people' => [
            'faces' => '&qft=+filterui:face-face',
            'head-shoulders' => '&qft=+filterui:face-portrait',
        ],

        // Age
        'age' => [
            'past-day' => '&qft=+filterui:age-lt1440',
            'past-week' => '&qft=+filterui:age-lt10080',
            'past-month' => '&qft=+filterui:age-lt43200',
            'past-year' => '&qft=+filterui:age-lt525600',
        ],

        // Layout
        'layout' => [
            'square' => '&qft=+filterui:aspect-square',
            'wide' => '&qft=+filterui:aspect-wide',
            'tall' => '&qft=+filterui:aspect-tall',
        ],

        // Size
        'size' => [
            'small' => '&qft=+filterui:imagesize-small',
            'medium' => '&qft=+filterui:imagesize-medium',
            'large' => '&qft=+filterui:imagesize-large',
            'wallpaper' => '&qft=+filterui:imagesize-wallpaper',
        ],

        // License
        'license' => [
            'public-domain' => '&qft=+filterui:license-L1',
            'free-share-use' => '&qft=+filterui:license-L2_L3_L4_L5_L6_L7',
            'free-share-use-commercially' => '&qft=+filterui:license-L2_L3_L4',
            'free-share-use-modify' => '&qft=+filterui:license-L2_L3_L5_L6',
            'free-share-use-modify-commercially' => '&qft=+filterui:license-L2_L3',
        ],

        // Color
        'color' => [
            'color' => '&qft=+filterui:color2-color',
            'black-white' => '&qft=+filterui:color2',
            'red' => '&qft=+filterui:color2-FGcls_RED',
            'orange' => '&qft=+filterui:color2-FGcls_ORANGE',
            'yellow' => '&qft=+filterui:color2-FGcls_YELLOW',
            'green' => '&qft=+filterui:color2-FGcls_GREEN',
            'teal' => '&qft=+filterui:color2-FGcls_TEAL',
            'blue' => '&qft=+filterui:color2-FGcls_BLUE',
            'purple' => '&qft=+filterui:color2-FGcls_PURPLE',
            'pink' => '&qft=+filterui:color2-FGcls_PINK',
            'brown' => '&qft=+filterui:color2-FGcls_BROWN',
            'black' => '&qft=+filterui:color2-FGcls_BLACK',
            'gray' => '&qft=+filterui:color2-FGcls_GRAY',
            'white' => '&qft=+filterui:color2-FGcls_WHITE',
        ],
    ];
}
