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
$plot->setTitle(1, "Diferencia entre 1º y promedio");
$plot->setTitle(2, "Diferencia entre promedio y último");

foreach ($ps as $p) {
    $comando = "./../Metnum_2018_1C_TP1/tp1 $test $p";
    echo $comando.PHP_EOL;
    exec($comando);
    $contenido = file_get_contents($salida);
    $datos = array_map(function($v){return doubleval($v);},explode(PHP_EOL, $contenido));
    
    unset($datos[0]);//probabilidad
    unset($datos[count($datos)]);// ultimo enter
    $paginas = count($datos);
    $maximo = max($datos);
    $minimo = min($datos);
    $promedio = array_reduce($datos, function($carry,$item) use ($paginas){
        return $carry + ($item/$paginas);
    },0);
    
    $d1 = $maximo-$minimo;
    $d2 = $maximo-$promedio;
    $d3 = $promedio-$minimo;
    
    //echo PHP_EOL;
    $plot->push(doubleval($p), $d1,0);
    $plot->push(doubleval($p), $d2,1);
    $plot->push(doubleval($p), $d3,2);
}
$plot->writePng('random_g.png');
//$plot->writeEPS("destacado_g.eps");
die;