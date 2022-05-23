<?php namespace App\Controllers;

class Categorias extends BaseController {

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        $this->session = \Config\Services::session();
    }

    public function index () {

        //chamar uma view que exige todas as categorias
        $categoriaModel = new \App\Models\CategoriaModel();
        $data['categorias'] = $categoriaModel->find(); //todas categorias buscadas pelo método find
        $data['titulo'] = 'Listando todas as categorias';
        $data['msg'] = $this->session->getFlashdata('msg'); // automaticamente já limpa a sessão

        echo view('categorias', $data);
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

        echo view('categorias_form', $data);
    }

    public function editar ($id) {
        $data['titulo'] = 'Editar categoria ' . $id;
        $data['acao'] = 'Editar';
        $data['msg'] = '';    
        $categoriaModel = new \App\Models\CategoriaModel();
        $categoria = $categoriaModel->find($id);

        if($this->request->getMethod() === 'post') {
            //quando o form for submetido
            $categoria->nomecategoria = $this->request->getPost('nomecategoria');

            if($categoriaModel->update($id, $categoria)) {
                $data['msg'] = 'Categoria editada com sucesso!';
            }
            else {
                $data['msg'] = 'Erro ao editar categoria.';
            }
        }
        $data['categoria'] = $categoria;
        echo view('categorias_form', $data); // o inserir abre vazio para cadastrar e o editar abre ja com os dados cadastrados para editar\fwlink\
    }

    public function excluir ($id = null) {
        if(is_null($id)){
            // redirecionar a aplicação para o categorias/index
            //definir uma mensagem via session
            $this->session->setFlashdata('msg', 'Categoria não encontrada'); //criar uma variável na sessao, e quando acessar ela pela 1 vez ela é excluida, ela guarda.
            return redirect()->to('http://localhost/ci4app/public/categorias/');
        }
    }
}