<?php

namespace App\Controllers;

class Produtos extends BaseController
{
    public function index() //método padrão
    {
        //localhost/ci4app/public/index.php/produtos/
    }

    public function inserir() //método padrão
    {
        $data['titulo'] = 'Inserir novo produto';
        $data['acao'] = 'Inserir';
        $data['msg'] = '';
        $data['erros'] = '';

        
        if($this->request->getMethod() === 'post') { // para saber se aquele formulário foi ou não foi submetido
            // instanciamos o model e depois seta os valores     
            $produtoModel = new \App\Models\ProdutoModel(); // se foi submetido vai criar uma instância do produto model, vai setar os valores a serem salvos (o valor e a categoria) ai chama método insert para inserir no BD.
            $dadosProduto = $this->request->getPost(); // não precisa colocar 10 vezes o mesmo código (se tiver 10 colunas) - getPost retorna todos os dados
            
            if($produtoModel->insert($dadosProduto)){
                // deu certo
                $data['msg'] = 'Produto inserido com sucesso';
            }
            else{
                // deu errado
                $data['msg'] = 'Erro ao inserir produto';
                $data['erros'] = $produtoModel->errors();

            }   
        }          

        //combo para exibir as categoria
        $categoriaModel = new \App\Models\CategoriaModel();
        $listaCategoria = $categoriaModel->findAll(); // busca de todas categorias e retornar elas dentro do lista categorias
        // Para montar combobox - helper chamado form
        helper('form'); //nome do helper que quero importar
        $arrayCategorias = [];
        foreach ($listaCategoria as $categoria) {
            // cria uma posição nova no meu array categorias aonde o indice é o id da categoria = e o valor da posição é o nome
            // como monta a combo, ele submete o id mas mostra o nome em vez do id.
            $arrayCategorias[$categoria->id] = $categoria->nomecategoria;
        }
        // 1º parâmetro: nome da combobox - 2º parâmetro: array-o indice do array vai ser um value - transformar em um array -- $listaCategoria é objeto
        // variável $comboCategorias vai passar pra view
        $data['comboCategorias'] = form_dropdown('categoria_id', $arrayCategorias); // colocou 'comboCategorias' dentro de uma variável array chamada $data como sendo uma posição do array

        echo view('produtos_form', $data);
    }
    
    
    // Método detalhes que chama no parâmetro 'código do produto'
    // http://localhost/ci4app/public/index.php/produtos/detalhes/999
    /*
    public function detalhes($produto_id)
    {
        $data['produto_id'] = $produto_id;
        $data['titulo'] = 'Produto ' . $produto_id; // concatena
        return view('produtos_detalhes', $data);
        //echo "<h1>Método exibindo detalhes do produto $produto_id </h1>";
    }*/
    
}