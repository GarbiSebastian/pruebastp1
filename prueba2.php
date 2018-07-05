<?php

$paginas = 10;

$links=[];

$links[] = "1 2";
$links[] = "2 1";
for ($i = 3; $i <= $paginas; $i++) {
    for ($j = 3; $j <= $paginas; $j++) {
        if($i!=$j){
            $links[] = "$i $j";
        }
    }
}

$cantLinks = count($links);

echo $paginas.PHP_EOL;
echo $cantLinks.PHP_EOL;
foreach ($links as $link) {
    echo $link.PHP_EOL;
}
