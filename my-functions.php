<?php declare(strict_types=1);

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


function test_input($data): string
{
//    $data = trim($data);
//    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
