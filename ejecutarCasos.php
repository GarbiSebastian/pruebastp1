<?php

$casos = [1,2,3];

$test = "./../Metnum_2018_1C_TP1/tests/caso<i>.txt";
$salida = "$test.out";

$ps = range(0.01, 0.99, 0.01);

$resultados = [];
foreach ($ps as $p) {
    foreach($casos as $caso){
        $archivo = str_replace("<i>", $caso, $test);
        $salida = "$archivo.out";
        $comando = "./../Metnum_2018_1C_TP1/tp1 $archivo $p";
        $output= [];
        $return_var=null;
        exec($comando, $output, $return_var);
        $copy = "cp $salida ../Metnum_2018_1C_TP1/resultados_casos/caso{$caso}_prob_{$p}_.txt.resultado";
        exec($copy);
//        $contenido = file_get_contents($salida);
//        $datos = array_map(function($v){return doubleval($v);},explode(PHP_EOL, $contenido));
//
//        unset($datos[0]);//probabilidad
//        unset($datos[count($datos)]);// ultimo enter
//
//        $paginas = count($datos);
//        $maximo = max($datos);
//        $minimo = min($datos);
//        $promedio = array_reduce($datos, function($carry,$item) use ($paginas){
//            return $carry + ($item/$paginas);
//        },0);
//
//        echo "$p $maximo $promedio $minimo".PHP_EOL;
    }
}