<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);

//we are going to use session variables so we need to enable sessions
session_start();

//declare cookie

require 'src/form.php';
require 'src/order.php';
require 'src/session.php';
require 'src/time.php';
require 'src/display.php';


if (!isset($_COOKIE['totalValue'])) {
    setcookie('totalValue', '0', time() + 5*24*3600);
}else {
    $value = $_COOKIE['totalValue'] + getPrice($checkedProducts, $products);
    setcookie('totalValue', (string)$value, time() + 5*24*3600);
}

/* function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
} */


//require 'mail.php';
require 'src/form-view.php';
