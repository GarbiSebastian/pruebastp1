<?php
require_once './GnuPlot.php';

use Gregwar\GnuPlot\GnuPlot;

$test = $argv[1];
$salida = "$test.out";
$ps = range(0.01, 0.99, 0.01);

$plot = new GnuPlot();
$plot->setGraphTitle('Variación en p');
$plot->setXLabel("p");
$plot->setYLabel("Diferencia puntaje");

$plot->setTitle(0, "Diferencia entre 1º y último");
$plot->setTitle(1, "Diferencia entre 1º e intermedio");
$plot->setTitle(2, "Diferencia entre intermedio y último");

foreach ($ps as $p) {
    $comando = "./../Metnum_2018_1C_TP1/tp1 $test $p";
    echo $comando.PHP_EOL;
    exec($comando);
    $contenido = file_get_contents($salida);
    $datos = explode(PHP_EOL, $contenido);
    
    $destacado = $datos[1];
    $malo      = $datos[2];
    $comun     = $datos[3];
    
    $d1 = $destacado-$malo;
    $d2 = $destacado-$comun;
    $d3 = $comun-$malo;
    
    //echo PHP_EOL;
    $resultado[$p] = "$p $d1 $d2 $d3";
    $plot->push(doubleval($p), $d1,0);
    $plot->push(doubleval($p), $d2,1);
    $plot->push(doubleval($p), $d3,2);
}
$plot->writePng('destacado_g.png');
//$plot->writeEPS("destacado_g.eps");
die;