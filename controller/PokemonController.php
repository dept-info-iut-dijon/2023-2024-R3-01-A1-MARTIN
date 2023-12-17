<?php
require_once("models/pokemonManager.php");
require_once("models/PkmnTypeManager.php");
    class PokemonController{
        public function displayAddPokemon(?string $message = null){
            $addPokemonView = new View("AddPokemon");
            $addPokemonView->generer(["message" => $message]);
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

        public function addPokemon(array $pokemonInfo){
            $pokemon = new Pokemon();
            $pokemon->hydrate($pokemonInfo);

            $pokemonManager = new PokemonManager();
            $success = $pokemonManager->createPokemon($pokemon);

            if($success->GetIdPokemon() == $pokemon->GetIdPokemon()){
                $message = "Le pokemon a bien été créé";
            }else{
                $message = "Un problème a eu lieu lors de la création du Pokemon";
            }
            $listPokemon = $pokemonManager->getAll();

            $view = new View("Index");
            $view->generer(['message' => $message, "listPokemon" => $listPokemon]);
            
        }

        public function deletePokemonAndIndex(int $idPokemon) {
            // Créer une instance du PokemonManager
            $pokemonManager = new PokemonManager();
            $listPokemon = $pokemonManager->getAll();
            $first = $pokemonManager->getId(1);
            $other = $pokemonManager->getId(0);
            // Supprimer le Pokémon et vérifier le résultat
            $success = $pokemonManager->deletePokemon($idPokemon);
    
            // Préparer le message en fonction du résultat
            $message = $success ? "Suppression réussie." : "Échec de la suppression.";
    
            // Générer la vue Index avec le message
            $indexView = new View("Index");
            $indexView->generer(['message' => $message, "first" => $first, "other" => $other, "listPokemon" => $listPokemon]);
        }

        public function displayEditPokemon(int $idPokemon) {
            $pokemonManager = new PokemonManager();
            $pokemon = $pokemonManager->getId($idPokemon);
    
            if ($pokemon != null) {
                $editPokemonView = new View("AddPokemon");
                $editPokemonView->generer(['pokemon' => $pokemon]);
            } else {
                $this->displayAddPokemon("Pokémon not found");
            }
        }

        public function editPokemonAndIndex(array $dataPokemon) {
            $pokemonManager = new PokemonManager();
            
            // Vérifier si les deux types sont identiques
            if ($dataPokemon['typeOne'] == $dataPokemon['typeTwo']) {
                $dataPokemon['typeTwo'] = null;
            }
    
            // Créer et mettre à jour le Pokémon
            $success = $pokemonManager->editPokemonAndIndex($dataPokemon);

            $listPokemon = $pokemonManager->getAll();
            $first = $pokemonManager->getId(1);
            $other = $pokemonManager->getId(0);
            // Générer un message en fonction du résultat
            $message = $success ? "Mise à jour réussie." : "Échec de la mise à jour.";
    
            $indexView = new View("Index");
            $indexView->generer(['message' => $message, "first" => $first, "other" => $other, "listPokemon" => $listPokemon]);
        }

        public function addType(array $typeInfo) {{
            $type = new PkmnType();
            $type->hydrate($typeInfo);
            var_dump($type);
            $pkmnTypeManager = new PkmnTypeManager();
            $success = $pkmnTypeManager->createPkmnType($type);
        

            $pokemonManager = new PokemonManager();
            $listPokemon = $pokemonManager->getAll();

            $view = new View("Index");
            $view->generer(["listPokemon" => $listPokemon]);
        }
    }
}
?>