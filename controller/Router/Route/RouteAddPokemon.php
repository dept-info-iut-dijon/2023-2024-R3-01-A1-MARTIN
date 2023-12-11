<?php
    require_once("controller/Router/Route.php");
    class RouteAddPokemon extends Route {
        private PokemonController $controller;
        public function __construct($controller){
            $this->controller = $controller;
        }

        function get($params = []){
            $message = $params["message"] ?? null;
            $this->controller->displayAddPokemon($message);
        }

        function post($params = []){
            try {
                // Récupérer les données du formulaire
                $data = [
                    "idPokemon" => $this->getParam($params, "idPokemon", false),
                    "nomEspece" => $this->getParam($params, "nomEspece", false),
                    "description" => $this->getParam($params, "description", false),
                    "typeOne" => $this->getParam($params, "TypeOne", false),
                    "typeTwo" => $this->getParam($params, "TypeTwo", true), // Peut être vide
                    "urlImg" => $this->getParam($params, "image", false)
                ];
        
                // Appeler le contrôleur pour traiter les données
                $this->controller->addPokemon($data);
        
                // Redirection ou affichage de succès après la création
                // Par exemple, redirection vers la page d'index ou affichage d'un message de succès
            } catch (Exception $e) {
                // Afficher le formulaire avec un message d'erreur si une exception est levée
                $errorMessage = $e->getMessage();
                $this->controller->displayAddPokemon($errorMessage);
            }
        }
        
    }
?>