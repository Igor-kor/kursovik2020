<?php


class tree
{
    var $lestoks;
    var $table;

    function __construct() {
        $this->lestoks = array();
        $this->table = array();
    }

    function setLestok($symbol, $value){
       $this->lestoks[] = new lestok($symbol,$value);
    }

    // гененрируем дерево из готовых листков выстраивая их
    function generateThree(){
        while (count($this->lestoks) >1){
            $lestokleft = $this->lestoks[count($this->lestoks)-1];
            $lestokright = $this->lestoks[count($this->lestoks)-2];
            unset($this->lestoks[count($this->lestoks)-1]);
            unset($this->lestoks[count($this->lestoks)-1]);
            $this->setListokQueue(new lestok(null,$lestokleft->listval+$lestokright->listval,$lestokleft,$lestokright));
        }
    }

    function generateTable(){
        $this->table = $this->lestoks[0]->getArray("");
    }

    // вставляем в очередь наш листок
    function setListokQueue($lestok){
        $tempLestoks= array();
        if(empty($this->lestoks)){
            $tempLestoks[] = $lestok;
        }else{
            $setlest = false;
            for ($i = 0; $i < count($this->lestoks);$i++){
                $tempLestoks[] = $this->lestoks[$i];
                if($lestok->listval == $this->lestoks[$i]->listval && $setlest == false){
                    $tempLestoks[] = $lestok;
                    $setlest = true;
                }
            }
            if($setlest == false){
                $tempLestoks[] = $lestok;
            }
        }
        $this->lestoks = $tempLestoks;
    }

    function printThree(){
        foreach ($this->lestoks as $el){
            $el->printLestok();
        }
    }

}

class lestok
{
    var $symbol;
    var $listval;
    var $nextlestokleft;
    var $nextlestokright;

    function __construct($symbol, $value, $nextlestokleft = null, $nextlestokright = null){
        $this->symbol = $symbol;
        $this->listval = $value;
        $this->nextlestokleft = $nextlestokleft;
        $this->nextlestokright = $nextlestokright;
    }


    function printLestok(){
        echo $this->symbol;
        echo $this->listval;
        echo "<br>";
    }

    function getArray($value){
        if(!is_null($this->symbol)){
            return array($this->symbol=>$value);
        }
        return array_merge ( $this->nextlestokleft->getArray($value."0"), $this->nextlestokright->getArray($value."1"));
    }

}