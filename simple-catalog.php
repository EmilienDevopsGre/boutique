<?php

$products = ["chaise", "oranges", "beezwrap"];
var_dump($products);
asort($products);
var_dump($products);
echo $products[0].", ".$products[2];