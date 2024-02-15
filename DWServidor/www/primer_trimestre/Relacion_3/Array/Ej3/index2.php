<?php
$numero = array_fill(0, 15, 0);

echo "Vaya introduciendo números enteros y pulsando INTRO:\n";

for ($i = 0; $i < 15; $i++) {
    $numero[$i] = intval(readline());
}

echo "\nArray original:\n";
for ($i = 0; $i < 15; $i++) {
    printf("|%3d ", $i);
}

for ($i = 0; $i < 15; $i++) {
    printf("|%3d ", $numero[$i]);
}
echo "|\n";

$aux = $numero[14];
for ($i = 14; $i > 0; $i--) {
    $numero[$i] = $numero[$i - 1];
}
$numero[0] = $aux;

echo "\nArray rotado a la derecha una posición:\n";
for ($i = 0; $i < 15; $i++) {
    printf("|%3d ", $i);
}
echo "|\n";

for ($i = 0; $i < 75; $i++) {
    echo "-";
}
echo "\n";

for ($i = 0; $i < 15; $i++) {
    printf("|%3d ", $numero[$i]);
}
echo "|\n";
?>
