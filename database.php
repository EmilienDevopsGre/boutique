<?php declare(strict_types=1);
require_once 'connect.php';
global $db;

//query 3

function desTodayOrders($db): array
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

function lastTenDaysOrders($db): array
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

function charlizeOrders($db): array
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

function sumOrdersByCustomer($db): array
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

function increasePrice($db): void
{
    $query = "UPDATE products SET price = price * 1.05 WHERE categories_id = 2";
    $amazenStatement = $db->prepare($query);
    $amazenStatement->execute();
}


//increasePrice($db);

// requête catégories avec au moins un article dispo en vente

function deleteCustWithoutOrder($db): void
{
    $query = "DELETE customers FROM customers LEFT JOIN orders on customers.id = orders.customer_id WHERE number IS NULL;";
    $amazenStatement = $db->prepare($query);
    $amazenStatement->execute();
}

//deleteCustWithoutOrder($db);


function displayProducts($db): array
{
    $query = "SELECT * FROM bdd_boutique_amazen.products";
    $amazenStatement = $db->prepare($query);
    $amazenStatement->execute();
    $tabInterm = $amazenStatement->fetchAll(PDO::FETCH_ASSOC);
    $finalArray = [];
    foreach ($tabInterm as $item) {
        $finalArray[$item['name']] = $item;
    }

    //var_dump($finalArray);
    return $finalArray;
}

displayProducts($db);