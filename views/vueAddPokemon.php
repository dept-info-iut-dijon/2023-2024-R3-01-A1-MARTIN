<?php if (isset($pokemon)): ?>
    <form action="index.php?action=edit-pokemon" method="post">
        <label for="idPokemon">ID du Pokémon:</label>
        <input type="text" name="idPokemon" value="<?php echo $pokemon->GetIdPokemon(); ?>">

        <label for="nomEspece">Nom de l'espèce:</label>
        <input type="text" name="nomEspece" value="<?php echo $pokemon->getNomEspece(); ?>">

        <label for="description">Description:</label>
        <textarea name="description" ><?php echo $pokemon->getDescription(); ?></textarea>

        <label for="typeOne">Type 1:</label>
        <input type="text" name="typeOne" value="<?php echo $pokemon->getTypeOne(); ?>">

        <label for="typeTwo">Type 2:</label>
        <input type="text" name="typeTwo" value="<?php echo $pokemon->getTypeTwo(); ?>">

        <label for="urlImg">URL de l'image:</label>
        <input type="text" name="urlImg" value="<?php echo $pokemon->getUrlImg(); ?>">

        <!-- Ajoutez les champs restants ici -->
        <button type="submit">Mettre à jour le Pokémon</button>
    </form>
<?php else: ?>
   <form action="index.php?action=add-pokemon" method="post">
        <label for="idPokemon">ID du Pokémon:</label>
        <input type="text" name="idPokemon" id="idPokemon" required>
        
        <label for="nomEspece">Nom de l'espèce:</label>
        <input type="text" name="nomEspece" id="nomEspece" required>

        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="4" required></textarea>

        <label for="TypeOne">Type 1:</label>
        <input type="text" name="TypeOne" id="TypeOne" required>

        <label for="TypeTwo">Type 2:</label>
        <input type="text" name="TypeTwo" id="TypeTwo">

        <label for="image">URL de l'image:</label>
        <input type="text" name="image" id="image" required>

        <input type="submit" value="Ajouter Pokémon">
    </form>
<?php endif; ?>