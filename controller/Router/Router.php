<?php
     class Router{
        private array $routeList;
        private array $ctrlList;
        private string $action_key;

        public function __construct($name_of_action_key = "action"){
            $this->createControllerList();
            $this->createRouteList();
        }

        public function createControllerList(){
            $this->ctrlList = [
                "main" => new MainController()
            ];
        }

        public function createRouteList(){
            $this->routeList = [     
                "index" => new RouteIndex($this->ctrlList["main"])
        ];
        }

        public function routing($get, $post){
            $routeKey = "index";
            if(isset($this->routeList[$routeKey])){
                $route = $this->routeList[$routeKey];
                $action_Key = $this->action_key;

                if(isset($get[$action_Key])){
                    $method = "GET";
                }
                else if(isset($post[$action_Key])){
                    $method = "POST";
                }
                else{
                    $method = "GET";
                }
                $route->action[$method];

            }
        }
    }
?>