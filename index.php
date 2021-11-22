<?php
include_once "config/Config.php";
include_once "modules/Database.php";
include_once "modules/Words.php";

if (isset($_POST['submit'])) {
    $words = new Words();
    $swearWordsArray = $words->read("*", "words", "word", 1);
    $raw_text = $_POST['rawInput'];
    $bad_words = $swearWordsArray;
    $filteredText = $words->replace($raw_text, $bad_words);
    echo $filteredText;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AntiSwear</title>
</head>

<body>

    <form action="" method="post">
        Zin: <input type="text" name="rawInput">
        <br>
        <br>
        <input type="submit" name="submit" value="Verstuur!">
    </form>

</body>

</html>