<?php

    require_once('./vendor/autoload.php');

    use PHPUnit\Framework\TestCase;

    use app\model\dto\Produto;
    use app\model\dao\ProdutoDAOMySQL;
    use app\model\bo\ProdutoBO;
    use app\model\interfaces\IPersistenciaProduto;
    
    class UnitTestCRUDProduto extends TestCase{

        public function testInserirProduto(){

            $produtoDAO = new ProdutoDAOMySQL();
            $produtoBO = new ProdutoBO($produtoDAO);

            $produto = (new Produto())->setProdutoDescricao('MARTELO')
                                    ->setProdutoValor(123)
                                    ->setProdutoImagem('123');

            $result = $produtoBO->inserir($produto);
            $this->assertEquals(true, $result);

        }

        public function testAlterarProduto(){

            $produtoDAO = new ProdutoDAOMySQL();
            $produtoBO = new ProdutoBO($produtoDAO);

            $produto = (new Produto())->setProdutoCodigo(1)
                                    ->setProdutoDescricao('GELADEIRA')
                                    ->setProdutoValor(123)
                                    ->setProdutoImagem('123');

            $result = $produtoBO->alterar($produto);
            $this->assertEquals(true, $result);

        }

        public function testDeletarProduto(){

            $produtoDAO = new ProdutoDAOMySQL();
            $produtoBO = new ProdutoBO($produtoDAO);

            $produto = (new Produto())->setProdutoCodigo(1);

            $result = $produtoBO->deletar($produto);
            $this->assertEquals(true, $result);

        }

    }
    
?>