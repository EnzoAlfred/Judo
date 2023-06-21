<?php
require_once("stripe-php-10.15.0/init.php");

$stripe = [
  "secret_key"      => "sk_live_51NIpd...IlHzjny",
  "publishable_key" => "pk_live_51NIpd...9NF5Ux7",
];

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>