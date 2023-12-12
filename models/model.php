<?php
    abstract class Model{
        private ?PDO $db = null;

        protected function execRequest(string $sql, array $params = null) : PDOStatement|bool {
            $db = $this->getDB();
            $statement = $db->prepare($sql);
            $statement->execute($params);
            return $statement;
            
        }

        private function getDB() : PDO {
            if($this->db == null){
                $this->db = new PDO("mysql:host=localhost;dbname=grp-474_s3_progweb", "grp-474", "MyNNhkSH", array(
                    PDO::ATTR_ERRMODE =>
                    PDO::ERRMODE_EXCEPTION));
                
            }
            return $this->db;
        }
    }
?>
