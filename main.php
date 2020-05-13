<html>
<head>
    <title> Игорь шарангия, курсовая работа 2020 </title>
</head>
<body>

<?php
include 'tree.php';
$text = " Игорь шарангия, курсовая работа 2020 ";
$tree = new tree();
// генерируем дерево
$tree->generateThree($text);
//генерируем таблицу
$tree->generateTable();
// кодируем текст
$encodeText = $tree->encode($text);
echo "Исходный текст: " . $text;
echo "<br> Количество бит до сжатия(для 1 байтной кодировки): " . strlen($text) * 8;
echo "<br> Количество бит после сжатия: " . strlen($encodeText) . "<br>" ;
echo "Закодированная строка - ". $encodeText . "<br>";
//декодируем текст
echo "Декодированная строка - " . $tree->decode($encodeText) . "<br>";

?>
</body>
</html>

