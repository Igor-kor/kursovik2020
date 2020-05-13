<html>
<head>
    <title> Игорь Шарангия, курсовая работа 2020 </title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<p> Курсовой проект Коды Хаффмана<br>
    Автор: Игорь Шарангия<br>
    Github: <a href="https://github.com/Igor-kor/kursovik2020.git">https://github.com/Igor-kor/kursovik2020.git</a><br>
</p>
<?php
// todo Переделать на пост запросы, сервак не может обработать слишком длинные запросы
error_reporting(0);
include 'tree.php';
$text = " Игорь Шарангия, курсовая работа 2020 ";
if (!empty($_POST["encode"] || !empty($_POST["decode"]))) {
    $text = $_POST["text"];
}
if (!empty($_POST["decode"])) {
    $tree = unserialize(base64_decode($_POST["textsource"]));
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

<form action="" method="post">
    <input name="text" type="text" value="<?php echo $text ?>">
    <input class="smbbutton" name="encode" type="submit" value="Закодировать">
</form>
<?php echo "Закодированная строка - <div class='boxtext'>" . $encodeText . "</div><br>"; ?>
<form action="" method="post">
    <input name="textcode" type="text" value="<?php echo empty($_POST["textcode"]) ? $encodeText : $_POST["textcode"] ?>">
    <input name="textsource" type="hidden" value="<?php echo base64_encode(serialize($tree)) ?>">
    <input name="text" type="hidden" value="<?php echo $text ?>">
    <input class="smbbutton" name="decode" type="submit" value="Раскодировать">
</form>

<?php
//декодируем текст
echo "Декодированная строка - <div class='boxtext'>" . $tree->decode($_POST["textcode"]) . "</div><br>";
echo "Сериализованное дерево для декодирования<br><div class='boxtext' >" . serialize($tree) . "</div>";
?>
</body>
</html>

