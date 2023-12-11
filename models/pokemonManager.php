<?php
    require_once("models/Model.php");
    require_once("models/Pokemon.php");

    class PokemonManager extends Model {
       public function getAll() : Array{
            $resultat = array();
            $donnees = array();
            $sql = "SELECT * FROM POKEMON";
            $response = $this->execRequest($sql, []);
            if(is_a($response, "PDOStatement")){
                while($donnees = $response->fetch(PDO::FETCH_ASSOC)) {
                    $pokemon = new Pokemon();
                    $pokemon->hydrate($donnees);
                    $resultat[] = $pokemon;
                }
            }
            return $resultat;
        }  

        public function getId(int $id) : ?Pokemon {
            $result = null;
            $sql = "SELECT * FROM POKEMON WHERE idPokemon =? ";
            $response = $this->execRequest($sql, array($id));
            if(is_a($response, "PDOStatement")){               
                if($donnees = $response->fetch(PDO::FETCH_ASSOC)) {
                    $pokemon = new Pokemon();
                    $pokemon->hydrate($donnees);
                    $result = $pokemon;
                }
            }

            return $result;
        }

        public function createPokemon(Pokemon $pokemon) {
            // Requête SQL pour insérer un nouveau Pokémon
            $sql = "INSERT INTO POKEMON (idPokemon, nomEspece, description, typeOne, typeTwo, urlImg) VALUES (?, ?, ?, ?, ?, ?)";
            $values = [
                $pokemon->GetIdPokemon(),
                $pokemon->getNomEspece(),
                $pokemon->getDescription(),
                $pokemon->getTypeOne(),
                $pokemon->getTypeTwo(),
                $pokemon->getUrlImg()
            ];

            // Exécuter la requête
            $this->execRequest($sql, $values);

            // Récupérer l'ID du Pokémon inséré
            $id = $this->getLastId();  
            $pokemon->setIdPokemon($id);

            return $pokemon;
        }

        public function getlastId() : int{
            return parent::$db->lastInsertId();
        }

        public function deletepokemon(int $idPokemon = -1){
             // Vérifier si l'ID est valide
        if ($idPokemon == -1) {
            return false;  // Retourner false si l'ID n'est pas valide
        }

        // Requête SQL pour supprimer un Pokémon par son ID
        $sql = "DELETE FROM POKEMON WHERE idPokemon = ?";
        $values = [$idPokemon];

        // Exécuter la requête
        $stmt = $this->execRequest($sql, $values);

        // Vérifier si la suppression a été effectuée
        return ($stmt->rowCount() > 0);
        }        

        public function editPokemonAndIndex(array $dataPokemon): bool {
            // Requête SQL pour mettre à jour un Pokémon
            $sql = "UPDATE POKEMON SET nomEspece = ?, description = ?, typeOne = ?, typeTwo = ?, urlImg = ? WHERE idPokemon = ?";
            $values = [
                $dataPokemon['nomEspece'],
                $dataPokemon['description'],
                $dataPokemon['typeOne'],
                $dataPokemon['typeTwo'],
                $dataPokemon['urlImg'],
                $dataPokemon["idPokemon"],

            ];

    
            // Exécuter la requête
            $stmt = $this->execRequest($sql, $values);
    
            // Vérifier si la mise à jour a été effectuée
            return ($stmt->rowCount() > 0);
        }
    }
?>
