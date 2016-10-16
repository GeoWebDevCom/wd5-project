<?php
$string = 'Yo';
$object = new stdClass();
$object->text = 'Yo';

$array = array('text' => 'Yo');

$boolean = true;

$integer = 12;

$float = 1.2;

var_dump (
    (string) $string,
    (string) $array,
    (string) $boolean,
    (string) $integer,
    (string) $float

);
?>