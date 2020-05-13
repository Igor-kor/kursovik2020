<html>
<head>
    <title>kursovik 2020</title>
</head>
<body>

<?php
include 'tree.php';
$text = "just text";
$tree = new tree();
$tree->generateThree($text);
$tree->printThree();
$tree->generateTable();
$encodeText = $tree->encode($text);
echo "<br> Количество бит до сжатия(для 1 байтной кодировки): " . strlen($encodeText) * 8;
echo "<br> Количество бит после сжатия: " . strlen($encodeText) . "<br>" ;
echo "Закодированная строка - ". $encodeText . "<br>";
echo "Декодированная строка - " . $tree->decode($encodeText) . "<br>";

?>
</body>
</html>

