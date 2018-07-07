<?php

$datos = ["0", "0.5444","0.5"];
unset($datos[0]);

echo min($datos);
echo PHP_EOL;
echo max($datos);
echo PHP_EOL;