<?php

$archivos = glob("tiempos/*.txt");
$p = 0.99;

foreach ($archivos as $archivo) {
    $matches = [];
    preg_match("#tiempos/tiempo_(\d+)_(\d\.\d+).txt#", $archivo, $matches);
    $paginas = $matches[1];
    $densidad = $matches[2];
    $comando = "./../Metnum_2018_1C_TP1/tp1 $archivo $p";
    $output = [];
    $return_var = null;
    exec($comando, $output, $return_var);
    echo "$p $paginas $densidad " . explode(" ", $output[8])[1] . " $archivo" . PHP_EOL;
}