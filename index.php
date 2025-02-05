<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST["number"];
    $allowedNumbers = [
        "#####" => "/#####/",
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
    <h1 style="text-align: center;">利用方法</h1>
    <button class="riyou" onclick="changeImage('/explanation/pc.jpg')">パソコン</button>
    <button class="riyou" onclick="changeImage('/explanation/android.jpg')">Android</button>
    <button class="riyou" onclick="changeImage('/explanation/ios.jpg')">iOS</button>
    <br>
    <img id="changeImage" class="im" src="/explanation/pc.jpg" alt="画像" width="300">
    <br>
    <input type="button" class="custom-button" onclick="location.href='https://docs.google.com/forms/d/e/1FAIpQLSdGun76ECY0vy4_xvZzu4PW6tCmsFAbjMPWVZ2cStLGJqZj5A/viewform?usp=dialog'" value="お問い合わせ">
    <script>
        function changeImage(imageSrc) {
            document.getElementById("changeImage").src = imageSrc;
        }
    </script>
</body>
</html>
