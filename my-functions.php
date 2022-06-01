<?php declare(strict_types=1);

require_once __DIR__ . '/Class/Item.php';

//use Controller\Item;

function formatPrice($price):string
{
    return number_format($price, 2, ',', ' ') . "€";
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

function displayItem(Item $item): void
{
    ?>
    <div style="height: 50px">
        <div style="height: 50px">
            <img style="height: 100%" src="<?= $item->imageUrl ?>" alt="<?= $item->name ?>">
        </div>
        <div class="">
            <h3><?= $item->name ?></h3>
            <p><?= $item->description ?></p>
            <p>Prix : <?= formatPrice($item->price) ?></p>
            <p>Prix avec remise : <?= formatPrice(discountedPrice($item->price, $item->discount)) ?></p>
            <p>Poids : <?= $item->weight ?>g</p>
            <p>Stock : <?= $item->stock ?></p>
            <p>Disponible : <?= $item->isAvailable ? 'oui' : 'non' ?></p>
        </div>
    <?php
}

