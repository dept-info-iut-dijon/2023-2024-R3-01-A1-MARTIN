<form action="index.php?action=add-type" method="post">
        <label for="idType">ID du Type:</label>
        <input type="text" name="idType" id="idPokemon" required>
        
        <label for="nomType">Nom du type:</label>
        <input type="text" name="nomType" id="nomEspece" required>

        <label for="urlImg">URL de l'image:</label>
        <input type="text" name="urlImg" id="image" required>

        <input type="submit" value="Ajouter Type">
    </form>
