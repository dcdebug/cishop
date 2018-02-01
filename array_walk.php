<?php
    function p($arr){
        echo "<pre>";
        print_r($arr);
    }
    //Array_walk的用法
    $fruits = array("d"=>'lemon',"a"=>"orange",'b'=>'banana',"c"=>"apple");


    function test_alter(&$item,$key,$prefix){
        $item = "$prefix : $key : $item";
    }

    function test_print(&$item,$key){
        $item = "$key . $item <br/>";
    }

    echo "Before <br/>";
    p($fruits);
    array_walk($fruits,"test_print");
    p($fruits);
array_walk($fruits,"test_alter","userdata");
    p($fruits);


