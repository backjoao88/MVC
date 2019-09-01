<?php

    namespace app\controller;

    use core\AbsController;
    use app\model\dao\ProdutoDAOMySQL;
    use app\model\bo\ProdutoBO;
    use app\model\dto\Produto;

    class ProdutoController extends AbsController{

        public function index(){
            $produtoDAO = new ProdutoDAOMySQL();
            $produtoBO  = new ProdutoBO($produtoDAO);
            $produtos    = $produtoBO->listar();
            $this->view->produtos = $produtos;
            $this->requisitarView('produtos/index', 'baseHtml');
        }

        public function listar($id){

            $produtoDAO = new ProdutoDAOMySQL();
            $produtoBO  = new ProdutoBO($produtoDAO);

            $prod       = (new Produto())->setProdutoCodigo($id);

            $produto    = $produtoBO->procurarProdutoPorId($prod);

            $this->view->produto = $produto;

            $this->requisitarView('produtos/listar', 'baseHtml');
        }

        public function atualizar($id, $request){
            echo $request->post->editProdutoDescricao;
            echo $request->post->editProdutoValor;
        }

        public function cadastrar() {
            $this->requisitarView('produtos/cadastrar', 'baseHtml');
        }

        public function inserir($request) {
            echo var_dump($request);

            echo $request->post->descricao;

            $produtoBO  = new ProdutoBO((new ProdutoDAOMySQL()));

            $produto = (new Produto())
                ->setProdutoDescricao(isset($request->post->descricao) ? $request->post->descricao : "")
                ->setProdutoValor(isset($request->post->valor) ? $request->post->valor : 0)
                ->setProdutoImagem(isset($request->post->imagem) ? $request->post->imagem : "");
            
            echo $produtoBO->inserir($produto);
        }
        
    }


?>