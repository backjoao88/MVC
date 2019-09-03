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
            $imagem = null;
            if($_FILES['fileImagem']['size'] && getimagesize($_FILES["fileImagem"]["tmp_name"]) && is_uploaded_file($_FILES['fileImagem']['tmp_name'])) {
                $imagem = addslashes($_FILES['fileImagem']['tmp_name']);
                $imagem = file_get_contents($imagem);
                $imagem = base64_encode($imagem);
            }

            $produtoDAO = new ProdutoDAOMySQL();
            $produtoBO  = new ProdutoBO($produtoDAO);
            $descricao = isset($request->post->editProdutoDescricao) ? $request->post->editProdutoDescricao : "";
            $valor     = isset($request->post->editProdutoValor) ? $request->post->editProdutoValor : 0;
            $produto = $produtoBO->procurarProdutoPorId((new Produto())->setProdutoCodigo($id));
            $produto->setProdutoDescricao($descricao)->setProdutoValor($valor);
            if ($imagem) {
                $produto->setProdutoImagem($imagem);
            }
            $result = $produtoBO->alterar($produto);
            Redirecionador::paraARota('/produtos?alterado=' . $result);
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
            if($_FILES['imagem']['size'] && getimagesize($_FILES["imagem"]["tmp_name"]) && is_uploaded_file($_FILES['imagem']['tmp_name'])) {
                // $imagem = addslashes(file_get_contents($_FILES['imagem']['tmp_name']));
                $imagem = addslashes($_FILES['imagem']['tmp_name']);
                $imagem = file_get_contents($imagem);
                $imagem = base64_encode($imagem);
            }

            $produtoBO  = new ProdutoBO((new ProdutoDAOMySQL()));

            $produto = (new Produto())
                ->setProdutoDescricao(isset($request->post->descricao) ? $request->post->descricao : "")
                ->setProdutoValor(isset($request->post->valor) ? $request->post->valor : 0)
                ->setProdutoImagem(isset($imagem) ? $imagem : "");
            
            $result = $produtoBO->inserir($produto);
            Redirecionador::paraARota('cadastrar?cadastrado=' . $result);
        }
       
    }


?>