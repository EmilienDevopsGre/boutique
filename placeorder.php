<?php

session_start();

require "header.php";
require "connect.php";

global $db;



if (!isset($_POST["validate"])) {
    echo "Votre commande n'est pas valide.";
    //$_POST['quantity']=0;
} else {
    //TODO ajouter les nouveaux produits aux anciens dans le panier
    $_SESSION['validate'] = $_POST['validate'];
    $_SESSION['totalTTC'] = $_POST['totalTTC'];

    $aIdsProQty = [];
    foreach ($_SESSION['quantity'] as $idProduct => $qty){
        $aIdsProQty [$idProduct] = $qty;
    }
    $rawTotalTTC = intval(str_replace(['€', ',', ' '],'',$_SESSION['totalTTC']));

    newOrder($db, $aIdsProQty, $rawTotalTTC);

    //session_unset();
    echo '<pre>';
    //var_dump($_SESSION);
    echo '</pre>';





/*
    $cart = getCartFromSession();
    // 3/ ajout de la commande à la BDD
    $id_command = insertPDO($mysqlClient, "INSERT INTO orders(`id`,`number`, `date`, `total`) VALUES (NULL, ".time().", NOW(), ".$TTC.")");
    var_dump($id_command);
//    $cart = GetIdFromOrders();

    foreach ($cart as $cartItem){
//        var_dump($cartItem);
        preparePDO($mysqlClient, "INSERT INTO order_product(`id`,`quantity`,`orders_id`,`products_id`) VALUES (NULL, ".$cartItem['quantity'].", ".$id_command." , ".$cartItem['product']['ID'].")");
    }

*/
?>


        <div>
            <h1>Votre commande est validée</h1>
            <p>Vous allez recevoir les détails par email</p>
        </div>


        <?php
}

    /*
    function placeOrder($mysqlConnection, $total){
        $sqlQuery = "INSERT INTO orders(date,total,customer_id)
    VALUES (curdate(), '$total', 2);";
        $mysqlConnection -> prepare($sqlQuery) -> execute();

    */

    require "footer.php";
    ?>