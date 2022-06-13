<?php declare(strict_types=1);

require_once "database.php";


function formatPrice($price):string
{
    return number_format(intval($price), 2, ',', ' ') . "€";
}

function priceExcludingVAT($priceTTC): float
{
    return (100 * $priceTTC)/(100+20);
}

function discountedPrice($price, $discount): float
{
    return $price - ($price*($discount/100));
}

function totalItem($pDiscountedPrice, $pQuantity): float
{
    return $pDiscountedPrice*$pQuantity;
}

function weigthtItems($pWeight, $pQuantity): float
{
    return $pWeight*$pQuantity;
}


function test_input(string $data): string
{
//    $data = trim($data);
//    $data = stripslashes($data);
//    var_dump($data);
//    die;
    $data = htmlspecialchars($data);
    return $data;
}

function displayItem($pDbProduct)
{
    ?>

    <form method="post" action="cart.php">

    <div class="row row-cols-1 row-cols-md-3 g-4 mb-5" id="products">

        <div class="col">

        <div class="card text-center">
        <img src="" "class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title"></h5>

            //discount

        <p>Prix HT : </p>

        <p>TVA : </p>

        <p>Poids :</p>
        <input type="number" name="" value = "0" min="0" max="20" >
        </div></div></a></div>

    <input type="submit" value="Ajouter au panier" >

    </div>
    </form>
    <?php
}



function discount ($value)
{
    var_dump($value);
    if ($value["discount"] > 0) {
        echo '<p style="color: red" ><del> ' . formatPrice($value["price"]) . '</del></p>';
        echo '<p>Remise : ' . $value["discount"] . ' %' . '</p>';
        echo '<p>Prix TTC après discount : ' . formatPrice(discountedPrice($value["price"], $value["discount"])) . '</p>';
    } else {

        echo '<p>' . formatPrice($value["price"]) . '</p>';
    }
}
