<?php
//CASO 2
$paginas = 8;

$links=[];

for ($i = 3; $i <= $paginas; $i++) {
    $pag1 = $i;
    for ($j = 3; $j <= $paginas; $j++) {
        $pag2 = $j;
	if($pag1!= $pag2){
            $links[] = [$pag1, $pag2];
        }
    }
}

for ($i = 2; $i <= $paginas; $i++) {
    $pag1 = $i;
    $pag2 = 1;
    $links[] = [$pag1, $pag2];
} 

$links[] = [1, 2];

sort($links);

$cantLinks = count($links);

echo $paginas.PHP_EOL;
echo $cantLinks.PHP_EOL;
foreach ($links as $link) {
    list($pag1, $pag2) = $link; 
    echo "$pag1 $pag2".PHP_EOL;
}
