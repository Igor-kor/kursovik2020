<html>
<head>
    <title> Игорь Шарангия, курсовая работа 2020 </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- START SIGMA IMPORTS -->
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/sigma.core.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/conrad.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/utils/sigma.utils.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/utils/sigma.polyfills.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/sigma.settings.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/classes/sigma.classes.dispatcher.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/classes/sigma.classes.configurable.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/classes/sigma.classes.graph.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/classes/sigma.classes.camera.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/classes/sigma.classes.quad.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/classes/sigma.classes.edgequad.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/captors/sigma.captors.mouse.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/captors/sigma.captors.touch.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/renderers/sigma.renderers.canvas.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/renderers/sigma.renderers.webgl.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/renderers/sigma.renderers.svg.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/renderers/sigma.renderers.def.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/renderers/canvas/sigma.canvas.labels.def.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/renderers/canvas/sigma.canvas.hovers.def.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/renderers/canvas/sigma.canvas.nodes.def.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/renderers/canvas/sigma.canvas.edges.def.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/renderers/canvas/sigma.canvas.edges.curve.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/renderers/canvas/sigma.canvas.edges.arrow.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/renderers/canvas/sigma.canvas.edges.curvedArrow.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/renderers/canvas/sigma.canvas.edgehovers.def.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/renderers/canvas/sigma.canvas.edgehovers.curve.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/renderers/canvas/sigma.canvas.edgehovers.arrow.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/renderers/canvas/sigma.canvas.edgehovers.curvedArrow.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/renderers/canvas/sigma.canvas.extremities.def.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/middlewares/sigma.middlewares.rescale.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/middlewares/sigma.middlewares.copy.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/misc/sigma.misc.animation.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/misc/sigma.misc.bindEvents.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/misc/sigma.misc.bindDOMEvents.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/src/misc/sigma.misc.drawHovers.js"></script>
    <!-- Sigma plugins -->
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/plugins/sigma.layout.forceAtlas2/supervisor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/plugins/sigma.layout.forceAtlas2/worker.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/plugins/sigma.renderers.edgeLabels/settings.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/plugins/sigma.renderers.edgeLabels/sigma.canvas.edges.labels.def.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/plugins/sigma.renderers.edgeLabels/sigma.canvas.edges.labels.curve.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sigma@1.2.1/plugins/sigma.renderers.edgeLabels/sigma.canvas.edges.labels.curvedArrow.js"></script>
</head>
<body>
<div class="grid-container">
    <div class="gridtitle"><p>
        <h1> Курсовая работа: Коды Хаффмана</h1>
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
        Данные для декодирования
        <textarea class='treetex' name="textsource"
                  form="decode"><?php echo base64_encode(serialize($tree)) ?></textarea>
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
    <div class="gridother3 boxshadow2">
        <p>Дерево</p>
        <div id="graph-container"></div>
        <script>
            var g = {
                nodes: [],
                edges: []
            };
            <?php
            $count = 1;
            $nodevaluemax = $tree->allnodes[0]->nodeval + 1;
            foreach ($tree->allnodes as $key => $node) {
                $label = "";
                $color = "#444";
                if (!is_null($node->symbol)) {
                    $label .= addslashes($node->symbol);
                    if (ord($node->symbol) < 14) {
                        $label = "spec[" . ord($node->symbol) . "]";
                    }
                    $color = "#f00";
                }
                $tree->allnodes[$key]->idjs = $count;
                $y = $nodevaluemax - $node->nodeval;
                $x = $count * ($nodevaluemax / count($tree->allnodes));
                echo "g.nodes.push({
                id: 'n' + $count,
                label: '' + '$label',
                x: $x,
                y: $y,
                size: 10,
                color: '$color'
                });";
                $count++;
            }
            $count = 1;
            foreach ($tree->allnodes as $node) {
                if (!is_null($node->nextnodeleft)) {
                    $idleft = $node->nextnodeleft->idjs;
                    echo " g.edges.push({
                id: 'e' + $count,
                label: '0',
                source: 'n' + $node->idjs,
                target: 'n' + $idleft,
                size: 10,
                color: '#444'
                });";
                    $count++;
                }

                if (!is_null($node->nextnoderight)) {
                    $idright = $node->nextnoderight->idjs;
                    echo " g.edges.push({
                id: 'e' + $count,
                label: '1',
                source: 'n' + $node->idjs,
                target: 'n' + $idright,
                size: 10,
                color: '#444',
                });";
                    $count++;
                }
            }
            ?>

            s = new sigma({
                graph: g,
                renderer: {
                    container: document.getElementById('graph-container'),
                    type: "canvas"
                },
                settings: {
                    edgeLabelSize: 'proportional',
                    minArrowSize: 10
                }
            });
        </script>
    </div>
</div>
</body>
</html>

