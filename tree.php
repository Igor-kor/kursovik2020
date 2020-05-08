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
    // неправильное обьединение, нужно обьеденять все за проход(а не 2 последних) пока не останется 1 элемент
    function generateThree(){
        while (count($this->lestoks) >1){
            $temp = $this->lestoks;
            for($i = count($temp)-1; $i >0; $i-=2){
                $lestokleft = $temp[$i];
                $lestokright = $temp[$i-1];
                unset($this->lestoks[$i]);
                unset($this->lestoks[$i]);
                $this->setListokQueue(new lestok(null,$lestokleft->listval+$lestokright->listval,$lestokleft,$lestokright));
            }
        }
    }

    function generateTable(){
        $this->table = array_merge($this->lestoks[0]->nextlestokleft->getArray("0",0),$this->lestoks[0]->nextlestokright->getArray("1",1));

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

    function getArray($value,$direction = 0){
        if(!is_null($this->symbol)){
            return array($this->symbol=>$value);
        }
//        if( $this->nextlestokright->notnull() && $direction == 0){
//            $temp = $this->nextlestokright;
//            $this->nextlestokright =  $this->nextlestokleft;
//            $this->nextlestokleft = $temp;
//        }
//        if( $this->nextlestokleft->notnull() && $direction == 1){
//            $temp = $this->nextlestokright;
//            $this->nextlestokright =  $this->nextlestokleft;
//            $this->nextlestokleft = $temp;
//        }
        return array_merge ( $this->nextlestokleft->getArray($value."0"), $this->nextlestokright->getArray($value."1"));
    }

    function notnull(){
        return !is_null($this->symbol);
    }

}