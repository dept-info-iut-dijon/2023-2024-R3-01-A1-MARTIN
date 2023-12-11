<form id="searchForm">
      <label for="searchTerm">Champ de recherche :</label>
      <input type="text" id="searchTerm" name="searchTerm" placeholder="Saisissez le terme de recherche" required>

      <label for="searchField">Choisir le champ :</label>
      <select id="searchField" name="searchField">
        <option value="name">Nom</option>
        <option value="type">Type</option>
        <option value="ability">Capacité</option>
        <option value="baseExperience">Expérience de base</option>
        <!-- Ajoutez d'autres options selon les propriétés de votre classe Pokémon -->
      </select>

      <button type="submit">Rechercher</button>
    </form>