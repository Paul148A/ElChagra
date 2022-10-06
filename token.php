<?php 
//Variables editables 
define("KEY_TOKEN", "PDCTO.dscrp-1717514*");
define("CLIENT_ID", "AdctFFC7SMsUivqlsKJH9ZBx5la7lgJflN36d5D4lXSsBVbHmPJ-ZCRA_yRncNWMACRJ-9H4PC8I-XpC");
define("CURRENCY", "USD");
session_start();


//contador de carrito 
$num_cart = 0;

if(isset($_SESSION['carrito']['productos'])){
    $num_cart = count($_SESSION['carrito']['productos']);
}

?>