<?php
    class Student {

        protected  $_name;
        protected  $_email;


        public  function __call($name,$arguments){
            $action = substr($name,0,3);
            switch($action){
                case "get":
                    $property = '_'.strtolower(substr($name,3));
                    if(property_exists($this,$property)){
                        return $this->{$property};
                    }else{
                        echo "Undefined Property";
                        echo "<br/>";
                    }
                break;

                case "set":
                    $property = '_'.strtolower(substr($name,3));
                    if(property_exists($this,$property)){
                        $this->{$property} = $arguments[0];
                    }else{
                        echo "Undefinde Property !";
                        echo "<br/>";
                    }
                break;
                default:
                        echo "Not Have the Arguments";
                        echo "<br/>";
                        break;
            }
        }
    }

$s = new Student();
$s->setName("Darry Kinger ");

$s->setEmail("DarryKinger@gmail.com");

echo $s->getName();

echo $s->getEmail();