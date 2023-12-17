<?php
    require_once("model.php");
    require_once("PkmnType.php");
    class PkmnTypeManager extends model{
        public function getAll():array{
            $sql = "SELECT * FROM pkmn_type";
            $donnees = array();
            $response = $this->execRequest($sql, []);
            if(is_a($response, "PDOStatement")){
                while($donnees = $response->fetch(PDO::FETCH_ASSOC)) {
                    $type = new PkmnType();
                    $type->hydrate($donnees);
                    $resultat[] = $type;
                }
            }
            return $resultat;
        }

        public function getById(int $id):PkmnType{
            $result = null;
            $sql = "SELECT * FROM pkmn_type WHERE idType =? ";
            $response = $this->execRequest($sql, array($id));
            if(is_a($response, "PDOStatement")){               
                if($donnees = $response->fetch(PDO::FETCH_ASSOC)) {
                    $type = new PkmnType();
                    $type->hydrate($donnees);
                    $result = $type;
                }
            }

            return $result;
        }

        public function createPkmnType(PkmnType $type) : PkmnType{
            // Requête SQL pour insérer un nouveau Pokémon
            $sql = "INSERT INTO pkmn_type (idType, nomType, urlImg) VALUES (?, ?, ?)";
            $values = [
                $type->getIdType(),
                $type->getNomType(),
                $type->getUrlImg()
            ];

            // Exécuter la requête
            $data = $this->execRequest($sql, $values)->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($data)){
                $type->setIdType($data[0]["id"]);
            }
            // Récupérer l'ID du Pokémon inséré
            

            return $type;
        }

        public function deletePkmnType(int $idType = -1) : int{
             // Vérifier si l'ID est valide
        if ($idType == -1) {
            return false;  // Retourner false si l'ID n'est pas valide
        }

        // Requête SQL pour supprimer un Pokémon par son ID
        $sql = "DELETE FROM pkmn_type WHERE idType = ?";
        $values = [$idType];

        // Exécuter la requête
        $stmt = $this->execRequest($sql, $values);

        // Vérifier si la suppression a été effectuée
        return ($stmt->rowCount() > 0);
        }        

        public function editPkmnType(array $dataPokemon) {
            // Requête SQL pour mettre à jour un Pokémon
            $sql = "UPDATE pkmn_type SET nomType = ?, urlImg = ? WHERE idType = ?";
            $values = [
                $dataPokemon['nomType'],
                $dataPokemon['urlImg'],
                $dataPokemon["idType"],

            ];

    
            // Exécuter la requête
            $stmt = $this->execRequest($sql, $values);
    
            // Vérifier si la mise à jour a été effectuée
            return ($stmt->rowCount() > 0);
        }
    }
?>