<?php

    function getImage ($id) {
    return getImages()[$id];
}

function getImages() {
    return array(
        (object) array('url' => 'http://lorempixel.com/400/200/sports'),
        (object) array('url' => 'http://lorempixel.com/400/200/city'),
        (object) array('url' => 'http://lorempixel.com/400/200/nightlife'),
        (object) array('url' => 'http://lorempixel.com/400/200/nature'),
        (object) array('url' => 'http://lorempixel.com/400/200/cats'),
        (object) array('url' => 'http://lorempixel.com/400/200/abstract'),
        (object) array('url' => 'http://lorempixel.com/400/200/people'),
        (object) array('url' => 'http://lorempixel.com/400/200/technics'),
        (object) array('url' => 'http://lorempixel.com/400/200/transport'),
        (object) array('url' => 'http://lorempixel.com/400/200/food'),
        (object) array('url' => 'http://lorempixel.com/400/200/fashion'),
        (object) array('url' => 'http://lorempixel.com/400/200/business')

    );
}

function Comment () {
    return getComments();
}

function getComments() {
    return array(
        (object) array(),
        (object) array(),
        (object) array(),
        (object) array(),
        (object) array()

    );
}


    class Image{
        function Image(){
            $this->title = "Soccer Mom";
            $this->author = "TidyHouse69";
            $this->descript = "A soccer mom beating up a soccer dad.";
            $this->url = "http://lorempixel.com/400/200/sports";

        }
    }

    $imageInfo = new Image();


//Dynamic dates



$date1 = new DateTime();
$date1->setTimestamp(1468269180);

$date2 = new DateTime();
$date2->setTimestamp(1468185720);

$date3 = new DateTime();
$date3->setTimestamp(1468022100);

$date4 = new DateTime();
$date4->setTimestamp(1467805380);

$date5 = new DateTime();
$date5->setTimestamp(1467537600);

$date6 = new DateTime();
$date6->setTimestamp(1467637601);


