<?php
require_once './GnuPlot.php';

use Gregwar\GnuPlot\GnuPlot;

$archivo = $argv[1];
$plot = new GnuPlot();
$plot->setGraphTitle('Variación en p');
$plot->setXLabel("p");
$plot->setYLabel("puntaje");

$plot->setTitle(0, "1º");
$plot->setTitle(1, "Promedio");
$plot->setTitle(2, "Último");

$f = fopen($archivo, "r");
$uno_sobre_cant = 1/2000; 
while(list($p,$maximo,$promedio,$minimo) = fgetcsv($f, 0, " ", '"')){
    $plot->push(doubleval($p), $maximo, 0);
    $plot->push(doubleval($p), $promedio, 1);
    $plot->push(doubleval($p), $minimo,2);
}
fclose($f);
$plot->writePng('random_v_g.png');