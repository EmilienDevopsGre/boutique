<?php

class ItemClass
{
    public string $name;
    public string $description;
    public float $price;
    public string $img_Url;
    public int $weight;
    public int $stock;
    public int $available;
    public int $id;
    function getProductsFromDb (int $id): ItemClass
    {
        //foreach ($products as $product)
        var_dump($products);
    }
}