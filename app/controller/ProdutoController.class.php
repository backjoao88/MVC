<?php

    namespace app\controller;

    use core\AbsController;

    class ProdutoController extends AbsController{

        public function index(){
            echo 'produtos - index';
        }

        public function listar($id){
            echo 'produto - listar - ' . $id;
        }
        
    }


?>