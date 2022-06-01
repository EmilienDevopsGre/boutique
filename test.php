<?php

require_once __DIR__ . '/Class/Item.php';
require_once __DIR__ . '/my-functions.php';

$test = new Item();
$test->reference = '12345';
$test->name = 'test';
$test->description = 'test';
$test->discount = 10;
$test->price = 10;
$test->weight = 10;
$test->imageUrl = 'https://m.media-amazon.com/images/I/71z3KFhLMqL._AC_SL1500_.jpg';
$test->stock = 10;
$test->isAvailable = true;

displayItem($test);

