<?php

$paginas = 20;

$links=[];

for ($i = 1; $i <= 10; $i++) {
    $links[] = "$i ".(($i%10)+1);
}

for ($i = 11; $i <= $paginas; $i++) {
    for ($j = 11; $j <= $paginas; $j++) {
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