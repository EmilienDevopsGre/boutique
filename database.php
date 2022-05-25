<?php declare(strict_types=1);
require_once 'connect.php';
global $db;

//query 3

function desTodayOrders(PDO $db): array
{
    $query = 'SELECT * FROM orders WHERE date = current_date ORDER BY number DESC';
    $amazenStatement = $db->prepare($query);
    $amazenStatement->execute();


    return $amazenStatement->fetchAll(PDO::FETCH_ASSOC);
}
//echo '<pre>';
//print_r(desTodayOrders($db));
//echo '</pre>';



//query 4

function lastTenDaysOrders(PDO $db): array
{
    $query = 'SELECT * FROM orders WHERE date > CURDATE() - 10';
    $amazenStatement = $db->prepare($query);
    $amazenStatement->execute();


    return $amazenStatement->fetchAll(PDO::FETCH_ASSOC);
}
//echo '<pre>';
//print_r(lastTenDaysOrders($db));
//echo '</pre>';


//query 8

function charlizeOrders(PDO $db): array
{
    $query = "SELECT number, total FROM customers INNER JOIN orders ON orders.customer_id = customers.id WHERE first_name = 'Charlize'";
    $amazenStatement = $db->prepare($query);
    $amazenStatement->execute();


    return $amazenStatement->fetchAll(PDO::FETCH_ASSOC);
}
//echo '<pre>';
//print_r(charlizeOrders($db));
//echo '</pre>';


//query 11

function sumOrdersByCustomer(PDO $db): array
{
    $query = "SELECT first_name, last_name, SUM(total) FROM customers LEFT JOIN orders ON orders.customer_id = customers.id GROUP BY first_name, last_name";
    $amazenStatement = $db->prepare($query);
    $amazenStatement->execute();


    return $amazenStatement->fetchAll(PDO::FETCH_ASSOC);
}
//echo '<pre>';
//print_r(sumOrdersByCustomer($db));
//echo '</pre>';

// requête hausse prix

function increasePrice(PDO $db): void
{
    $query = "UPDATE products SET price = price * 1.05 WHERE categories_id = 2";
    $amazenStatement = $db->prepare($query);
    $amazenStatement->execute();
}


//increasePrice($db);

// requête catégories avec au moins un article dispo en vente

function deleteCustWithoutOrder(PDO $db): void
{
    $query = "DELETE customers FROM customers LEFT JOIN orders on customers.id = orders.customer_id WHERE number IS NULL;";
    $amazenStatement = $db->prepare($query);
    $amazenStatement->execute();
}


//requête pour insérer une commande dans la table orders

function newOrder(PDO $db, int $pShipping , int $pDiscount , float $pTotalTTC, int $pProductID, int $pQuantity): void
{
    $query = "//boucle
INSERT INTO `orders` (`number`, `date`, `total`) VALUES(LAST_INSERT_ID(), current_date, :pTotalTTC);
INSERT INTO `order_product` (LAST_INSERT_ID(), `product_id`, `quantity`) VALUES(LAST_INSERT_ID(), :pProductID, :pQuantity)";
    $amazenStatement = $db->prepare($query);
    $amazenStatement->bindValue(':pShipping', $pShipping);
    $amazenStatement->bindValue(':pDiscount', $pDiscount);
    $amazenStatement->bindValue(':pTotalTTC', $pTotalTTC);
    $amazenStatement->bindValue(':pProductID', $pProductID);
    $amazenStatement->bindValue(':pQuantity', $pQuantity);


    $amazenStatement->execute();
}


function displayProducts(PDO $db): array
{
    $query = "SELECT * FROM bdd_boutique_amazen.products";
    $amazenStatement = $db->prepare($query);
    $amazenStatement->execute();
    $tabInterm = $amazenStatement->fetchAll(PDO::FETCH_ASSOC);
    $finalArray = [];
    foreach ($tabInterm as $item) {
        $finalArray[$item['id']] = $item;
    }

    // var_dump($finalArray);
    return $finalArray;
}

displayProducts($db);