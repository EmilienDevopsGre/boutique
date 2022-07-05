<?php

declare(strict_types=1);

class GetProducts
{
    public function takeProductsFromDb(PDO $db) : array
    {
        $query = "SELECT * FROM products";
        $amazenStatement = $db->prepare($query);
        $amazenStatement->execute();
        $tabInterm = $amazenStatement->fetchAll(PDO::FETCH_ASSOC);
        $finalArray = [];
        foreach ($tabInterm as $item) {
            $finalArray[$item['id']] = $item;
        }
        return $finalArray;
    }
}