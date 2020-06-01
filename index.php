<html>
<head>
    <title> Игорь Шарангия, курсовая работа 2020 </title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<div class="grid-container">
    <div class="gridtitle"><p>
        <h1> Курсовой проект Коды Хаффмана</h1>
        <h2> Автор: Игорь Шарангия</h2>
        Github: <a
                href="https://github.com/Igor-kor/kursovik2020.git">https://github.com/Igor-kor/kursovik2020.git</a><br>
        </p></div>

    <?php
    //error_reporting(0);
    include 'node.php';
    include 'tree.php';
    $text = "Игорь Шарангия, курсовая работа 2020 ";
    if (!empty($_POST["encode"]) || !empty($_POST["decode"])) {
        $text = $_POST["text"];
    }
    if (strlen($text) < 1) {
        $text = "Текст не может быть пустым";
    }
    if (!empty($_POST["decode"])) {
        $tree = unserialize(base64_decode($_POST["textsource"]));
    } else {
        $tree = new tree();
        // генерируем дерево
        $tree->generateTree($text);
        //генерируем таблицу
        $tree->generateTable();
    }
    // кодируем текст
    $encodeText = $tree->encode($text);
    ?>
    <div class="gridinfo">
        <?php
        echo "<br> Количество бит до сжатия: " . strlen($text) * 8;
        echo "<br> Количество бит после сжатия (без учета данных для декодирования): " . strlen($encodeText) . "<br>";

        ?>
    </div>
    <div class="gridencode boxshadow">
        <div class="encodebefore">
            <form id="encode" action="" method="post">
                <textarea aria-label="" class="inputtext" name="text"><?php echo $text; ?></textarea>
            </form>
        </div>
        <div class="encodeafter">
            Закодированная строка -
            <div class="boxtext"><?php echo $encodeText; ?></div>
        </div>
        <div class="encoderbutton">
            <input class="smbbutton boxshadowbutton" name="encode" type="submit"
                   value="Закодировать" form="encode">
        </div>
    </div>

    <div class="griddecode boxshadow">
        <div class="decodebefore">
            <form id="decode" action="" method="post">
                <textarea aria-label="" class="inputtext"
                          name="textcode"><?php echo empty($_POST["textcode"]) ? $encodeText : $_POST["textcode"]; ?></textarea>
                <input name="text" type="hidden" value="<?php echo $text; ?>">
            </form>
        </div>
        <div class="decodeafter">
            <?php echo "Декодированная строка - <div class='boxtext'>" . $tree->decode(empty($_POST["textcode"]) ? $encodeText : $_POST["textcode"]) . "</div>"; ?>
        </div>
        <div class="decodebutton">
            <input class="smbbutton boxshadowbutton" name="decode" type="submit" value="Раскодировать" form="decode">
        </div>
    </div>
    <div class="gridother boxshadow">
        <textarea class='treetex' name="textsource" form="decode"><?php echo base64_encode(serialize($tree)) ?></textarea>
    </div>
    <div class="gridother2 boxshadow">
        <div class='treetex'>
            <p>Таблица для кодирования</p>
            <?php
            foreach ($tree->table as $key => $el) {
                echo "символ[" . mb_substr($key, 0, -1) . "] код - " . $el . "<br>";
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>

