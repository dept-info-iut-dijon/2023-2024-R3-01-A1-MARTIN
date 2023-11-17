<?php
    require_once("views/View.php");
    require_once("models/PokemonManager.php");
    class MainController {
        public function Index() : void {
            $pokemonManager = new PokemonManager();
            $getAll = $pokemonManager->getAll();
            $getIdExist = $pokemonManager->getId(1);
            $getIdExistPas = $pokemonManager->getId(0);
            $indexView = new View('Index');
            $indexView->generer([$getAll, $getIdExist, $getIdExistPas]);
        }
    }
    
?>