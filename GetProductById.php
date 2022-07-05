<?php

declare(strict_types=1);

class GetProductById
{
    public function takeOneProductFromDb(PDO $db, $id) : array
    {
        $query = "SELECT * FROM products WHERE id = :id";
        $query->bindValue(':id', $id);
        $amazenStatement = $db->prepare($query);
        $amazenStatement->execute();

        return $amazenStatement->fetchAll(PDO::FETCH_ASSOC);
    }
}