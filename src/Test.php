<?php


abstract class Test
{
    public function dodaj(int $a)
    {
        return $a;
    }
}

class BTest extends Test
{

}

$a = new BTest();
var_dump($a->dodaj(1));
