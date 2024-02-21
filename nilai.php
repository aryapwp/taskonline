<?php

class Nilai {
    public $mapel;
    public $nilai;

    public function __construct($mapel, $nilai) {
        $this->mapel = $mapel;
        $this->nilai = $nilai;
    }
}

class Siswa {
    public $nrp;
    public $nama;
    public $daftarNilai = [];

    public function __construct($nrp, $nama) {
        $this->nrp = $nrp;
        $this->nama = $nama;
    }

    public function tambahNilai($mapel, $nilai) {
        $nilaiObj = new Nilai($mapel, $nilai);
        $this->daftarNilai[] = $nilaiObj;
    }
}

// a. Membuat daftarNilai berisi class Nilai
$daftarNilai = [];

// b. Membuat siswa baru dan set mapel menjadi inggris dan nilainya 100
$siswaBaru = new Siswa("NRP001", "Nurul Astiawati");
$siswaBaru->tambahNilai("Inggris", 100);

// c. Generate 10 siswa dengan nama random string 10 char, mapel dirandom antara inggris, indonesia, jepang. Nilai dengan random antara 0 - 100.
for ($i = 1; $i <= 10; $i++) {
    $namaSiswa = generateRandomString(10);
    $mapelRandom = ["Inggris", "Indonesia", "Jepang"][array_rand(["Inggris", "Indonesia", "Jepang"])];
    $nilaiRandom = rand(0, 100);

    $siswa = new Siswa("NRP" . str_pad($i, 3, "0", STR_PAD_LEFT), $namaSiswa);
    $siswa->tambahNilai($mapelRandom, $nilaiRandom);

    $daftarNilai[] = $siswa;
}

// Helper function untuk generate random string
function generateRandomString($length = 10) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}

// Menampilkan hasil
echo "Siswa Baru:<br />" ;
echo "NRP: " . $siswaBaru->nrp . ", Nama: " . $siswaBaru->nama . "<br />";
echo "Daftar Nilai:" ."<br />";
foreach ($siswaBaru->daftarNilai as $nilai) {
    echo "- Mapel: " . $nilai->mapel . ", Nilai: " . $nilai->nilai . "<br />";
}

echo "<br />"."Daftar 10 Siswa:" ."<br />";
foreach ($daftarNilai as $siswa) {
    echo "NRP: " . $siswa->nrp . ", Nama: " . $siswa->nama ."<br />";
    echo "Daftar Nilai:" ."<br />";
    foreach ($siswa->daftarNilai as $nilai) {
        echo "- Mapel: " . $nilai->mapel . ", Nilai: " . $nilai->nilai ."<br />";
    }
    echo "<br />";
}
?>
