<?php

    $rota[] = ['/', 'HomeController@index'];
    $rota[] = ['/produtos', 'ProdutoController@index'];
    $rota[] = ['/produto/{id}/listar', 'ProdutoController@listar'];
    $rota[] = ['/produto/{id}/atualizar', 'ProdutoController@atualizar'];
    return $rota;

?>