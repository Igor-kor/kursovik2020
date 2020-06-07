<?php
use PHPUnit\Framework\TestCase;
include 'node.php';
include 'tree.php';

class test1 extends TestCase
{
    public function testCreate()
    {
        $text = "123";
        $tree = new tree();
        // генерируем дерево
        $tree->generateTree($text);
        //генерируем таблицу
        $tree->generateTable();
        $this->assertSame(count($tree->table),3);
    }

    public function testEncodeDecode()
    {
        $text = "Проверка генерации 1234!-=!☺☻♥abcd~{}[]*/\\|";
        $tree = new tree();
        $tree->generateTree($text);
        $tree->generateTable();
        $this->assertSame($tree->encode($text), "110110100111011111100010101001111001101111100011101010101110111010100110111111100110011100111000111101111110111111000001101000001000101101000011001000010100110001110100001001010100101101100011010111001111100001000110110");
        $this->assertSame($tree->decode($tree->encode($text)), "Проверка генерации 1234!-=!☺☻♥abcd~{}[]*/\\|");
    }

    public function testSymbols()
    {
        $text = "Проверка на нестандартные символы 👨👩‍🦱👸👷‍♂️💂‍♂️👨‍🌾👨‍🚒🦹‍♂️🧎‍♀️💃🛀🏄‍♂️👎🤞✌👏🙏";
        $tree = new tree();
        $tree->generateTree($text);
        $tree->generateTable();
        $this->assertSame($tree->decode($tree->encode($text)), "Проверка на нестандартные символы 👨👩‍🦱👸👷‍♂️💂‍♂️👨‍🌾👨‍🚒🦹‍♂️🧎‍♀️💃🛀🏄‍♂️👎🤞✌👏🙏");
    }
}