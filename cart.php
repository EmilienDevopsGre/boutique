
<?php

require "arrayproducts.php";

require "my-functions.php";

$order=$_POST["quantity"];
var_dump($_POST);
?>

<table>
    <tr>
        <th>Produit</th>
        <th>Quantité</th>
        <th>Prix avant discount</th>
        <th>Prix après discount</th>
        <th>Total par produit</th>
    </tr>

    <?php
    $total = 0;
    foreach ($order as $key_name => $quantity) {
        var_dump($key_name);
        ?>
        <tr>
            <?php
            if (intval($quantity)===0 || in_array($key_name, $order))
            {
                continue;
                //echo "erreur";
                //header('Location: multidimensional-catalog.php');
            }elseif (intval($quantity)<0)
            {
                echo "erreur";
                continue;
            }else{
                echo "bravo";
            }
            //echo '<td>' . $key_name . '</td> <td>' . $quantity . '</td>';
            echo '<td>' . $products[$key_name]["name"] . '</td>';
            echo '<td>' . $quantity . '</td>';


            ;
            echo '<td>' . formatPrice($products[$key_name]["price"]) . '</td>';
            echo '<td>' . formatPrice(discountedPrice($products[$key_name]["price"],$products[$key_name]["discount"])) . '</td>';
            echo '<td>' . formatPrice(totalItem(discountedPrice($products[$key_name]["price"],$products[$key_name]["discount"]),$quantity)) . '</td>';
            $total += totalItem(discountedPrice($products[$key_name]["price"],$products[$key_name]["discount"]),$quantity);

            //var_dump($_POST[$quantity][$key_name]);
            //var_dump($_POST);
            //echo '<td>' . $key_name . '</td> <td>' . $quantity . '</td>';
            ?>
        </tr>
        <?php
    }
    var_dump($order);
    ?>
    <tfoot>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <th>Total HT</th>
        <td><?php echo formatPrice($total-(0.2*$total)) ?></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <th>TVA</th>
        <td><?php echo formatPrice(0.2*$total)?></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <th>Total TTC</th>
        <td><?php echo formatPrice($total)?></td>
    </tr>
    </tfoot>
</table>



