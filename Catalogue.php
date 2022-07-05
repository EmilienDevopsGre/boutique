<?php
include_once 'ItemClass.php';

class Catalogue
{
//    function fillCat(ItemClass $Item)
//    {
//        $products = array();
//        $products[] -> name = $Item->name;
//        return $products;
//
//    }

//public ArrayObject::public function __construct()
//{
//}
   public function __construct(ItemClass $Item)
    {
        $cat = new ArrayObject($Item);
        var_dump($cat);
        return $cat;
    }
}
