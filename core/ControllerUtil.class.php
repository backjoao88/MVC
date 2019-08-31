<?php

    namespace core;

    class ControllerUtil{

        public static function newController($controller){
            $objController = "app\\controller\\" . $controller;
            return new $objController;
        }


    }


?>