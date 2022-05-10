<?php
require "header.php";
require "arrayproducts.php";

require "my-functions.php";

$name = $quantity = "";

//if ($_SERVER["REQUEST_METHOD"] == "POST") {
//    $name = test_input($_POST["name"]);
//    $quantity = test_input($_POST["quantity"]);
//    var_dump($_POST["quantity"]);
//}


$order = $_POST["quantity"];
//var_dump($quantity);
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
    $totalWeight = 0;
    foreach ($order as $key_name => $orderQuantity) {
     //var_dump($order);
        ?>
        <tr>
            <?php
            if (intval($orderQuantity) === 0 || in_array($key_name, $order)) {
                if (in_array($key_name, $order)) {
                    echo "test inarray";
                }
                continue;
                //echo "erreur";
                //header('Location: multidimensional-catalog.php');
            } elseif (intval($orderQuantity) < 0) {
                echo '<div class="alert alert-danger" role="alert">Vous n\'avez pas commandé une quantité valide</div>';
                continue;
            }
            //echo '<td>' . $key_name . '</td> <td>' . $quantity . '</td>';
            echo '<td>' . $products[$key_name]["name"] . '</td>';
            echo '<td>' . $orderQuantity . '</td>';;
            echo '<td>' . formatPrice($products[$key_name]["price"]) . '</td>';
            echo '<td>' . formatPrice(discountedPrice($products[$key_name]["price"], $products[$key_name]["discount"])) . '</td>';
            echo '<td>' . formatPrice(totalItem(discountedPrice($products[$key_name]["price"], $products[$key_name]["discount"]), $orderQuantity)) . '</td>';
            $total += totalItem(discountedPrice($products[$key_name]["price"], $products[$key_name]["discount"]), $orderQuantity);
            $totalWeight += weigthtItems($products[$key_name]["weight"],$orderQuantity);
            //var_dump($_POST[$quantity][$key_name]);
            //var_dump($_POST);
            //echo '<td>' . $key_name . '</td> <td>' . $quantity . '</td>';
            ?>
        </tr>
        <?php
    }
    ?>
    <tfoot>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <th>Total HT</th>
        <td><?php echo formatPrice($total - (0.2 * $total)) ?></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <th>TVA</th>
        <td><?php echo formatPrice(0.2 * $total) ?></td>
    </tr>
    <tr>
        <th><label for="Transporteur">Transporteur</label></th>
        <td><select name="entreprise" id="entreprise_select">
                <option value="Laposte">Laposte</option>
                <option value="Chronopost">Chronopost</option>
            </select> </td>
        <td>Poids cumulé : <?php echo $totalWeight . " kg" ?></td>
        <td>Frais de port</td>
        <td><?php
            $shipping=0;
            if ($totalWeight<=0.5){
            $shipping=5;
            echo formatPrice($shipping);
            }elseif ($totalWeight<=2){
                $shipping=0.1*$total;
            echo formatPrice($shipping);
            }else{
            echo "gratuit";
            }
            ?></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <th>Total TTC</th>
        <td><?php echo formatPrice($total + $shipping) ?></td>
    </tr>
    </tfoot>
</table>


<?php
require "footer.php";
?>
