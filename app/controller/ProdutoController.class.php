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
        
    }


?>