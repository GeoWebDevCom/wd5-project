<?php

    function getImage ($id) {
    return getImages()[$id];
}

function getImages() {
    return array(
        (object) array('url' => 'http://lorempixel.com/400/200/sports', 'title' => 'title 1', 'description' => 'This is photo #1', 'author' => 'author 1', "timestamp" => 1468269181),
        (object) array('url' => 'http://lorempixel.com/400/200/city', 'title' => 'title 2', 'description' => 'This is photo #2', 'author' => 'author 2', "timestamp" => 1468269182),
        (object) array('url' => 'http://lorempixel.com/400/200/nightlife', 'title' => 'title 3', 'description' => 'This is photo #3', 'author' => 'author 3', "timestamp" => 1468269183),
        (object) array('url' => 'http://lorempixel.com/400/200/nature', 'title' => 'title 4', 'description' => 'This is photo #4', 'author' => 'author 4', "timestamp" => 1468269184),
        (object) array('url' => 'http://lorempixel.com/400/200/cats', 'title' => 'title 5', 'description' => 'This is photo #5', 'author' => 'author 5', "timestamp" => 1468269185),
        (object) array('url' => 'http://lorempixel.com/400/200/abstract', 'title' => 'title 6', 'description' => 'This is photo #6', 'author' => 'author 6', "timestamp" => 1468269186),
        (object) array('url' => 'http://lorempixel.com/400/200/people', 'title' => 'title 7' , 'description' => 'This is photo #7', 'author' => 'author 7', "timestamp" => 1468269187),
        (object) array('url' => 'http://lorempixel.com/400/200/technics', 'title' => 'title 8', 'description' => 'This is photo #8', 'author' => 'author 8', "timestamp" => 1468269188),
        (object) array('url' => 'http://lorempixel.com/400/200/transport', 'title' => 'title 9', 'description' => 'This is photo #9', 'author' => 'author 9', "timestamp" => 1468269189),
        (object) array('url' => 'http://lorempixel.com/400/200/food', 'title' => 'title 10', 'description' => 'This is photo #10', 'author' => 'author 10', "timestamp" => 1468269178),
        (object) array('url' => 'http://lorempixel.com/400/200/fashion', 'title' => 'title 11', 'description' => 'This is photo #11', 'author' => 'author 11', "timestamp" => 1468269177),
        (object) array('url' => 'http://lorempixel.com/400/200/business', 'title' => 'title 12', 'description' => 'This is photo #12', 'author' => 'author 12', "timestamp" => 1468269179)

    );
}


function getComments() {
    return array(
        (object) array("author" => "LittleMermaid88", "text" => "Ahhhhhggg!", "timestamp" => 1468269180),
        (object) array("author" => "turdFerg44", "text" => "Dang it, son!", "timestamp" => 1468185720),
        (object) array("author" => "protienMan67", "text" => "Pump it up!", "timestamp" => 1468022100),
        (object) array("author" => "DandyWarhol77", "text" => "How bizaarr!", "timestamp" => 1467805380),
        (object) array("author" => "LittleMermaid88", "text" => "What a princess!", "timestamp" => 1467637601)

    );
}

function displayDate($timestamp){
    $imageDate = new DateTime();
    $imageDate->setTimestamp($timestamp);
    echo $imageDate->format('F d, Y h:ia');
}

