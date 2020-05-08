<?php
include 'tree.php';
$text = "prosto pizdec ooochen dlinnore soobshenie";

$array = str_split($text,1);
$slovar[$array[0]] = 0;
foreach ($array as $el){
    if(empty($slovar[$el]))$slovar[$el] = 0;
     $slovar[$el]++;
}
print_r($slovar);
//в порядке возрастания
$tree = new tree();
foreach ( $slovar as $key => $el ){
    $tree->setListokQueue(new lestok($key,$el));
}
$tree->generateThree();
$tree->generateTable();
print_r($tree->table);