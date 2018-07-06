<?php

function armarK($pagInicio, $cantPags) {
    $links = [];
    for ($i = 0; $i < $cantPags; $i++) {
        $pag1 = $i;
        for ($j = 0; $j < $cantPags; $j++) {
            $pag2 = $j;
            if ($pag1 != $pag2) {
                $links[] = [$pag1 + $pagInicio, $pag2 + $pagInicio];
            }
        }
    }
    return $links;
}

function armarCircuito($paginaInicio, $cantPags) {
    $links = [];
    for ($i = 0; $i < $cantPags; $i++) {
        $pag1 = $i;
        $pag2 = (($pag1+1) % $cantPags);
        $links[] = [$pag1+$paginaInicio, $pag2+$paginaInicio];
    }
    return $links;
}
