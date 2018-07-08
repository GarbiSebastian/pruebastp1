<?php
//CASO 1
$paginas = 8;

$links=[];

//Nodo muy destacado pagina 1   // * -> 1
for ($i = 2; $i <= $paginas; $i++) {
    $pag1 = $i;
    $pag2 = 1;
    $links[] = [$pag1, $pag2];
}

for ($i = 3; $i <= $paginas-1; $i++) {// 3 -> 4 -> 5 -> 6 -> 7 -> 8
    $pag1 = $i;
    $pag2 = $pag1+1;
    $links[] = [$pag1, $pag2];
} 

// 8 -> 3
$pag1 = $paginas;
$pag2 = 3;
$links[] = [$pag1, $pag2];

sort($links);

$cantLinks = count($links);

echo $paginas.PHP_EOL;
echo $cantLinks.PHP_EOL;
foreach ($links as $link) {
    list($pag1, $pag2) = $link; 
    echo "$pag1 $pag2".PHP_EOL;
}
