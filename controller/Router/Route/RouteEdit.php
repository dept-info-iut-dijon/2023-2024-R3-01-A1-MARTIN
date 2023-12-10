<?php
    require_once("controller/Router/Route.php");
    class RouteEdit extends Route {
        private PokemonController $controller;
        public function __construct($controller){
            $this->controller = $controller;
        }

        function get($params = []){
            if(isset($params["idPokemon"])){
            $this->controller->displayEdit();
            }
        }

        function post($params = []){
        }
    }
?>