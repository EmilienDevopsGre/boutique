<?php
require_once "header.php";
require_once "arrayproducts.php";
require_once "my-functions.php";

global $products;

$productsCarts = [];
$error=[];
if (isset($_POST)) { //vérifie s'il y a quelque chose dans le post (un envoi de form)
    foreach ($_POST['quantity'] as $keyPOST => $valuePOST) {//pour chaque case key=name(de order) value=quantity(de order)
        $nbrProducts = count($products); //la variable regarde le nombre de produits existants
        $productFind = false; //initialise une variable pour vérifier si le produit est retrouvé
        foreach ($products as $keyProduct => $valueProduct) {//pour chaque case key=nameP value=arrayInfoP
            $nbrProducts--; //décrémente pour enlever un produit à vérifier à chaque tour
            if ($keyPOST == $keyProduct && intval(test_input($valuePOST)) > 0) { //vérifie si la clé du produit de la commande est présente dans le catalogue et vérifie s'il y a une quantité commandée
                $productsCarts[$keyPOST] = $valueProduct; // reprend le tableau initialisé au début avec en index la clé du produit commandé, on lui assigne les valeurs du produit présentes dans le catalogue
                $productsCarts[$keyPOST]['quantity'] = $valuePOST; //on ajoute une nouvelle entrée qui contient la quantité
                $productFind = true;//on affirme que le produit est trouvé
            } elseif (intval(test_input($valuePOST)) < 0 || intval(test_input($valuePOST)) > 20 || !is_int(intval(test_input($valuePOST)))) {//on nettoie les valeurs (test_input) puis on convertit la chaine de caractères en int (intval) et on regarde si la quantité rentre dans les limites
                $error[] .= " Vous n'avez pas commandé une quantité valide ";
            } elseif ($nbrProducts == 0 && intval(test_input($valuePOST)) > 0 && !$productFind) { //s'il n'y a plus de produits à parcourir et qu'il y a une quantité mais qu'il n'a pas trouvé de produit
                $error[] .= " Vous n'avez pas commandé un produit valide ";
            }
        }
    }
}
if (!empty($error)) {
    echo '<div class="alert alert-danger" role="alert">' . $error[0] . '</div>';
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
            $totalWeight += weigthtItems($value["weight"], $value['quantity']);
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
