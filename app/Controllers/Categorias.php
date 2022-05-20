<?php namespace App\Controllers;

class Categorias extends BaseController {

    public function index () {

    //chamar uma view que exige todas as categorias

    }

    public function inserir () {
        $data['titulo'] = 'Inserir nova categoria';
        $data['acao'] = 'Inserir';
        $data['msg'] = '';

        if($this->request->getMethod() === 'post'){
            $categoriaModel = new \App\Models\CategoriaModel();
            $categoriaModel->set('nomecategoria', $this->request->getPost('nomecategoria'));
        
            if($categoriaModel->insert()){
                // deu certo
                $data['msg'] = 'Categoria inserida com sucesso';
            }
            else{
                // deu errado
                $data['msg'] = 'Erro ao inserir categoria';
            }    
        }



        echo View('categorias_form', $data);
    }
}