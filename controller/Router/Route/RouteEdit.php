<?php
    require_once("controller/Router/Route.php");
    class RouteEdit extends Route {
        private PokemonController $controller;
        public function __construct($controller){
            $this->controller = $controller;
        }

        function get($params = []){
            try {
                $idPokemon = $this->getParam($params, "idPokemon", false);
                $this->controller->displayEditPokemon($idPokemon);
            } catch (Exception $e) {
                $this->controller->displayAddPokemon("ID not found");
            }
        }

        function post($params = []){
        //    try {
                // Récupérer les données nécessaires du formulaire
                $dataPokemon = [
                    'idPokemon' => $this->getParam($params, 'idPokemon', false),
                    'nomEspece' => $this->getParam($params, 'nomEspece', false),
                    'description' => $this->getParam($params, 'description', false),
                    'typeOne' => $this->getParam($params, 'typeOne', false),
                    'typeTwo' => $this->getParam($params, 'typeTwo', true), // Peut être vide
                    'urlImg' => $this->getParam($params, 'urlImg', false)
                ];
                // Transmettre les données au contrôleur
                $this->controller->editPokemonAndIndex($dataPokemon);

        }
    }
?>