<?php
require_once './funciones.php';
//Destacado
$paginas = 5;

$links = armarCircuito(3, 3);

for ($i = 1; $i < $paginas; $i++) {
    $pag1 = $i+1;
    $links[] = [$pag1, 1];
}

sort($links);
$cantLinks = count($links);

echo $paginas.PHP_EOL;
echo $cantLinks.PHP_EOL;
foreach ($links as $link) {
    list($pag1, $pag2) = $link; 
    echo "$pag1 $pag2".PHP_EOL;
}




