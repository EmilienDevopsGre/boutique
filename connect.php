<?php

try
{
    $db = new PDO(
        'mysql:host=localhost;dbname=bdd_boutique_amazen;charset=utf8',
        'emilienm',
        ']a]D3S!yyi7NelBf',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
 /*
$amazenStatement = $db->prepare('SELECT * FROM categories ');
$amazenStatement->execute();
$categories = $amazenStatement->fetchAll();
echo '<pre>';
print_r($categories);
echo '</pre>';
*/
