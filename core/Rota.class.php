<?php

    namespace core;

    class Rota{

        private $rotas;

        public function __construct(array $rotas){
            $this->setRotas($rotas);
            $this->execController();
        }

        private function setRotas($rotas){
            $r= [];
            foreach($rotas as $rota){
                $explode = explode('@', $rota[1]);
                $r = [$rota[0], $explode[0], $explode[1]];
                $novasRotas[] = $r;
            }   
            $this->rotas = $novasRotas;
        }
        
        private function getURL(){
            return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        }

        private function getControllerEActionDaRota(){
            $param = [];
            $encontrado = false;
            $url = $this->getUrl();
            $urlArray = explode('/', $url); 

            foreach($this->rotas as $rota){
                $arrayRota = explode('/', $rota[0]);
                $param = [];
                for ($i = 0; $i < count($arrayRota); $i++){
                    // Se o Count de valores passados da URL atual for igual ao da rota no array e se
                    // o valor da rota do array tiver { então é um parâmetro
                    if((strpos($arrayRota[$i], "{") !== false) && (count($urlArray) == count($arrayRota))){
                        $arrayRota[$i]  = $urlArray[$i]; // passa o valor presente na URL para o array da rota
                        $param[]        = $urlArray[$i]; // add o parametro no array param
                    }
                    $rota[0] = implode($arrayRota, '/'); // junta todos os elementos com / denovo
                }
                if($url == $rota[0]){ // se a rota atual for igual a gerada então foi encontrado
                    $controller = $rota[1];
                    $action     = $rota[2];
                    return [$controller, $action, $param];
                }else{
                    // redirect to page not found
                }
            }
        }
  
        private function execController(){

            $configs = $this->getControllerEActionDaRota();

            $nomeController           = $configs[0];
            $nomeMetodoController     = $configs[1];
            $arrayParametros          = $configs[2];

            if($encontrado){
                $controller = ControllerUtil::newController($nomeController);
                switch(count($param)){
                    case 1:
                        $controller->$nomeMetodoController($arrayParametros[0]);
                        break;
                    case 2:
                        $controller->$nomeMetodoController($arrayParametros[0], $arrayParametros[1]);
                        break;
                    case 3:
                        $controller->$nomeMetodoController($arrayParametros[0], $arrayParametros[1], $arrayParametros[2]);
                        break;
                    default:
                        $controller->$nomeMetodoController();
                        break;
                }
            }
        }
        
    }

?>