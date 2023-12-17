<?php
    require_once("controller/Router/Route.php");
    class RouteAddType extends Route {
        private PokemonController $controller;
        public function __construct($controller){
            $this->controller = $controller;
        }

        function get($params = []){
            $this->controller->displayAddType();
        }

        function post($params = []){
            try {
                // Récupérer les données du formulaire
                $data = [
                    "idType" => $this->getParam($params, "idType", false),
                    "nomType" => $this->getParam($params, "nomType", false),
                    "urlImg" => $this->getParam($params, "urlImg", false),
                ];
        
                // Appeler le contrôleur pour traiter les données
                $this->controller->addType($data);
                // Redirection ou affichage de succès après la création
                // Par exemple, redirection vers la page d'index ou affichage d'un message de succès
            } catch (Exception $e) {
                // Afficher le formulaire avec un message d'erreur si une exception est levée
                $errorMessage = $e->getMessage();
                $this->controller->displayAddType();
            }
        }
    }
?>