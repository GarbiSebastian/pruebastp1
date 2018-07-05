<?php

$paginas = 5;

$links=[];

//Nodo muy destacado pagina 1   // * -> 1
for ($index = 1; $index < $paginas; $index++) {
    $pag1 = $index+1;
    $pag2 = 1;
    $links[] = [$pag1, $pag2];
}

for ($index = 1; $index < $paginas-2; $index++) {// 2 -> 3 -> 4
    $pag1 = $index+1;
    $pag2 = $pag1+1;
    $links[] = [$pag1, $pag2];
} 

// 4 -> 2
$pag1 = $paginas-1;
$pag2 = 2;
$links[] = [$pag1, $pag2];

// última pagina sin links entrantes
sort($links);

$cantLinks = count($links);

echo $paginas.PHP_EOL;
echo $cantLinks.PHP_EOL;
foreach ($links as $link) {
    list($pag1, $pag2) = $link; 
    echo "$pag1 $pag2".PHP_EOL;
}