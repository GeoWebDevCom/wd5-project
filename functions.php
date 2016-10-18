<?php

    function getImage ($id) {
    return getImages()[$id];
}

function getImages() {
    return array(
        (object) array('url' => 'http://lorempixel.com/400/200/sports', 'title' => 'title 1'),
        (object) array('url' => 'http://lorempixel.com/400/200/city', 'title' => 'title 2'),
        (object) array('url' => 'http://lorempixel.com/400/200/nightlife', 'title' => 'title 3'),
        (object) array('url' => 'http://lorempixel.com/400/200/nature', 'title' => 'title 4'),
        (object) array('url' => 'http://lorempixel.com/400/200/cats', 'title' => 'title 5'),
        (object) array('url' => 'http://lorempixel.com/400/200/abstract', 'title' => 'title 6'),
        (object) array('url' => 'http://lorempixel.com/400/200/people', 'title' => 'title 7'),
        (object) array('url' => 'http://lorempixel.com/400/200/technics', 'title' => 'title 8'),
        (object) array('url' => 'http://lorempixel.com/400/200/transport', 'title' => 'title 9'),
        (object) array('url' => 'http://lorempixel.com/400/200/food', 'title' => 'title 10'),
        (object) array('url' => 'http://lorempixel.com/400/200/fashion', 'title' => 'title 11'),
        (object) array('url' => 'http://lorempixel.com/400/200/business', 'title' => 'title 12')

    );
}

class Image{
    function Image(){
        $this->title = "Soccer Mom";
        $this->author = "TidyHouse69";
        $this->descript = "A soccer mom beating up a soccer dad.";
        $this->url = "http://lorempixel.com/400/200/sports";
        $this->timestamp = 1467456240;

    }
}

$imageInfo = new Image();


function getComments() {
    return array(
        (object) array("author" => "LittleMermaid88", "comment" => "Ahhhhhggg!", "timestamp" => 1468269180),
        (object) array("author" => "turdFerg44", "comment" => "Dang it, son!", "timestamp" => 1468185720),
        (object) array("author" => "protienMan67", "comment" => "Pump it up!", "timestamp" => 1468022100),
        (object) array("author" => "DandyWarhol77", "comment" => "How bizaarr!", "timestamp" => 1467805380),
        (object) array("author" => "LittleMermaid88", "comment" => "What a princess!", "timestamp" => 1467637601)

    );
}



