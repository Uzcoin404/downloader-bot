<?php
date_default_timezone_set('Asia/Tashkent');
$siteUrl = 'https://e9be-213-230-74-166.eu.ngrok.io/telegram/downloader-bot/';

require_once('library/Telegram.php');
require_once('components/db.php');
require_once('functions.php');
require_once('user.php');

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
    $func->sendMessage("Salom");
} else {
    if (str_contains($text, "tiktok.com") || str_contains($text, "vm.tiktok.com")) {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://tiktok-download-without-watermark.p.rapidapi.com/analysis?url=$text&hd=0",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: tiktok-download-without-watermark.p.rapidapi.com",
                "X-RapidAPI-Key: dcb55c740emsh743e1fe2970921ep145c41jsn074a39d651d1"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $data = json_decode($response);
            var_dump($data);
            $telegram->sendVideo(['chat_id' => $chatID, 'video' => $data->data->play, 'caption' => $data->data->title]);
        }
    }
}