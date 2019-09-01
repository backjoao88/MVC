<?php

    $rota[] = ['/', 'HomeController@index'];
    $rota[] = ['/produtos', 'ProdutoController@index'];
    $rota[] = ['/produto/{id}/listar', 'ProdutoController@listar'];
    $rota[] = ['/produto/{id}/atualizar', 'ProdutoController@atualizar'];
    $rota[] = ['/produto/{id}/deletar', 'ProdutoController@deletar'];
    $rota[] = ['/produto/cadastrar', 'ProdutoController@cadastrar'];
    $rota[] = ['/produto/inserir', 'ProdutoController@inserir'];


    return $rota;

?>