<html>
<head>
    <title> Игорь Шарангия, курсовая работа 2020 </title>
    <style>
        .boxtext {
            border: 1px solid #333;
            box-shadow: 8px 8px 5px #444;
            padding: 8px 12px;
            width: 98%;
            white-space: nowrap;
            overflow: auto;
            background-color: burlywood;
        }
        input{
            padding-top: 10px;
            width: 100%;
        }
        .smbbutton{
            background-color: #32de4c;
        }
    </style>

</head>
<body>

<?php
error_reporting(0);
include 'tree.php';
$text = " Игорь Шарангия, курсовая работа 2020 ";
if (!empty($_GET["encode"] || !empty($_GET["decode"]))) {
    $text = $_GET["text"];
}
if (!empty($_GET["decode"])) {
    $tree = unserialize(base64_decode($_GET["textsource"]));
} else {
    $tree = new tree();
    // генерируем дерево
    $tree->generateThree($text);
    //генерируем таблицу
    $tree->generateTable();
}
// кодируем текст
$encodeText = $tree->encode($text);

echo "Исходный текст: " . $text;
echo "<br> Количество бит до сжатия(для 1 байтной кодировки): " . strlen($text) * 8;
echo "<br> Количество бит после сжатия (без учета дерева для декодирования): " . strlen($encodeText) . "<br>";

?>

<form action="">
    <input name="text" type="text" value="<?php echo $text ?>">
    <input class="smbbutton" name="encode" type="submit" value="Закодировать">
</form>
<?php echo "Закодированная строка - <div class='boxtext'>" . $encodeText . "</div><br>";?>
<form action="">
    <input name="textcode" type="text" value="<?php echo empty($_GET["textcode"])?$encodeText:$_GET["textcode"] ?>">
    <!--    тут вместо исходной строки нужно сериализовать дерево и восстановить его при декодировании -->
    <input name="textsource" type="hidden" value="<?php echo base64_encode(serialize($tree)) ?>">
    <input name="text" type="hidden" value="<?php echo $text ?>">
    <input class="smbbutton" name="decode" type="submit" value="Раскодировать">
</form>

<?php
//декодируем текст
echo "Декодированная строка - <div class='boxtext'>" . $tree->decode($_GET["textcode"]) . "</div><br>";

echo "Сериализованное дерево для декодирования<br><div class='boxtext' >" . serialize($tree) . "</div>";
?>
</body>
</html>

