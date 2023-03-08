<?php
date_default_timezone_set('Asia/Tashkent');
$siteUrl = 'https://8f3e-91-192-66-164.ngrok.io/shop-bot/';

require_once('library/Telegram.php');
require_once('components/db.php');
require_once('functions.php');
require_once('user.php');
include_once('components/products.php');
include_once('components/brands.php');
include_once('components/items.php');
include_once('components/basket.php');

$telegram = new Telegram("6197988281:AAHRmDRfpvSaj5oazfm4c3Vrz_8_iyye3Ho", true);
$chatID = $telegram ->ChatID();
// $db = new Database();
$func = new Functions();
$Admin = "829349149";
// $telegram->setWebhook($siteUrl);

$message = isset($telegram->getData()['message']) ? $telegram->getData()['message'] : '';
$messageID = $telegram ->MessageID();
$text = $telegram ->Text();
$firstName = $telegram -> FirstName();
$lastName = $telegram -> LastName();
$fullName = $firstName . ' ' . $lastName;
$username = $telegram -> Username();

if ($text == '/start') {
    
} else {
    
}