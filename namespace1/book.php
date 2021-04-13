<?php
namespace Publishers\Packt;

class Book{
    public function get() : string
    {
        return get_class();
    }
}