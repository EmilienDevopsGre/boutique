
<?php

require "arrayproducts.php";

$order=$_POST["quantity"];
//var_dump($_POST);
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
    //var_dump($order);
    ?>
    <tr>
    <?php
    echo '<td>' . $key_name . '</td> <td>' . $quantity . '</td>';
    echo $products[$key_name]["name"];
    //var_dump($_POST[$quantity][$key_name]);
    var_dump($_POST);
    //echo '<td>' . $key_name . '</td> <td>' . $quantity . '</td>';
    ?>
    </tr>
    <?php
}
?>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th>TVA</th>
    </tr>
</table>

<!--// multidimensional-catalog.php old one-->


<!---->
<!--    <div class="row row-cols-1 row-cols-md-3 g-4 mb-5" id="products">-->
<!--        <div class="col">-->
<!--            <a href="page_produit.html">-->
<!--                <div class="card text-center">-->
<!--                    <img src="--><?php //echo $beezwrap["picture_url"]; ?><!--" class="card-img-top" alt="...">-->
<!--                    <div class="card-body">-->
<!--                        <h5 class="card-title"> --><?php //echo $beezwrap["name"]; ?><!--</h5>-->
<!--                        <p>Prix : --><?php //echo $beezwrap["price"]; ?><!-- </p>-->
<!--                        <p>Remise : --><?php //echo $beezwrap["discount"]; ?><!--</p>-->
<!--                        <p>Poids : --><?php //echo $beezwrap["weight"]; ?><!--</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="col">-->
<!--            <a href="page_produit.html">-->
<!--                <div class="card text-center">-->
<!--                    <img src="--><?php //echo $chaise["picture_url"]; ?><!--" class="card-img-top img-responsive" alt="...">-->
<!--                    <div class="card-body">-->
<!--                        <h5 class="card-title"> --><?php //echo $chaise["name"]; ?><!--</h5>-->
<!--                        <p>Prix : --><?php //echo $chaise["price"]; ?><!-- </p>-->
<!--                        <p>Remise : --><?php //echo $chaise["discount"]; ?><!--</p>-->
<!--                        <p>Poids : --><?php //echo $chaise["weight"]; ?><!--</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="col">-->
<!--            <a href="page_produit.html">-->
<!--                <div class="card text-center">-->
<!--                    <img src="--><?php //echo $oranges["picture_url"]; ?><!--" class="card-img-top img-responsive" alt="...">-->
<!--                    <div class="card-body">-->
<!--                        <h5 class="card-title"> --><?php //echo $oranges["name"]; ?><!--</h5>-->
<!--                        <p>Prix : --><?php //echo $oranges["price"]; ?><!-- </p>-->
<!--                        <p>Remise : --><?php //echo $oranges["discount"]; ?><!--</p>-->
<!--                        <p>Poids : --><?php //echo $oranges["weight"]; ?><!--</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="col">-->
<!--            <a href="page_produit.html">-->
<!--                <div class="card text-center">-->
<!--                    <img src="Static/img/home/jeux.png" class="card-img-top img-responsive" alt="...">-->
<!--                    <div class="card-body">-->
<!--                        <h5 class="card-title">Jeux</h5>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="col">-->
<!--            <a href="page_produit.html">-->
<!--                <div class="card text-center">-->
<!--                    <img src="Static/img/home/electro.png" class="card-img-top img-responsive" alt="...">-->
<!--                    <div class="card-body">-->
<!--                        <h5 class="card-title">Electronique</h5>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="col">-->
<!--            <a href="page_produit.html">-->
<!--                <div class="card text-center">-->
<!--                    <img src="Static/img/home/cuisine.png" class="card-img-top img-responsive" alt="...">-->
<!--                    <div class="card-body">-->
<!--                        <h5 class="card-title">Objets cuisine</h5>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--    </div>-->
<!--    </div>-->



//commande?


<?php

$products_in_cart = $_SESSION['cart'] ?? array();

/* Vérification de la variable de session pour les produits en panier*/

$productsToDb = array();
//$subtotal = 0.00;
// S'il y a des produits dans le panier
if ($products_in_cart) {
    /* Il y a des produits dans le panier, nous devons donc sélectionner ces produits dans la base de données.*/
    /* Mettre les produits du panier dans un tableau de chaîne de caractères avec point d'interrogation, nous avons besoin que l'instruction SQL inclue  ( ?,?, ?,...etc).*/
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $db->prepare('SELECT * FROM products WHERE id IN (' . $array_to_question_marks . ')');
    /* Nous avons uniquement besoin des clés du tableau, pas des valeurs, les clés sont les identifiants des produits. */
    $stmt->execute(array_keys($products_in_cart));
    /* Récupérer les produits de la base de données et retourner le résultat sous la forme d'un tableau.*/
    $productsToDb = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Calculez le total partiel
    foreach ($productsToDb as $product) {
        //$subtotal += (float)$product['prix'] * (int)$products_in_cart[$product['id']];
        $totalTTC;
    }
}
?>



//ancienne méthode validation produits existants etc...
//        foreach ($products as $keyProduct => $product) {//pour chaque case key=nameP value=arrayInfoP
//            $nbrProducts--; //décrémente pour enlever un produit à vérifier à chaque tour
//            if ($productName === $keyProduct && intval(test_input($productQuantity)) > 0) { //vérifie si la clé du produit de la commande est présente dans le catalogue et vérifie s'il y a une quantité commandée
//                $productsCarts[$productName] = $product; // reprend le tableau initialisé au début avec en index la clé du produit commandé, on lui assigne les valeurs du produit présentes dans le catalogue
//                $productsCarts[$productName]['quantity'] = $productQuantity; //on ajoute une nouvelle entrée qui contient la quantité
//                $productFind = true;//on affirme que le produit est trouvé
//            } elseif (intval(test_input($productQuantity)) < 0 || intval(test_input($productQuantity)) > 20 || !is_int(intval(test_input($productQuantity)))) {//on nettoie les valeurs (test_input) puis on convertit la chaine de caractères en int (intval) et on regarde si la quantité rentre dans les limites
//                $error[] .= " Vous n'avez pas commandé une quantité valide ";
//            } elseif ($nbrProducts == 0 && intval(test_input($productQuantity)) > 0 && !$productFind) { //s'il n'y a plus de produits à parcourir et qu'il y a une quantité mais qu'il n'a pas trouvé de produit
//                $error[] .= " Vous n'avez pas commandé un produit valide "; //TODO array_key_exist
//            }
//        }
