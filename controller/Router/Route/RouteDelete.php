<?php
    require_once("controller/Router/Route.php");
    class RouteDelete extends Route {
        private PokemonController $controller;
        public function __construct($controller){
            $this->controller = $controller;
        }

        function get($params = []){
            try {
                // Récupérer l'ID du Pokémon depuis l'URL
                $idPokemon = $this->getParam($params, "idPokemon", false);
    
                // Appeler la méthode deletePokemonAndIndex avec l'ID
                $this->controller->deletePokemonAndIndex($idPokemon);
            } catch (Exception $e) {
                $errorMessage = $e->getMessage();
                $this->controller->displayAddPokemon($errorMessage);
            }
        }

        function post($params = []){
        }
    }
?>