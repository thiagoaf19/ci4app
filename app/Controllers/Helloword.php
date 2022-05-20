<?php

namespace App\Controllers;

class Helloword extends BaseController
{
    public function index()
    {
        echo '<h1>Hello Word</h1>';
    }

    public function hellopersonal($nome){
        echo "<h1>Hello, $nome !</h1>";
    }
}