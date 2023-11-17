<?php
    class PokemonManager extends Model {
       public function getAll() : Array{
            $resultat = array();
            $sql = "SELECT * FROM POKEMON";
            $response = $this->execRequest($sql, []);

            while($donnees = $response->fetch(PDO::FETCH_ASSOC)) {
                $pokemon = new Pokemon();
                $pokemon->hydrate($donnees);
                $resultat[] = $pokemon;
            }
            return $resultat;
        }  

        public function getId(int $id) : Pokemon {
            $result = null;
            $sql = "SELECT * FROM POKEMON WHERE idPokemon =? ";
            $response = $this->execRequest($sql, array($id));
            $pokemon = new Pokemon();
            $pokemon->hydrate(array($response));
            $result = $pokemon;
            return $result;
        }
    }
?>