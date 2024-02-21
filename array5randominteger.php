<?php

function nilai_terbesar_kedua($arr) {
    // Pastikan panjang array cukup besar
    if (count($arr) < 2) {
        return "Array harus memiliki setidaknya dua elemen";
    }

    // Mengurutkan array secara descending
    arsort($arr);

    // Mengambil elemen kedua dari array yang sudah diurutkan
    $values = array_values($arr);
    return $values[1];
}

// Contoh penggunaan
$random_array = array();
for ($i = 0; $i < 5; $i++) {
    $random_array[] = rand(1, 100);
}

echo "Array: ";
print_r($random_array);

$result = nilai_terbesar_kedua($random_array);
echo "Nilai terbesar kedua: " . $result . PHP_EOL;

?>