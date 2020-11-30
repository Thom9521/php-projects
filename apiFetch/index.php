<?php


$cURLConnection = curl_init();

curl_setopt($cURLConnection, CURLOPT_URL, 'http://127.0.0.1:8000/api/products');
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

$products = curl_exec($cURLConnection);
curl_close($cURLConnection);

$jsonArrayResponse - json_decode($products);
