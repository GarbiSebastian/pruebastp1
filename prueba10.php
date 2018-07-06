<?php
//k5 vs c5
$paginas = 10;

$links=[];

for ($i =6; $i <= $paginas; $i++) {
    $pag1 = $i;
    for ($j = 6; $j <= $paginas; $j++) {
        $pag2 = $j;
	if($pag1!= $pag2){
            $links[] = [$pag1, $pag2];
        }
    }
}

for ($i = 1; $i < 5; $i++) {
    $pag1 = $i;
    $pag2 = $i+1;
    $links[] = [$pag1, $pag2];
}

$links[] = [5, 1];

sort($links);

$cantLinks = count($links);

echo $paginas.PHP_EOL;
echo $cantLinks.PHP_EOL;
foreach ($links as $link) {
    list($pag1, $pag2) = $link; 
    echo "$pag1 $pag2".PHP_EOL;
}
