<?php
spl_autoload_register(function($classname){
    if(is_readable($classname.".php")){
        include __NAMESPACE__.$classname.".php";
    }
});