   <form action="process-form.php" method="post">
        <label for="idPokemon">ID du Pokémon:</label>
        <input type="text" name="idPokemon" id="idPokemon" required>
        
        <label for="nomEspece">Nom de l'espèce:</label>
        <input type="text" name="nomEspece" id="nomEspece" required>

        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="4" required></textarea>

        <label for="Type1">Type 1:</label>
        <input type="text" name="Type1" id="Type1" required>

        <label for="type2">Type 2:</label>
        <input type="text" name="type2" id="type2">

        <label for="image">URL de l'image:</label>
        <input type="text" name="image" id="image" required>

        <input type="submit" value="Ajouter Pokémon">
    </form>
