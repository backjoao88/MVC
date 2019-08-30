<?php

    namespace app\model\dto;

    class Produto{

        private $produtoCodigo;
        private $produtoDescricao;
        private $produtoValor;
        private $produtoImagem;

        public function getProdutoCodigo(){
            return $this->produtoCodigo;
        }

        public function setProdutoCodigo($produtoCodigo){
            $this->produtoCodigo = $produtoCodigo;
            return $this;
        }

        public function getProdutoDescricao(){
            return $this->produtoDescricao;
        }

        public function setProdutoDescricao($produtoDescricao){
            $this->produtoDescricao = $produtoDescricao;
            return $this;
        }

        public function getProdutoValor(){
            return $this->produtoValor;
        }

        public function setProdutoValor($produtoValor){
            $this->produtoValor = $produtoValor;
            return $this;
        }

        public function getProdutoImagem(){
            return $this->produtoImagem;
        }

        public function setProdutoImagem($produtoImagem){
            $this->produtoImagem = $produtoImagem;
            return $this;
        }

        public function __toString(){
            return 
            "   Produto: [codigo=" . $this->getProdutoCodigo() . ", 
                          descricao=" . $this->getProdutoDescricao() . ", 
                          valor=" . $this->getProdutoValor() . ", 
                          imagem=" . $this->getProdutoImagem() . "]
            ";
            
        }

    }