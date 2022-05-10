<?php

require 'my-functions.php';



require "header.php";

require "arrayproducts.php";

echo '<form method="post" action="cart.php">';

echo '<div class="row row-cols-1 row-cols-md-3 g-4 mb-5" id="products">';



foreach ($products as $value) {

//    echo '<pre>';
//    var_dump($_POST);
//    echo '</pre>';

    echo '<div class="col">';
    //echo '<a href="page_produit.html">';
    echo '<div class="card text-center">';
    echo '<img src="' . $value ["picture_url"] . '"class="card-img-top" alt="...">';
    echo '<div class="card-body">';
    echo '<input type="hidden" name="name[' . $value['name'] . ']"> <h5 class="card-title">' . $value["name"] . '</h5>';
    echo '<input type="hidden" name="Prix unitaire avant discount[' . $value['name'] . ']"><p style="color: red" ><del> ' . formatPrice($value["price"]) . '</del></p>';
    echo '<input type="hidden" name="Prix unitaire après discount[' . $value['name'] . ']"><p>Prix TTC après discount : ' . formatPrice(discountedPrice($value["price"],$value["discount"])) . '</p>';
    echo '<p>Prix HT : ' . formatPrice(discountedPrice(priceExcludingVAT($value["price"]),$value["discount"])) . '</p>';
    $montantTva = formatPrice((discountedPrice($value["price"],$value["discount"])) - (discountedPrice(priceExcludingVAT($value["price"]),$value["discount"])));
    echo '<input type="hidden" name="TVA[' . $value['name'] . ']"><p>TVA : ' . $montantTva . '</p>';
    echo '<p>Remise : ' . $value["discount"] . '</p>';
    echo '<p>Poids : ' . $value["weight"] . '</p>';
    echo '<input type="number" name="quantity[' . $value['name'] . '] quantity' . '" value = "0">';
    //if quantity
    echo '<input type="submit" value="Ajouter au panier" />';
    echo '</div></div></a></div>';

}


echo '</div>';
echo '</form>';

?>

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


<?php

require "footer.php";

