<?php

class tree
{
    var $nodes;
    var $table;

    function __construct()
    {
        $this->nodes = array();
        $this->table = array();
    }

    function setnode($symbol, $value)
    {
        $this->nodes[] = new node($symbol, $value);
    }

    // гененрируем дерево из листков выстраивая их
    function generateTree($text)
    {
        // подсчет
        $array = mb_str_split($text, 1, 'UTF-8');;
        $slovar[$array[0]] = 0;
        foreach ($array as $el) {
            if (empty($slovar[$el])) $slovar[$el] = 0;
            $slovar[$el]++;
        }

        // создаем сортированный список по весам
        foreach ($slovar as $key => $el) {
            $this->setListokQueue(new node($key, $el));
        }

        // необходимо если символ всего 1
        if(count($slovar) == 1){
            $this->setListokQueue(new node('', 1));
        }

        // формируем дерево
        while (count($this->nodes) > 1) {
            $nodeeft = $this->nodes[count($this->nodes) - 1];
            $noderight = $this->nodes[count($this->nodes) - 2];
            unset($this->nodes[count($this->nodes) - 1]);
            unset($this->nodes[count($this->nodes) - 1]);
            $this->setListokQueue(new node(null, $nodeeft->nodeval + $noderight->nodeval, $nodeeft, $noderight));
        }
    }

    function generateTable()
    {
        // необходим ассоциативный массив , функция возвращает индесы неправильно
        $this->table =  $this->nodes[0]->getArray("");
    }

    // вставляем в очередь наш листок
    function setListokQueue($node)
    {
        $tempnodes = array();
        if (empty($this->nodes)) {
            $tempnodes[] = $node;
        } else {
            $setnode = false;
            for ($i = 0; $i < count($this->nodes); $i++) {
                if ($node->nodeval >= $this->nodes[$i]->nodeval && $setnode == false) {
                    $tempnodes[] = $node;
                    $setnode = true;
                }
                $tempnodes[] = $this->nodes[$i];
            }
            if ($setnode == false) {
                $tempnodes[] = $node;
            }
        }
        $this->nodes = $tempnodes;
    }

    // кодируем текст по таблице
    function encode($text)
    {
        $array =  mb_str_split($text, 1, 'UTF-8');;
        $archive = "";
        foreach ($array as $el) {
            // небольшой костыль для принудительного формирования ассоциативного массива
            $archive .= $this->table[$el."o"];
        }
        return $archive;
    }

    // декодируем текст по дерево
    function decode($text)
    {
        $array = str_split($text, 1);
        $decodeText = "";
        $ptr = $this->nodes[0];
        foreach ($array as $el) {
            if ($el == "0") {
                $ptr = $ptr->nextnodeleft;
                if (!is_null($ptr->symbol)) {
                    $decodeText .= $ptr->symbol;
                    $ptr = $this->nodes[0];
                }
            } else {
                $ptr = $ptr->nextnoderight;
                if (!is_null($ptr->symbol)) {
                    $decodeText .= $ptr->symbol;
                    $ptr = $this->nodes[0];
                }
            }
        }
        return $decodeText;
    }

}
