<?php

try
{
    $db = new PDO(
        'mysql:host=localhost;dbname=databaseName;charset=utf8',
        '',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
