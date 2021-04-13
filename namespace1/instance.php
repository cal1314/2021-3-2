<?php
require "book.php";
require "ebook.php";
require "video.php";
require "presentation.php";
require "functions.php";
require "contants.php";
try{
    //Instanctiate
    $book = new Publishers\Packt\Book();
    print_r("<br>");
    $ebook = new Publishers\Packt\Ebook();
    print_r("<br>");
    $video = new Publishers\Packt\Video();
    print_r("<br>");
    $presentation = new Publishers\Packt\Presentation();
    print_r("<br>");
    //use functions in namespace

    echo Publishers\Packt\getBook();
    print_r("<br>");
    echo Publishers\Packt\saveBook('PHP 7 High Performance');
    print_r("<br>");
    //use constants

    echo Publishers\Packt\COUNT;
    print_r("<br>");
    echo Publishers\Packt\KEY;
    print_r("<br>");
}catch(Exception $e){
    error_log("error",3);
}



