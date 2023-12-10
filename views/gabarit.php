<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="public/css/main.css"/>
    <link rel="stylesheet" href="public/css/formulaire.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $titre ?></title>
</head>

<body>
<header>
    <!-- Menu -->
    <div class="monHeader">
        <nav class="navHeader">
        <a href="index.php">Accueil</a>
        <a href="index.php?action=add-pokemon">Ajouter un pokemon</a>
        <a href="index.php?action=add-pokemon-type">Ajouter un type de pokemon</a>
        <a href="index.php?action=search">Rechercher</a>
        </nav>
    </div>


</header>
<!-- #contenu -->
<main id="contenu">
    <?= $contenu ?>

</main>
<footer>

</footer>
</body>

</html>