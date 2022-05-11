<?php
require "header.php";
require "arrayproducts.php";

require "my-functions.php";
$name = $quantity = "";
global $products;

$productsCarts = [];
if (isset($_POST)) {
    foreach ($_POST['quantity'] as $keyPOST => $valuePOST) {//pour chaque case key=nameP value=quantityP
        $nbrProducts = count($products);
        $productFind = false;
        foreach ($products as $keyProduct => $valueProduct) {//pour chaque case key=nameP value=arrayInfoP
            $nbrProducts--;
            if ($keyPOST == $keyProduct && intval(test_input($valuePOST)) > 0) {
                $productsCarts[$keyPOST] = $valueProduct;
                $productsCarts[$keyPOST]['quantity'] = $valuePOST;
                $productFind = true;
            } elseif (intval(test_input($valuePOST)) < 0 || intval(test_input($valuePOST)) > 20) {
                echo '<div class="alert alert-danger" role="alert">Vous n\'avez pas commandé une quantité valide</div>';
            } elseif ($nbrProducts == 0 && intval(test_input($valuePOST)) > 0 && !$productFind) {
                echo '<div class="alert alert-danger" role="alert">Vous n\'avez pas commandé un produit valide</div>';
            }
        }
    }
}
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
    foreach ($productsCarts as $key => $value) :
        //var_dump($order);
        ?>
        <tr>
            <?php
            echo '<td>' . $value["name"] . '</td>';
            echo '<td>' . $value["quantity"] . '</td>';;
            echo '<td>' . formatPrice($value["price"]) . '</td>';
            echo '<td>' . formatPrice(discountedPrice($value["price"], $value["discount"])) . '</td>';
            echo '<td>' . formatPrice(totalItem(discountedPrice($value["price"], $value["discount"]), $value['quantity'])) . '</td>';
            $total += totalItem(discountedPrice($value["price"], $value["discount"]), $value['quantity']);
            += weigthtItems($value["weight"], $value['quantity']);
            ?>
        </tr>
    <?php endforeach; ?>
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
        <td>
            <select name="entreprise" id="entreprise_select">
                <option value="Laposte">Laposte</option>
                <option value="Chronopost">Chronopost</option>
            </select>
        </td>
        <td>Poids cumulé : <?php echo $totalWeight . " kg" ?></td>
        <td>Frais de port</td>
        <td><?php
            $shipping = 0;
            if ($totalWeight <= 0.5) {
                $shipping = 5;
                echo formatPrice($shipping);
            } elseif ($totalWeight <= 2) {
                $shipping = 0.1 * $total;
                echo formatPrice($shipping);
            } else {
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
