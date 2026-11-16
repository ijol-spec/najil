<?php
$hasil = "";
$angka1 = "";
$angka2 = "";
$operator = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $angka1 = $_POST["angka1"];
    $angka2 = $_POST["angka2"];
    $operator = $_POST["operator"];

    if (is_numeric($angka1) && is_numeric($angka2)) {
        $a = (float) $angka1;
        $b = (float) $angka2;

        switch ($operator) {
            case "+":
                $hasil = $a + $b;
                break;
            case "-":
                $hasil = $a - $b;
                break;
            case "*":
                $hasil = $a * $b;
                break;
            case "/":
                if ($b != 0) {
                    $hasil = $a / $b;
                } else {
                    $hasil = "Tidak bisa dibagi nol!";
                }
                break;
            default:
                $hasil = "Operator tidak valid";
        }
    } else {
        $hasil = "Masukkan angka yang benar!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h2>Kalkulator Sederhana</h2>
        <p class="deskripsi">Kalkulator</p>

        <form method="POST" action="">
            <label>Angka Pertama</label>
            <input type="number" step="any" name="angka1"
                placeholder="Masukkan angka pertama"
                value="<?php echo htmlspecialchars($angka1); ?>"
                required>
            <label>Pilih Operator</label>
            <select name="operator">
                <option value="+" <?php if($operator == "+") echo "selected"; ?>>+</option>
                <option value="-" <?php if($operator == "-") echo "selected"; ?>>-</option>
                <option value="*" <?php if($operator == "*") echo "selected"; ?>>*</option>
                <option value="/" <?php if($operator == "/") echo "selected"; ?>>/</option>
            </select>

            <label>Angka Kedua</label>
            <input type="number" step="any" name="angka2"
                placeholder="Masukkan angka kedua"
                value="<?php echo htmlspecialchars($angka2); ?>"
                required>
            <button type="submit" name="hitung">Hitung</button>
            <a href="index.php" class="reset">Reset</a>
        </form>
        <?php if ($hasil !== ""): ?>
            <div class="hasil">
                <h3>Hasil Perhitungan</h3>
                <p><?php echo htmlspecialchars((string)$hasil); ?></p>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>