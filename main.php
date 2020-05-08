<?php
include 'tree.php';
$text = " sdes ryba text";

$array = str_split($text,1);
$slovar[$array[0]] = 0;
foreach ($array as $el){
    if(empty($slovar[$el]))$slovar[$el] = 0;
     $slovar[$el]++;
}
//asort($slovar);
//в порядке возрастания
$tree = new tree();
foreach ( $slovar as $key => $el ){
    $tree->setListokQueue(new lestok($key,$el));
}
$tree->generateThree();
var_dump($tree);
$tree->printThree();
//print_r($slovar);