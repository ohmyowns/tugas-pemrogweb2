<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tabel Perkalian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        table {
            border-collapse: collapse;
            margin: 20px auto;
        }
        td, th {
            border: 1px solid black;
            padding: 8px 12px;
            text-align: center;
        }
        th {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

    <h2>Tabel Perkalian 1 - 10</h2>

    <table>
        <tr>
            <th>x</th>
            <?php
            for ($i = 1; $i <= 10; $i++) {
                echo "<th>$i</th>";
            }
            ?>
        </tr>

        <?php
        for ($baris = 1; $baris <= 10; $baris++) {
            echo "<tr>";
            echo "<th>$baris</th>";

            for ($kolom = 1; $kolom <= 10; $kolom++) {
                $hasil = $baris * $kolom;
                echo "<td>$hasil</td>";
            }

            echo "</tr>";
        }
        ?>
    </table>

</body>
</html>