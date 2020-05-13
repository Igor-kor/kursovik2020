<?php

class tree
{
    var $lestoks;
    var $table;

    function __construct()
    {
        $this->lestoks = array();
        $this->table = array();
    }

    function setLestok($symbol, $value)
    {
        $this->lestoks[] = new lestok($symbol, $value);
    }

    // гененрируем дерево из листков выстраивая их
    function generateThree($text)
    {
        // подсчет
        $array = str_split($text, 1);
        $slovar[$array[0]] = 0;
        foreach ($array as $el) {
            if (empty($slovar[$el])) $slovar[$el] = 0;
            $slovar[$el]++;
        }

        // создаем сортированный список по весам
        foreach ($slovar as $key => $el) {
            $this->setListokQueue(new lestok($key, $el));
        }

        // формируем дерево
        while (count($this->lestoks) > 1) {
            $lestokleft = $this->lestoks[count($this->lestoks) - 1];
            $lestokright = $this->lestoks[count($this->lestoks) - 2];
            unset($this->lestoks[count($this->lestoks) - 1]);
            unset($this->lestoks[count($this->lestoks) - 1]);
            $this->setListokQueue(new lestok(null, $lestokleft->listval + $lestokright->listval, $lestokleft, $lestokright));
        }
    }

    function generateTable()
    {
        // необходим ассоциативный массив , функция возвращает индесы неправильно
        $this->table =  $this->lestoks[0]->getArray("");
    }

    // вставляем в очередь наш листок
    function setListokQueue($lestok)
    {
        $tempLestoks = array();
        if (empty($this->lestoks)) {
            $tempLestoks[] = $lestok;
        } else {
            $setlest = false;
            for ($i = 0; $i < count($this->lestoks); $i++) {
                if ($lestok->listval >= $this->lestoks[$i]->listval && $setlest == false) {
                    $tempLestoks[] = $lestok;
                    $setlest = true;
                }
                $tempLestoks[] = $this->lestoks[$i];
            }
            if ($setlest == false) {
                $tempLestoks[] = $lestok;
            }
        }
        $this->lestoks = $tempLestoks;
    }

    function printThree()
    {
        foreach ($this->lestoks as $el) {
            $el->printLestok();
        }
    }

    // кодируем текст по таблице
    function encode($text)
    {
        $array = str_split($text, 1);
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
        $ptr = $this->lestoks[0];
        foreach ($array as $el) {
            if ($el == "0") {
                $ptr = $ptr->nextlestokleft;
                if (!is_null($ptr->symbol)) {
                    $decodeText .= $ptr->symbol;
                    $ptr = $this->lestoks[0];
                }
            } else {
                $ptr = $ptr->nextlestokright;
                if (!is_null($ptr->symbol)) {
                    $decodeText .= $ptr->symbol;
                    $ptr = $this->lestoks[0];
                }
            }
        }
        return $decodeText;
    }

}

class lestok
{
    var $symbol;
    var $listval;
    var $nextlestokleft;
    var $nextlestokright;

    function __construct($symbol, $value, $nextlestokleft = null, $nextlestokright = null)
    {
        $this->symbol = $symbol;
        $this->listval = $value;
        $this->nextlestokleft = $nextlestokleft;
        $this->nextlestokright = $nextlestokright;
    }

    function printLestok()
    {
        echo $this->symbol;
        echo $this->listval;
        echo "<br>";
        if (!is_null($this->nextlestokleft)) $this->nextlestokleft->printLestok();
        if (!is_null($this->nextlestokright)) $this->nextlestokright->printLestok();
    }

    // получаем таблицу из всех вложенных элементов дерева(вызывать функцию из корневого элемента)
    function getArray($value)
    {
        if (!is_null($this->symbol)) {
            // небольшой костыль для принудительного формирования ассоциативного массива, иначе плохо работает с числами
            return array($this->symbol."o" => $value);
        }
        return array_merge($this->nextlestokleft->getArray($value . "0"), $this->nextlestokright->getArray($value . "1"));
    }

}