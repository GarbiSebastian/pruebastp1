<?php


$maxPaginas = 7001;
$stepPaginas = 500;
$minPaginas = 1;

$densidad = 0.0004;

$rangePaginas = range($minPaginas, $maxPaginas, $stepPaginas);

foreach ($rangePaginas as $paginas) {
    $maxLinks = $paginas * ($paginas - 1);
    $cantLinks = round($maxLinks * $densidad);

    $cantLinksPorPagina = [];
    $linksPorPag = [];
    $links = [];

    for ($i = 0; $i < $cantLinks; $i++) {
        do {
            $pag1 = rand(1, $paginas);
        } while (array_key_exists($pag1, $cantLinksPorPagina) && $cantLinksPorPagina[$pag1] == $paginas - 1);

        if (!array_key_exists($pag1, $cantLinksPorPagina)) {
            $cantLinksPorPagina[$pag1] = 0;
            $linksPorPag[$pag1] = [];
        }

        $cantLinksPorPagina[$pag1] ++;

        do {
            $pag2 = rand(1, $paginas);
        } while (in_array($pag2, $linksPorPag[$pag1]));

        $linksPorPag[$pag1][] = $pag2;

        $links[] = [$pag1, $pag2];
    }

    sort($links);
    $cantLinks = count($links);
    
    $handle= fopen("tiempos/tiempo_".str_pad($paginas, 5, "0", STR_PAD_LEFT)."_{$densidad}.txt", "w");
    fwrite($handle, $paginas . PHP_EOL);
    fwrite($handle, $cantLinks . PHP_EOL);
    foreach ($links as $link) {
        list($pag1, $pag2) = $link;
        fwrite($handle, "$pag1 $pag2" . PHP_EOL);    
    }
    fclose($handle);
}