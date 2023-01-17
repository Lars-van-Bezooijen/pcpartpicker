<?php

// Price Filter
if(isset($_GET['price_min'])) {$price_min = $_GET['price_min'];}
if(isset($_GET['price_max'])) {$price_max = $_GET['price_max'];}

if($price_min != null && $price_max != null)
{
    $filters[] = ['price', '>=', $price_min];
    $filters[] = ['price', '<=', $price_max];
}