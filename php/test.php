<?php
$mesaj = "Salut!";
echo $mesaj;
error_log($mesaj);
$numere = [3, 8, 15, 22, 7, 44, 19, 6, 31, 10];
$numarPare = 0;
$numarImpare = 0;
 
for ($i = 0; $i < count($numere); $i++) {
    if ($numere[$i] % 2 === 0) {
        $numarPare++;
    } else {
        $numarImpare++;
    }
}
echo "Sir de numere: " . implode(", ", $numere) . "\n";
echo "Numere pare: " . $numarPare . "\n";
echo "Numere impare: " . $numarImpare . "\n";
?>