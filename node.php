<?php
class node
{
    var $symbol;
    var $nodeval;
    var $nextnodeleft;
    var $nextnoderight;
    var $idjs;

    function __construct($symbol, $value, $nextnodeleft = null, $nextnoderight = null)
    {
        $this->symbol = $symbol;
        $this->nodeval = $value;
        $this->nextnodeleft = $nextnodeleft;
        $this->nextnoderight = $nextnoderight;
    }

    // получаем таблицу из всех вложенных элементов дерева(вызывать функцию из корневого элемента)
    function getArray($value,array &$nodes)
    {
        array_push($nodes,$this);
        if (!is_null($this->symbol)) {
            // небольшой костыль для принудительного формирования ассоциативного массива, иначе плохо работает с числами
            return array($this->symbol."o" => $value);
        }
        return array_merge($this->nextnodeleft->getArray($value . "0",$nodes), $this->nextnoderight->getArray($value . "1",$nodes));
    }

}