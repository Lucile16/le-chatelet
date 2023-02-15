<!DOCTYPE html>
<html>
    <head>
        <title>Recette</title>
    </head>

    <body>
        <?php $recipe = getOneRecipe(); ?>
        <nav class="mt-4 ms-4" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=0">Accueil</a></li>
            <li class="breadcrumb-item"><a href="index.php?page=1">Liste des recettes</a></li>
            <li class="breadcrumb-item active" aria-current="page" id="titre"><?=$recipe['nom'];?></li>
            <!-- Utilisation de textContent et pas innerHTML car risque de faille XSS-->
        </ol>
        </nav>

        <div class="container mt-4">
                <h1 class="text-center text-decoration-underline mb-5"><?= $recipe['nom']; ?></h1>
                <p><strong><u>Temps de préparation :</u></strong> <?= $recipe['temps_preparation']; ?> minutes</p>
                <p><strong><u>Temps de cuisson :</u></strong> <?= $recipe['temps_cuisson']; ?> minutes</p>
                <p><strong><u>Niveau :</u></strong> <?= $recipe['niveau']; ?></p>
                <p><strong><u>Catégorie :</u></strong> <?= $recipe['categorie']; ?></p>
                <p class="fw-bold text-decoration-underline">Etapes de la préparation</p>
                <p><?= nl2br($recipe['preparation']); ?></p>
        </div>
    </body>
</html>