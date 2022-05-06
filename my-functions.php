<?php
function formatPrice($price):string
{
    return number_format($price, 2, ',', ' ') . "€";
}

function priceExcludingVAT($priceTTC):float
{
    return (100 * $priceTTC)/(100+20);
}

function discountedPrice($price, $discount):float
{
    return $price - ($price*($discount/100));
}
