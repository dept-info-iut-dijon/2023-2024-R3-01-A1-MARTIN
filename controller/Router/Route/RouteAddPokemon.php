<?php
    require_once("controller/Router/Route.php");
    class RouteAddPokemon extends Route {
        private PokemonController $controller;
        public function __construct($controller){
            $this->controller = $controller;
        }

        function get($params = []){
            $this->controller->displayAddPokemon();
        }

        function post($params = []){
        }
    }
?>