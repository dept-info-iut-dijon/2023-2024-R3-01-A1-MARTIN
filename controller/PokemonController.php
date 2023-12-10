<?php
    class PokemonController{
        public function displayAddPokemon(){
            $addPokemonView = new View("AddPokemon");
            $addPokemonView->generer([]);
        }
    }
?>