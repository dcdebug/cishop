<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/1
 * Time: 14:52
 */

class test {
    private  $a;
    public  function __construct ()
    {
        $this->a =5;
    }

    function A(){
        $this->a = $this->a +5;
        echo $this->a;
    }

    function B(){
        echo $this->a." ::::";
    }
}

 $newTest = new test();
 $newTest ->A();
 $newTest ->B();
