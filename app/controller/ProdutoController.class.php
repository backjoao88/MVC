<?php

    namespace app\controller;

    use core\AbsController;

    class ProdutoController extends AbsController{

        public function index(){
            $this->requisitarView('produtos/index', 'baseHtml');
        }

        public function listar($id){
            $this->view->id = $id;
            $this->requisitarView('produtos/listar', 'baseHtml');
        }
        
    }


?>