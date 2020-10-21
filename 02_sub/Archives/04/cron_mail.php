<?php
// 1.ビットコイン現在価格取得
$url = 'https://api.bitflyer.jp/v1/ticker?product_code=BTC_JPY';
$conn = curl_init();
curl_setopt($conn, CURLOPT_URL, $url);
curl_setopt($conn, CURLOPT_RETURNTRANSFER, true);
$res = curl_exec($conn);
$result = json_decodeecho number_format($result -> ltp) . '円';
curl_close($conn);

// 2.メール送信処理
mb_language("Japanese");
mb_internal_encoding("UTF-8");
$to = 'sample@sample.com';
$subject = 'Current Bitcoin price';
$message = number_format($result -> ltp) . '円';
$headers = 'From: sample@sample.com' . "\r\n";
mb_send_mail($to, $subject, $message, $headers);
?>
