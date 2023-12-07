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
    }
?>
