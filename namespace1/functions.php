<?php
namespace Publishers\Packt;

function getBook() : string
{
    return 'PHP 7';
}
function saveBook(string $book) : string
{
    return $book.' is saved ';
}