<?php

//namespace App\Catalog;
//
//use App\ManagerBDD;

class Catalog extends ManagerBDD
{
    public ItemsCollection $itemsCollection;

    public function __construct(PDO $db)
    {

    }
}
