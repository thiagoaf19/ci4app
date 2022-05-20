<?php

namespace App\Controllers;

class Produtos extends BaseController
{
    public function index() //método padrão
    {
        //localhost/ci4app/public/index.php/produtos/
        $data['titulo'] = "Gerenciar produtos";
        return view('produtos_index', $data);
    }

    // Método detalhes que chama no parâmetro 'código do produto'
    // http://localhost/ci4app/public/index.php/produtos/detalhes/999
    public function detalhes($produto_id)
    {
        $data['produto_id'] = $produto_id;
        $data['titulo'] = 'Produto ' . $produto_id; // concatena
        return view('produtos_detalhes', $data);
        //echo "<h1>Método exibindo detalhes do produto $produto_id </h1>";
    }
    
}