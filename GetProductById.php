<?php

declare(strict_types=1);

class GetProductById
{
    public function getOneProductFromDb(PDO $db, int $id) : array
    {
        $query = "SELECT * FROM products WHERE id = :id";
        $amazenStatement = $db->prepare($query);
        $amazenStatement->bindValue(':id', $id);
        $amazenStatement->execute();

        return $amazenStatement->fetchAll(PDO::FETCH_ASSOC);
    }
}