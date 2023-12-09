<?php
    require_once("views/View.php");
    require_once("models/PokemonManager.php");
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
                  <th>Description</th>
                  <th>Types</th>
                  <th>Image</th>
                  <th>Options</th>
              </tr>
            </thead>
            <tbody>";
            foreach($listPokemon as $item){
                $result .= "<tr>";
                $result .= "<td>" . $item->GetIdPokemon() . "</th>";
                $result .= "<td>". $item->getDescription() ."</td>";
                $result .= "<td>". $item->getTypeOne() ." " . $item->getTypeTwo() ."</td>";
                $result .= "<td><img src=" . $item->getUrlImg() ." alt=photodepokemon class=imageList></td>";
                $result .= "<td><a class=updatePokemon href=index.php?action=edit-pokemon&idPokemon=" . $item->GetIdPokemon() . ">Edit  </a><a class=deletePokemon href=index.php?action=delete-pokemon&idPokemon=" . $item->GetIdPokemon() . ">  Delete</a></td>";
                $result .= "</tr>";
            }    
            $result .= "</tbody>";
            $result .= "</table>";

            return $result;
        }
    }
?>