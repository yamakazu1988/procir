<?php
$url = 'https://api.bitflyer.jp/v1/ticker?product_code=BTC_JPY';
$conn = curl_init();
curl_setopt($conn, CURLOPT_URL, $url);
curl_setopt($conn, CURLOPT_RETURNTRANSFER, true);
$res = curl_exec($conn);
$result = json_decode($res);
echo number_format($result -> ltp) . '円';
curl_close($conn);
?>
