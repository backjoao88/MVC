<?php

    $rota[] = ['/', 'HomeController@index'];
    $rota[] = ['/produtos', 'ProdutoController@index'];
    $rota[] = ['/produto/listar/{id}', 'ProdutoController@listar'];
    return $rota;

?>