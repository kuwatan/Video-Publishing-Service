<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST["number"];
    $allowedNumbers = [
        "58247" => "/58247/",
        "456" => "https://example.com/site2"
    ];

    if (array_key_exists($number, $allowedNumbers)) {
        header("Location: " . $allowedNumbers[$number]);
        exit();
    } else {
        echo "サイト番号が間違っています";
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>映像公開サイト</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post" class="search-form-1">
        <input type="number" name="number" placeholder="サイト番号を入力" style="width: 100%;">
        <button type="submit"></button>
    </form>
    <h2>hello</h2>
</body>
</html>
