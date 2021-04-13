<?php

require "Publishers/index.php";
require "Publishers/Packt/functions.php";
require "Publishers/Packt/contants.php";

use Publishers\Packt\Book;
use Publishers\Packt\Ebook;
use Publishers\Packt\Video;
use Publishers\Packt\Presentation;
use function Publishers\Packt\{ getBook,saveBook };
use const Publishers\Packt\{ COUNT,KEY };
try{
    //Instanctiate
    $book = new Book();
    print_r("<br>");
    $ebook = new Ebook();
    print_r("<br>");
    $video = new Video();
    print_r("<br>");
    $presentation = new Presentation();
    print_r("<br>");
    //use functions in namespace

    echo getBook();
    print_r("<br>");
    echo saveBook('PHP 7 High Performance');
    print_r("<br>");
    //use constants

    echo COUNT;
    print_r("<br>");
    echo KEY;
    print_r("<br>");
}catch(Exception $e){
    error_log("error",3);
}



