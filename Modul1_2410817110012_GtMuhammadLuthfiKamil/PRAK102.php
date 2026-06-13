<?php

$jari_jari = 4.2;
$tinggi    = 5.4;
$phi       = M_PI; 

$volume = (1/3) * $phi * pow($jari_jari, 2) * $tinggi;

echo "Jari-jari = " . $jari_jari . "<br>";
echo "Tinggi    = " . $tinggi . "<br>";
echo number_format($volume, 3, '.', '') . " m3";
?>
