<?php

require_once './funciones.php';

//k5 vs k4
$set1_p = 5;
$set2_p = 4;

$set1_links = armarK(1, $set1_p);
$set2_links = armarK(1+$set1_p, $set2_p);

$links = array_merge($set1_links,$set2_links);
sort($links);

$cantLinks = count($links);
$paginas = $set1_p + $set2_p;

echo $paginas . PHP_EOL;
echo $cantLinks . PHP_EOL;
foreach ($links as $link) {
    list($pag1, $pag2) = $link;
    echo "$pag1 $pag2" . PHP_EOL;
}
