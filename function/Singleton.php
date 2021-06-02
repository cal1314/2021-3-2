<?php
class Singleton{

    private static $instance;

    private function __construct(){}

    private function __clone(){}

    public static function getInstance(){
        if(!self::$instance instanceof self){
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function test(){
        echo "我是一个单例方法";
        print_r("<br>");
    }
}
$obj1= Singleton::getInstance();
$obj2= Singleton::getInstance();
$obj3= Singleton::getInstance();

var_dump($obj1);
var_dump($obj2);
var_dump($obj3);

$obj1->test();
$obj2->test();
$obj3->test();