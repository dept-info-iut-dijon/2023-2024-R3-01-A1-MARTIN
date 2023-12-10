<?php
    require_once("controller/mainController.php");
    require_once("controller/PokemonController.php");
    require_once("controller/Router/Route/RouteIndex.php");
    require_once("controller/Router/Route/RouteAddPokemon.php");

     class Router{
        private array $routeList;
        private array $ctrlList;
        private string $action_key;

        public function __construct($name_of_action_key = "action"){
            $this->action_key = $name_of_action_key;
            $this->createControllerList();
            $this->createRouteList();
        }

        public function createControllerList(){
            $this->ctrlList = [
                "main" => new MainController(),
                "Pokemon" => new PokemonController(),
            ];
        }

        public function createRouteList(){
            $this->routeList = [     
                "Index" => new RouteIndex($this->ctrlList["main"]),
                "add-pokemon" => new RouteAddPokemon($this->ctrlList["Pokemon"])
        ];
        }

        public function routing($get, $post) {
            // Vérifier si la clé 'action' est présente dans $get
            if (isset($get[$this->action_key])) {
                $routeKey = $get[$this->action_key];
                // Vérifier si la route associée à la clé 'action' existe
                if (isset($this->routeList[$routeKey])) {
                    $route = $this->routeList[$routeKey];
                    $method = !empty($post) ? 'POST' : 'GET';
    
                    // Appeler la méthode action de la route avec la méthode et les données appropriées
                    $route->action(($method === 'POST') ? $post : $get, $method);
                }
            }
            else{
                $route = $this->routeList['Index'];
                $route->action([], "GET");
            }
        }
    }
?>