<?php

namespace App\ManagerBDD;

class ManagerBDD
{
    protected PDO $db;

    public function __construct()
    {
        try
        {
            $this->db = new PDO(
                'mysql:host=localhost;dbname=bdd_boutique_amazen;charset=utf8',
                'bobacar',
                'jenesaispas',
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function fetchAll(string $query): array
    {
        $request = $this->db->prepare($query);
        $request->execute();

        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetch(string $query): array
    {
        $request = $this->db->prepare($query);
        $request->execute();

        return $request->fetch(PDO::FETCH_ASSOC);
    }
}
