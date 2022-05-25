<?php
require "header.php";
var_dump($_POST);
//var_dump($_SESSION);
if (!isset($_POST["validate"])) {
    echo "Votre commande n'est pas valide.";
    //$_POST['quantity']=0;
} else {
    newOrder(PDO $db);
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