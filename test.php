
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



