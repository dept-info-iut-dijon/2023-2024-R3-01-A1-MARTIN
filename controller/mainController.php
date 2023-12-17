<?php
    require_once("views/View.php");
    require_once("models/PokemonManager.php");
    require_once("models/PkmnTypeManager.php");
    class MainController {
        public function Index() : void {
            $pokemonManager = new PokemonManager();
            $listPokemon = $pokemonManager->getAll();
            $first = $pokemonManager->getId(1);
            $other = $pokemonManager->getId(0);
            $indexView = new View('Index');
            $indexView->generer(["first" => $first, "other" => $other, "listPokemon" => $listPokemon]);
        }

        public function showTable($listPokemon) : string{
            $result = "<table>
            <thead>
              <tr>
                  <th>ID Pokemon</th>
                  <th>Nom</th>
                  <th>Description</th>
                  <th>Type(s)</th>
                  <th>Image</th>
                  <th>Options</th>
              </tr>
            </thead>
            <tbody>";
            $typeManager = new PkmnTypeManager();         
            foreach($listPokemon as $item){
                $nomTypeOne = $typeManager->getById($item->getTypeOne())->getNomType();
                $nomTypeTwo = $typeManager->getById($item->getTypeTwo())->getNomType();
                $result .= "<tr>";
                $result .= "<td>" . $item->GetIdPokemon() . "</th>";
                $result .= "<td>". $item->getNomEspece() . "</td>";
                $result .= "<td>". $item->getDescription() ."</td>";
                $result .= "<td>". $nomTypeOne ." " . $nomTypeTwo ."</td>";
                $result .= "<td><img src=" . $item->getUrlImg() ." alt=photodepokemon class=imageList></td>";
                $result .= "<td><a href=index.php?action=edit-pokemon&idPokemon=" . $item->GetIdPokemon() . ">Edit   </a><a class=deletePokemon href=index.php?action=del-pokemon&idPokemon=" . $item->GetIdPokemon() . ">   Delete</a></td>";
                $result .= "</tr>";
            }    
            $result .= "</tbody>";
            $result .= "</table>";

            return $result;
        }
    }
?>