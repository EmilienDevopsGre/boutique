<?php session_start();
require_once "header.php";
require_once "arrayproducts.php";
require_once "my-functions.php";
require_once "database.php";

global $db;

global $dbProducts;

$productsCarts = [];
$error = [];
//la variable regarde le nombre de produits existants
$nbrProducts = count($dbProducts);
//$productFind = false; //initialise une variable pour vérifier si le produit est retrouvé
//var_dump($_POST);
//var_dump($_SESSION['quantity']);
if (isset($_POST['quantity'])) {
    //@TODO ajouter les nouveaux produits aux anciens dans le panier
    $_SESSION['quantity'] = $_POST['quantity'];
}
//var_dump($_SESSION['quantity']);
$quantityNotFound = true;
foreach ($_SESSION['quantity'] as $key =>$value) {
////    var_dump($value);
//    foreach ($value as $exist) {
        if ($value > 0) {
            $quantityNotFound = false;
        } else {
            unset($_SESSION['quantity'][$key]);
        }
//        //var_dump($value);
//    }
}
//var_dump($quantityNotFound);
if ($quantityNotFound) { //&& empty($_SESSION)
    echo "Votre panier est vide.";
    //$_POST['quantity']=0;

} else {


//    if (isset($_POST['quantity'])) {
//        //TODO ajouter les nouveaux produits aux anciens dans le panier
//        $_SESSION['quantity'] = $_POST['quantity'];
//    }
//var_dump($dbProducts);

    foreach ($_SESSION['quantity'] as $key => $value) {

        $productId = test_input($key);

        $productQuantity = intval(test_input($value));


        if (array_key_exists($productId, $dbProducts)) {
            if ($productQuantity > 0 && $productQuantity <= 20) {
                $productsCarts[$productId] = $dbProducts[$productId];
                $productsCarts[$productId]['quantity'] = $productQuantity;

            }

        } else {
            $error[] .= " Vous n'avez pas commandé un produit valide: $productId n'existe pas ";
        }
    }


    if (!empty($error)) {
        echo '<div class="alert alert-danger" role="alert">' . $error[0] . '</div>';
    }
    ?>
    <form method="post" action="placeorder.php">
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
                echo '<td>' . $value["quantity"] . '</td>';
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
                <select id="entreprise_select"> <!-- name="entreprise"-->
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
            <?php $totalTTC = formatPrice($total + $shipping) ?>
            <input type="hidden" name="totalTTC" value="<?=  $totalTTC ?>" >
            <td><?= $totalTTC ?></td>
        </tr>
        </tfoot>
    </table>

<!--    --><?php //var_dump($_SESSION); ?>

        <input type="hidden" name="validate" value="1">
        <button type="submit"> Passer la commande</button>
    </form>

    <?php
}


/*
function newOrder();
if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
   header('Location: index.php?page=placeorder'); exit;
*/


require "footer.php";
?>
