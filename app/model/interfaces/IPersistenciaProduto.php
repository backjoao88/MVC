<?php

    namespace app\model\interfaces;

    use app\model\dto\Produto;

    interface IPersistenciaProduto{

        public function inserir(Produto $produto);
        public function alterar(Produto $produto);
        public function deletar(Produto $produto);
        public function listar();
        
    }

?>