<?php
    class PokemonController{
        public function displayAddPokemon(){
            $addPokemonView = new View("AddPokemon");
            $addPokemonView->generer([]);
        }

        public function displayAddType(){
            $addTypePokemonView = new View("AddType");
            $addTypePokemonView->generer([]);
        }

        public function displaySearch(){
            $searchPokemonView = new View("Search");
            $searchPokemonView->generer([]);
        }

        public function displayDelete(){
            $deletePokemonView = new View("Index");
            $deletePokemonView->generer([]);
        }

        public function displayEdit(){
            $editPokemonView = new View("AddPokemon");
            $editPokemonView->generer([]);
        }
    }
?>