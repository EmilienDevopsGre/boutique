<?php

require_once 'my-functions.php';
require_once "header.php";
require_once "arrayproducts.php";

global $products;

echo '<form method="post" action="cart.php">';

    echo '<div class="row row-cols-1 row-cols-md-3 g-4 mb-5" id="products">';

        foreach ($products as $value) :

            echo '<div class="col">';
            //echo '<a href="page_produit.html">';
            echo '<div class="card text-center">';
            echo '<img src="' . $value ["picture_url"] . '"class="card-img-top" alt="...">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $value["name"] . '</h5>';
            if (is_int($value["discount"])) {
                echo '<p style="color: red" ><del> ' . formatPrice($value["price"]) . '</del></p>';
                echo '<p>Remise : ' . $value["discount"] . '</p>';
                echo '<p>Prix TTC après discount : ' . formatPrice(discountedPrice($value["price"], $value["discount"])) . '</p>';
            } else {
                echo '<p>' . formatPrice($value["price"]) . '</p>';
            }
            echo '<p>Prix HT : ' . formatPrice(discountedPrice(priceExcludingVAT($value["price"]), $value["discount"])) . '</p>';
            $montantTva = formatPrice((discountedPrice($value["price"], $value["discount"])) - (discountedPrice(priceExcludingVAT($value["price"]), $value["discount"])));
            echo '<p>TVA : ' . $montantTva . '</p>';

            echo '<p>Poids : ' . $value["weight"] . '</p>';
            echo '<input type="number" name="quantity[' . $value['name'] . ']" value = "0" min="0" max="20" >';
            //if quantity

            echo '</div></div></a></div>';

        endforeach;
echo '<input type="submit" value="Ajouter au panier" />';

    echo '</div>';
echo '</form>';

?>


<?php

require "footer.php";

