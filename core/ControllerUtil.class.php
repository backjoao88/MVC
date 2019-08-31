<?php

    namespace core;

    class ControllerUtil{

        public static function newController($controller){
            $objController = "app\\controller\\" . $controller;
            return new $objController;
        }

        public static function page404(){
            if(file_exists(__DIR__ . "/../app/view/404.phtml")){
                return require_once __DIR__ . "/../app/view/404.phtml";
            }else{
                echo "Error 404: Page not found!";
            }
        }


    }


?>