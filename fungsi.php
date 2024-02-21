<?php 

function generateToken($user){
    static $tokenStroage = [];

    if(!isset($tokenStroage[$user])) {
        $tokenStroage[$user] = [];
    }

    if (count($tokenStorage[$user]) >= 10) {
        array_shift($tokenStorage[$user]);
    }

    $newToken = generateRandomString();

    $tokenStorage[$user][] = $newToken;

    return $newToken;
}

function verifyToken($user, $token)
{
    // Mengecek apakah user memiliki entry dalam array
    if (isset($tokenStorage[$user])) {
        // Mengecek apakah token ditemukan dalam array
        $key = array_search($token, $tokenStorage[$user]);
        if ($key !== false) {
            // Hapus token dari array
            unset($tokenStorage[$user][$key]);
            // Return true karena token valid
            return true;
        }
    }

    // Return false jika token tidak ditemukan atau user tidak memiliki entry dalam array
    return false;
}

// Fungsi untuk generate random string
function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}

// Contoh penggunaan
$user = "Pengguna1";

// Generate token
$token1 = generateToken($user);
$token2 = generateToken($user);

// Output token yang di-generate
echo "Token 1: $token1\n";
echo "Token 2: $token2\n";

// Verifikasi token (contoh dengan token1)
$result = verifyToken($user, $token1);

// Output hasil verifikasi
if ($result) {
    echo "Token 1 valid.\n";
} else {
    echo "Token 1 tidak valid atau tidak ditemukan.\n";
}

// Verifikasi token (contoh dengan token1 setelah dipakai)
$result = verifyToken($user, $token1);

// Output hasil verifikasi
if ($result) {
    echo "Token 1 valid.\n";
} else {
    echo "Token 1 tidak valid atau tidak ditemukan.\n";
}

?>