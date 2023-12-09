<?php
    class RouteIndex extends Route{
        private MainController $controller;

        public function __construct($controller){
            $this->controller = $controller;
        }

        function get($params = []){
            $this->controller->Index();
        }

        function post($params = []){
            $this->controller->Index();
        }
    }
?>