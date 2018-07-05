<?php

$paginas = 8;

$links=[];

$links[] = "1 2";
for ($i = 1; $i < $paginas; $i++) {
    $links[] = ($i+1)." 1";
}

$cantLinks = count($links);

echo $paginas.PHP_EOL;
echo $cantLinks.PHP_EOL;
foreach ($links as $link) {
    echo $link.PHP_EOL;
}




