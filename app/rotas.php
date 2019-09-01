<?php

    $rota[] = ['/', 'HomeController@index'];
    $rota[] = ['/produtos', 'ProdutoController@index'];
    $rota[] = ['/produto/listar/{id}', 'ProdutoController@listar'];
    $rota[] = ['/produto/cadastrar', 'ProdutoController@cadastrar'];
    $rota[] = ['/produto/inserir', 'ProdutoController@inserir'];
    return $rota;

?>