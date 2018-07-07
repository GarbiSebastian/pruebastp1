<?php
require_once './GnuPlot.php';

use Gregwar\GnuPlot\GnuPlot;

$archivo = $argv[1];
$plot = new GnuPlot();
$plot->setGraphTitle('Variación en p');
$plot->setXLabel("p");
$plot->setYLabel("Diferencia puntaje");

$plot->setTitle(0, "Diferencia entre 1º y último");
$plot->setTitle(1, "Diferencia entre 1º y promedio");
$plot->setTitle(2, "Diferencia entre promedio y último");

$f = fopen($archivo, "r");
while(list($p,$maximo,$promedio,$minimo) = fgetcsv($f, 0, " ", '"')){
    $d1 = $maximo - $minimo;
    $d2 = $maximo - $promedio;
    $d3 = $promedio - $minimo;

    $plot->push(doubleval($p), $d1, 0);
    $plot->push(doubleval($p), $d2, 1);
    $plot->push(doubleval($p), $d3,2);
}
fclose($f);
$plot->writePng('random_g.png');