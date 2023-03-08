<?php
include_once('./library/Telegram.php');
$telegram = new Telegram("6197988281:AAHRmDRfpvSaj5oazfm4c3Vrz_8_iyye3Ho", true);

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://tiktok-download-without-watermark.p.rapidapi.com/analysis?url=https://www.tiktok.com/@the.nick.pro/video/6904271117783928065?lang=en.&hd=0",
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
    $telegram->sendVideo(['chat_id' => 829349149, 'video' => $data->data->play, 'caption' => $data->data->title]);
}