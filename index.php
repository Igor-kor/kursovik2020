<html>
<head>
    <title> Игорь Шарангия, курсовая работа 2020 </title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

<?php
// todo Переделать на пост запросы, сервак не может обработать слишком длинные запросы
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
<?php echo "Закодированная строка - <div class='boxtext'>" . $encodeText . "</div><br>"; ?>
<form action="">
    <input name="textcode" type="text" value="<?php echo empty($_GET["textcode"]) ? $encodeText : $_GET["textcode"] ?>">
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

