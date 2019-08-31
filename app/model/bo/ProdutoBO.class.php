<?php

    namespace app\model\bo;

    use app\model\interfaces\IPersistenciaProduto;
    use app\model\dao\ProdutoDAO;
    use app\model\dto\Produto;

    class ProdutoBO implements IPersistenciaProduto{

        private $produtoDAO;

        public function __construct(IPersistenciaProduto $produtoDAO){
            $this->produtoDAO = $produtoDAO;
        }
        
        public function inserir(Produto $produto){
            return $this->produtoDAO->inserir($produto);
        }
        public function alterar(Produto $produto){
            return $this->produtoDAO->alterar($produto);
        }
        public function deletar(Produto $produto){
            return $this->produtoDAO->deletar($produto);
        }
        public function procurarProdutoPorId(Produto $produto){
            return $this->produtoDAO->procurarProdutoPorId($produto);
        }    
        public function listar(){
            return $this->produtoDAO->listar();
        }

    }

?>