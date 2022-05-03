<?php
require "header.php";


$name = 'Oeufs frais';
$price = '5€';
$image = "Static/img/imgProduit/oeufs.jpg";

//echo $name . $price . '<img src="' . $image . '">';


?>

<main class="main_Produit container d-grid gap-2 gap-md-5">
    <div class="row">
        <h2 class="text-center mt-2"><?php echo($name); ?></h2>
    </div>

    <!-- PRODUCT RELATED START -->
    <section class="row">
        <div class="col-12 col-md-6">
            <img src= "<?php echo $image ?>" class="img-fluid" alt="photo du produit">
        </div>
        <div class="col-6 col-md-2 align-self-center">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero esse laborum vel commodi aliquid eum hic
                laboriosam molestias, beatae dolorum impedit sed doloremque ex sit voluptatem voluptatibus dolor quia quas.
            </p>
        </div>
        <div class="col-6 col-md-4 ">
            <form method="post" action="http://" class="h-100 d-flex flex-column justify-content-around">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="type">
                            <h3>Type de Produit</h3>
                        </label>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle form-control" type="button" id="type" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Type Produit
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Type1</a></li>
                                <li><a class="dropdown-item" href="#">Type2</a></li>
                                <li><a class="dropdown-item" href="#">Type3</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 d-flex flex-column justify-content-between">
                        <label class="form-label " for="qte">
                            <h3>Quantité</h3>
                        </label>
                        <input class="form-control " id="qte" type="text" placeholder="0">
                    </div>

                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <p class="prix">
                            <?php echo($price); ?>
                        </p>
                    </div>
                    <div class="col-12 col-md-6">
                        <button class="btn btn-primary form-control" type="submit">Commander</button>
                    </div>

                </div>

            </form>
        </div>
    </section>
    <!-- PRODUCT RELATED END -->

    <!-- VENDOR RELATED START -->
    <section class="row">
        <div class="col-12 col-md-2">
            <h3>Aussi vendus par Nom Producteur</h3>
            <a href="./producteur.html"><img src="./Static/img/imgProduit/Photo_Producteur.avif" alt="Photo_Producteur"></a>
        </div>


    </section>

    <!-- VENDOR RELATED END -->
</main>

<?php

require "footer.php";

?>