<?php

// Fungsi untuk menampilkan jadwal pelajaran berdasarkan hari
function tampilkanJadwal($hari) {
    switch ($hari) {
        case 'Senin':
            $jadwal = ["Agama", "Sejarah", "Web"];
            break;
        case 'Selasa':
            $jadwal = ["Pkkwu", "Web"];
            break;
        case 'Rabu':
            $jadwal = ["Kejuruan", "Matematika"];
            break;
        case 'Kamis':
            $jadwal = [ "Bk", "Matpil", "Bahasa Inggris"];
            break;
        case 'Jumat':
            $jadwal = ["Olahraga", "Basis Data", "Pancasila"];
            break;
        default:
            $jadwal = [];
            echo "Hari tidak valid\n";
    }

    return $jadwal;
}

// Main program
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hari_ini = isset($_POST['hari']) ? $_POST['hari'] : '';
} else {
    $hari_ini = date('l');
}

echo "<h2>Jadwal pelajaran untuk hari ini ($hari_ini):</h2>";

$jadwal_hari_ini = tampilkanJadwal($hari_ini);

if (!empty($jadwal_hari_ini)) {
    echo "<ul>";
    for ($i = 0; $i < count($jadwal_hari_ini); $i++) {
        echo "<li>$jadwal_hari_ini[$i]</li>";
    }
    echo "</ul>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Pelajaran</title>
</head>
<body>

<!-- Form untuk memilih hari -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="hari">Pilih Hari:</label>
    <select name="hari" id="hari">
        <option value="Senin">Senin</option>
        <option value="Selasa">Selasa</option>
        <option value="Rabu">Rabu</option>
        <option value="Kamis">Kamis</option>
        <option value="Jumat">Jumat</option>
    </select>
    <button type="submit">Tampilkan Jadwal</button>
</form>

</body>
</html>
