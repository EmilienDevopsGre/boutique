<?php

try
{
    $db = new PDO(
        'mysql:host=localhost;dbname=amazen;charset=utf8',
        'bobacar',
        'jenesaispas!',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
