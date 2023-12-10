<?php
    require_once("controller/Router/Route.php");
    class RouteSearch extends Route {
        private PokemonController $controller;
        public function __construct($controller){
            $this->controller = $controller;
        }

        function get($params = []){
            $this->controller->displaySearch();
        }

        function post($params = []){
        }
    }
?>