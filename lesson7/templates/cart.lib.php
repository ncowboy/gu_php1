<?php
$cart = $_POST['cart'];
if ($cart && isset($cart['submit'])) {
    addCart();
}
