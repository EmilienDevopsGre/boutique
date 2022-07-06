<?php
include_once 'connect.php';
include_once 'GetProductById.php';


class ItemClass extends GetProductById
{
    public int $id;
    public string $name;
    public string $description;
    public float $price;
    public string $img_url;
    public int $weight;
    public int $quantity;
    public int $available;
    public int $discount;

    function takeOneProductFromDb(PDO $db, int $id): ItemClass
    {
        //var_dump($oneItem);
        $product = $this->getOneProductFromDb($db, $id);
        var_dump($product);
        $this->id = $product[0]['id'];
        $this->name = $product[0]['name'];
        $this->description = $product[0]['description'];
        $this->price = $product[0]['price'];
        $this->img_url = $product[0]['img_url'];
        $this->weight = $product[0]['weight'];
        $this->quantity = $product[0]['quantity'];
        $this->available = $product[0]['available'];
        $this->discount = $product[0]['discount'];
        return $this;
    }
}
/*
    public int $discount;
    public int $id;
    public PDO $db;

    public function __construct(PDO $db, int $id)
    {
        $query = "SELECT * FROM products where id=$id";
        $amazenStatement = $db->prepare($query);
        $amazenStatement->execute();
        $tabInterm = $amazenStatement->fetchAll(PDO::FETCH_ASSOC);
        var_dump($tabInterm);
        die();
        $this->name = $tabInterm[0]['name'];
        $this->description = $tabInterm[0]['description'];
        $this->price = $tabInterm[0]['price'];
        $this->img_url = $tabInterm[0]['img_url'];
        $this->weight = $tabInterm[0]['weight'];
        $this->quantity = $tabInterm[0]['quantity'];
        $this->available = $tabInterm[0]['available'];
        $this->discount = $tabInterm[0]['discount'];

    }

    public function getOneProduct(PDO $db, int $id):ItemClass
    {
        $query = "SELECT * FROM products where id=$id";
        $amazenStatement = $db->prepare($query);
        $amazenStatement->execute();
        $tabInterm = $amazenStatement->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($tabInterm);
        $this->name = $tabInterm['name'];
        $this->description = $tabInterm['description'];
        $this->price = $tabInterm['price'];
        $this->url_image = $tabInterm['url_image'];
        $this->weight = $tabInterm['weight'];
        $this->quantity = $tabInterm['quantity'];
        $this->available = $tabInterm['available'];

        return $this;
    }
}

*/