<?php declare(strict_types=1);

require_once "database.php";
include_once "ItemClass.php";


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


function discount (ItemClass $Item)
{
    if ($Item->discount > 0) {
        echo '<p style="color: red" ><del> ' . formatPrice($Item->price) . '</del></p>';
        echo '<p>Remise : ' . $Item->discount . ' %' . '</p>';
        echo '<p>Prix TTC après discount : ' . formatPrice(discountedPrice($Item->price, $Item->discount)) . '</p>';
    } else {

        echo '<p>' . formatPrice($Item->price) . '</p>';
    }
}


function displayItem(ItemClass $Item)
{

    ?>

    <form method="post" action="cart.php">

    <div class="row row-cols-1 row-cols-md-3 g-4 mb-5" id="products">

        <div class="col">

        <div class="card text-center">
        <img src="<?php echo ($Item -> img_url); ?>" "class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title"><?php echo ($Item -> name); ?></h5>

            <p>Discount : <?php discount($Item); ?></p>

        <p>Prix HT : <?php echo ($Item -> price); ?></p>

        <p>TVA : <?php echo (0.2*($Item -> price)); ?> </p>

        <p>Poids :<?php echo ($Item -> weight); ?></p>
        <input type="number" name="" value = "0" min="0" max="20" >
        </div></div></a></div>

    <input type="submit" value="Ajouter au panier" >

    </div>
    </form>
    <?php
}




