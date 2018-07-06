<?php
//k4 vs c4
$paginas = 8;

$links=[];

for ($i =5; $i <= $paginas; $i++) {
    $pag1 = $i;
    for ($j = 5; $j <= $paginas; $j++) {
        $pag2 = $j;
	if($pag1!= $pag2){
            $links[] = [$pag1, $pag2];
        }
    }
}

for ($i = 1; $i < 4; $i++) {
    $pag1 = $i;
    $pag2 = $i+1;
    $links[] = [$pag1, $pag2];
}

$links[] = [4, 1];

sort($links);

$cantLinks = count($links);

echo $paginas.PHP_EOL;
echo $cantLinks.PHP_EOL;
foreach ($links as $link) {
    list($pag1, $pag2) = $link; 
    echo "$pag1 $pag2".PHP_EOL;
}
