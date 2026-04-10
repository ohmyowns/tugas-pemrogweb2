<?php
$nilai1 = "";
$nilai2 = "";
$operator = "+";
$hasil = "";
$pesan = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nilai1 = $_POST["nilai1"];
    $nilai2 = $_POST["nilai2"];
    $operator = $_POST["operator"];

    if ($nilai1 === "" || $nilai2 === "") {
        $pesan = "Nilai I dan Nilai II harus diisi.";
    } elseif (!is_numeric($nilai1) || !is_numeric($nilai2)) {
        $pesan = "Input harus berupa angka.";
    } else {
        $nilai1 = (float)$nilai1;
        $nilai2 = (float)$nilai2;

        switch ($operator) {
            case "+":
                $hasil = $nilai1 + $nilai2;
                break;
            case "-":
                $hasil = $nilai1 - $nilai2;
                break;
            case "*":
                $hasil = $nilai1 * $nilai2;
                break;
            case "/":
                if ($nilai2 == 0) {
                    $pesan = "Pembagian dengan 0 tidak diperbolehkan.";
                } else {
                    $hasil = $nilai1 / $nilai2;
                }
                break;
            default:
                $pesan = "Operator tidak valid.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Latihan 3 PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 80px;
        }

        h2 {
            margin-bottom: 40px;
        }

        .form-box {
            display: inline-block;
            text-align: center;
        }

        .label-row {
            display: flex;
            justify-content: center;
            gap: 140px;
            margin-bottom: 10px;
            font-size: 26px;
            font-weight: bold;
            color: brown;
        }

        .input-row {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
        }

        input[type="text"], select {
            font-size: 18px;
            padding: 6px;
        }

        input[type="text"] {
            width: 220px;
        }

        button {
            font-size: 18px;
            padding: 6px 14px;
            cursor: pointer;
        }

        .hasil {
            margin-top: 40px;
            font-size: 24px;
            font-weight: bold;
            color: darkblue;
        }

        .error {
            margin-top: 40px;
            font-size: 20px;
            font-weight: bold;
            color: red;
        }
    </style>
</head>
<body>

    <h2>Buatlah tampilan di bawah ini</h2>

    <div class="form-box">
        <div class="label-row">
            <span>Nilai I</span>
            <span>Nilai II</span>
        </div>

        <form method="post" action="">
            <div class="input-row">
                <input type="text" name="nilai1" value="<?php echo htmlspecialchars((string)$nilai1); ?>">

                <select name="operator">
                    <option value="+" <?php if ($operator == "+") echo "selected"; ?>>+</option>
                    <option value="-" <?php if ($operator == "-") echo "selected"; ?>>-</option>
                    <option value="*" <?php if ($operator == "*") echo "selected"; ?>>*</option>
                    <option value="/" <?php if ($operator == "/") echo "selected"; ?>>/</option>
                </select>

                <input type="text" name="nilai2" value="<?php echo htmlspecialchars((string)$nilai2); ?>">

                <button type="submit">submit</button>
            </div>
        </form>
    </div>

    <?php if ($hasil !== ""): ?>
        <div class="hasil">
            Hasil: <?php echo $nilai1 . " " . $operator . " " . $nilai2 . " = " . $hasil; ?>
        </div>
    <?php endif; ?>

    <?php if ($pesan !== ""): ?>
        <div class="error">
            <?php echo $pesan; ?>
        </div>
    <?php endif; ?>

</body>
</html>