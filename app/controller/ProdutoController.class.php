<?php

    namespace app\controller;

    use core\AbsController;
    use app\model\dao\ProdutoDAOMySQL;
    use app\model\bo\ProdutoBO;
    use app\model\dto\Produto;

    use core\Redirecionador;

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
            $produtoDAO = new ProdutoDAOMySQL();
            $produtoBO  = new ProdutoBO($produtoDAO);
            $descricao = isset($request->post->editProdutoDescricao) ? $request->post->editProdutoDescricao : "";
            $valor     = isset($request->post->editProdutoValor) ? $request->post->editProdutoValor : 0;
            $produto = $produtoBO->procurarProdutoPorId((new Produto())->setProdutoCodigo($id));
            $produto->setProdutoDescricao($descricao)->setProdutoValor($valor);
            $produtoBO->alterar($produto);
            Redirecionador::paraARota('/produtos');
        }

        public function deletar($id) {
            $produtoDAO = new ProdutoDAOMySQL();
            $produtoBO  = new ProdutoBO($produtoDAO);
            $produto = (new Produto())->setProdutoCodigo($id);
            $produtoBO->deletar($produto);
            Redirecionador::paraARota('/produtos');
        }

        public function cadastrar() {
            $this->requisitarView('produtos/cadastrar', 'baseHtml');
        }

        public function inserir($request) {
            echo var_dump($request);
            echo var_dump($_FILES);

            if($_FILES['imagem']['size'] && getimagesize($_FILES["imagem"]["tmp_name"]) && is_uploaded_file($_FILES['imagem']['tmp_name']))
            {
                $imagem = file_get_contents($_FILES['imagem']['tmp_name']);
            }

            $produtoBO  = new ProdutoBO((new ProdutoDAOMySQL()));

            $produto = (new Produto())
                ->setProdutoDescricao(isset($request->post->descricao) ? $request->post->descricao : "")
                ->setProdutoValor(isset($request->post->valor) ? $request->post->valor : 0)
                ->setProdutoImagem(isset($imagem) ? $imagem : "");
            
            $_POST['sucesso'] = $produtoBO->inserir($produto);;
            $this->requisitarView('produtos/cadastrar', 'baseHtml');
        }
       
    }


?>