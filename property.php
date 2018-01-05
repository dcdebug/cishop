<?php

   function p($var){
       echo "<pre>";
       print_r($var);
   }
    $a = array("a","b"=>"c");

    p($a);
    p((object)$a);

    var_dump(property_exists((object)$a,'0'));
    var_dump(property_exists((object)$a,'b'));