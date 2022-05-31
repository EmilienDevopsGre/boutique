<?php

require_once __DIR__ . '\connection.php';
global $db;

function productsName(PDO $db): array
{
    $query = $db->prepare('SELECT name FROM products');
    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function listProducts(PDO $db): array
{
    $query = $db->prepare('SELECT name, price, weight, discount, picture_url FROM products');
    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
}


function lastTenOrders(PDO $db): array
{
    $query = $db->prepare('SELECT number FROM orders WHERE date > CURDATE() - 10');
    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function listOrders(PDO $db): array
{
    $query = $db->prepare('
    SELECT number, SUM(products.price * order_product.quantity)
    FROM order_product
        INNER JOIN
    products ON products.id = order_product.product_id
        INNER JOIN
    orders ON orders.id = order_product.order_id 
    GROUP BY number
    ');

    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function listCustomersOrders(PDO $db): array
{
    $query = $db->prepare('
    SELECT
    first_name,
    last_name,
    SUM(products.price * order_product.quantity) as totalperproduct
    FROM
    customers
        LEFT JOIN
    orders on orders.customer_id = customers.id
        LEFT JOIN
    order_product on orders.id = order_product.order_id
        LEFT JOIN
    products on order_product.product_id = products.id
    GROUP BY
    first_name,
    last_name
    ORDER BY
    last_name
    ');

    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function addQuantityProduct(PDO $db, int $addQuantityProduct, int $productNumber): void
{
    $query = '
    UPDATE products
    SET quantity = quantity + :number
    WHERE products.id = :productNumber;
    ';

    $action = $db->prepare($query);
    $action->bindValue(':number', $addQuantityProduct, PDO::PARAM_INT);
    $action->bindValue(':productNumber', $productNumber, PDO::PARAM_INT);
    $action->execute();
}

function deleteProduct(PDO $db, int $productNumber): void
{
    $query = '
    DELETE
    FROM products
    WHERE products.id = :productNumber;
    ';

    $action = $db->prepare($query);
    $action->bindValue(':productNumber', $productNumber, PDO::PARAM_INT);
    $action->execute();
}

/*
 * echo 'FONCTION NOM DES PRODUITS :';

//echo '<pre>';
//print_r(productsName($db));
//echo '</pre>';

echo '<table><tr><th>Products Name</th></tr>';
foreach (productsName($db) as $value)
{
    foreach ($value as $result)
    {
        echo '<tr><td>' . $result . '</td></tr>';
    }
}
echo '</table>';
*/
