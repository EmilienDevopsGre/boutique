<?php
$chaise = [
    "name" => "chaise",
    "price" => 50,
    "weight" => 7,
    "discount" => 10,
    "picture_url" => "https://static.westwingnow.de/image/upload/w_1500,h_2000,pd_272_120_272_120,c_limit/simple/24/1661/1405672.jpg",
];

$oranges = [
    "name" => "oranges",
    "price" => 3,
    "weight" => 1,
    "discount" => null,
    "picture_url" => "https://produits.bienmanger.com/34499-0w0h0_Oranges_Vanille_Sicile_Bio.jpg",
];


$beezwrap = [
    "name" => "beezwrap",
    "price" => 8,
    "weight" => 0.1,
    "discount" => null,
    "picture_url" => "https://c-pi.niceshops.com/upload/image/product/medium/default/bees-wrap-vegan-lot-de-7-1-kits-813914-fr.jpg",
];

require "header.php";

?>

<div class="row row-cols-1 row-cols-md-3 g-4 mb-5" id="products">
            <div class="col">
                <a href="page_produit.html">
                    <div class="card text-center">
                        <img src="<?php echo $beezwrap["picture_url"]; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> <?php echo $beezwrap["name"]; ?></h5>
                            <p>Prix : <?php echo $beezwrap["price"]; ?> </p>
                            <p>Remise : <?php echo $beezwrap["discount"]; ?></p>
                            <p>Poids : <?php echo $beezwrap["weight"]; ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="page_produit.html">
                    <div class="card text-center">
                        <img src="<?php echo $chaise["picture_url"]; ?>" class="card-img-top img-responsive" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> <?php echo $chaise["name"]; ?></h5>
                            <p>Prix : <?php echo $chaise["price"]; ?> </p>
                            <p>Remise : <?php echo $chaise["discount"]; ?></p>
                            <p>Poids : <?php echo $chaise["weight"]; ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="page_produit.html">
                    <div class="card text-center">
                        <img src="<?php echo $oranges["picture_url"]; ?>" class="card-img-top img-responsive" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> <?php echo $oranges["name"]; ?></h5>
                            <p>Prix : <?php echo $oranges["price"]; ?> </p>
                            <p>Remise : <?php echo $oranges["discount"]; ?></p>
                            <p>Poids : <?php echo $oranges["weight"]; ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="page_produit.html">
                    <div class="card text-center">
                        <img src="Static/img/home/jeux.png" class="card-img-top img-responsive" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Jeux</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="page_produit.html">
                    <div class="card text-center">
                        <img src="Static/img/home/electro.png" class="card-img-top img-responsive" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Electronique</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a href="page_produit.html">
                    <div class="card text-center">
                        <img src="Static/img/home/cuisine.png" class="card-img-top img-responsive" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Objets cuisine</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        </div>


<?php

require "footer.php";

