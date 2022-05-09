<?php

$order=$_POST["quantity"];
var_dump($_POST);
?>

<table>
    <tr>
        <th>Produit</th>
        <th>Quantité</th>
        <th>Prix avant discount</th>
        <th>Prix après discount</th>
    </tr>
        <?php
foreach ($order as $key_name => $quantity) {
    var_dump($order);
    ?>
    <tr>
    <?php
    echo '<td>' . $key_name . '</td> <td>' . $quantity . '</td>';
    echo '<td>' . $key_name . '</td> <td>' . $quantity . '</td>';
    ?>
    </tr>
    <?php
}
?>
</table>