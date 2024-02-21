<?php
function hitungKarakterTerbanyak($kata) {
    // Menghitung kemunculan setiap karakter dalam kata
    $hitungKarakter = array_count_values(str_split($kata));

    // Mencari karakter dengan kemunculan terbanyak
    $karakterTerbanyak = '';
    $jumlahMunculTerbanyak = 0;

    foreach ($hitungKarakter as $karakter => $jumlahMuncul) {
        if ($jumlahMuncul > $jumlahMunculTerbanyak) {
            $karakterTerbanyak = $karakter;
            $jumlahMunculTerbanyak = $jumlahMuncul;
        }
    }

    // Menghasilkan string output
    $output = $karakterTerbanyak . ' ' . $jumlahMunculTerbanyak . 'x';

    return $output;
}

// Contoh penggunaan
echo hitungKarakterTerbanyak("wellcome");  // Output: l 2x
echo hitungKarakterTerbanyak("strawberry");  // Output: r 2x
?>