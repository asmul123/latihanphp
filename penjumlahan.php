<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjumlahan Sederhana</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .calculator {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        .calculator input[type="number"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .calculator input[type="submit"] {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        .calculator input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .result {
            margin-top: 15px;
            font-size: 18px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <h2>Penjumlahan Sederhana</h2>
        <form method="post">
            <input type="number" name="number1" placeholder="Masukkan angka pertama" required>
            <input type="number" name="number2" placeholder="Masukkan angka kedua" required>
            <input type="submit" value="Hitung">
        </form>
        <div class="result">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $number1 = $_POST['number1'];
                $number2 = $_POST['number2'];
                $result = $number1 + $number2;
                echo "Hasil penjumlahan: $number1 + $number2 = $result";
            }
            ?>
        </div>
    </div>
</body>
</html>
