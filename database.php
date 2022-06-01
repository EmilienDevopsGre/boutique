<?php

declare(strict_types=1);
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




function orderNumber(PDO $db):int
{
    $findNumberInA= "SELECT number from orders";

    $amazenStatement = $db->prepare($findNumberInA);
    $amazenStatement->execute();
    $result = $amazenStatement->fetchAll(PDO::FETCH_COLUMN);

    $randomOrderNumber = random_int(1, 10000);

    while (in_array($randomOrderNumber, $result)){
        $randomOrderNumber = random_int(1, 10000);
    }

    var_dump($randomOrderNumber);

    return $randomOrderNumber;

}

//requête pour insérer une commande dans la table orders

function newOrder(PDO $db, array $aIdsProQty, string $totalTTC): void
{

    $query = "INSERT INTO `orders` (`number`, `date`, `total`) VALUES(:number, NOW(), :pTotalTTC)";
    $amazenStatement = $db->prepare($query);
    $amazenStatement->bindValue(':pTotalTTC', $totalTTC);
    $amazenStatement->bindValue(':number', orderNumber($db));

    $amazenStatement->execute();
    $amazenStatement->debugDumpParams();
    $lastOrderId = $db->lastInsertId();
    foreach ($aIdsProQty as $kid => $Vquantity) {
        $query = "
INSERT INTO `order_product` (order_id, `product_id`, `quantity`) VALUES(?, ?, ?)";
        $amazenStatement = $db->prepare($query);

        $amazenStatement->execute([$lastOrderId, $kid, $Vquantity]);
        $amazenStatement->debugDumpParams();
    }
}


function displayProducts(PDO $db): array
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

displayProducts($db);


