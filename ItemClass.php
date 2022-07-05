<?php

class ItemClass extends GetProductById
{
    public int $id;
    public string $name;
    public string $description;
    public float $price;
    public string $img_Url;
    public int $weight;
    public int $stock;
    public int $available;
    function takeOneProductFromDb (PDO $db, int $pId): ItemClass
    {
        $oneItem = new ItemClass();
        $product = $this->takeOneProductFromDb($pId);
        foreach ($product as $value)
        {
            $oneItem->id = $value;
            $oneItem->name = $value;
            $oneItem->description = $value;
            $oneItem->price = $value;
            $oneItem->img_Url = $value;
            $oneItem->weight = $value;
            $oneItem->stock = $value;
            $oneItem->available = $value;
        }
    }
}