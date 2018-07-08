<?php

$paginas = ($argc > 1)?$argv[1]:2000;
$densidad = ($argc > 2)?$argv[2]:0;

$maxLinks = $paginas*($paginas-1);
$cantLinks = round($maxLinks*$densidad);

$cantLinksPorPagina = [];
$linksPorPag=[];
$links = [];

//for ($i = 0; $i < $cantLinks; $i++) {
//    $cantLinksPorPagina[$i+1] = 0;
//    $linksPorPag[$i+1] = [];
//    echo $i.PHP_EOL;
//}

for ($i = 0; $i < $cantLinks; $i++) {
    do{
        $pag1 = rand(1, $paginas);
    }while(array_key_exists ($pag1, $cantLinksPorPagina) && $cantLinksPorPagina[$pag1] == $paginas-1);

    if(!array_key_exists ($pag1, $cantLinksPorPagina)){
        $cantLinksPorPagina[$pag1] = 0;
        $linksPorPag[$pag1] = [];
    }
   
    $cantLinksPorPagina[$pag1]++;
    
    do{
        $pag2 = rand(1, $paginas);
    }while(in_array($pag2, $linksPorPag[$pag1]));

    $linksPorPag[$pag1][] = $pag2;
  
    $links[] = [$pag1, $pag2];
}


sort($links);
$cantLinks = count($links);

echo $paginas.PHP_EOL;
echo $cantLinks.PHP_EOL;
foreach ($links as $link) {
    list($pag1, $pag2) = $link; 
    echo "$pag1 $pag2".PHP_EOL;
}
