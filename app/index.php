<?php
            // Inclure l'autoloader pour charger toutes les classes nécessaires
            require_once("classes/autoload.php");
            // Créer des instances de CategorieDAO et ArticleDAO
            $categorieDao = new CategorieDAO();
            $articleDao = new ArticleDAO();
            // Créer des instances de CatégorieDAO et ArticleDAO
            $list_categorie = $categorieDao->list();
            $list_article = $articleDao->list();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/index.css">
    <title>ESP Article</title>
</head>
<body>
    <div>
    <h1>ESP information</h1>
    <nav>
        <ul>
           <?php
           // Parcourir la liste des catégories et les afficher sous forme de liens pour la navigation
                foreach ($list_categorie as $key) {
                    echo "<li><a href='#' class='categorie " .$key->getId()."'>".$key->getLibelle()."</a></li>";
                }
           ?>
        </ul>
    </nav>
    </div>
    
    <?php
    
        <!-- Parcourir les articles et créez des éléments-->
        foreach($list_article as $key) {
            echo "
            <div class='article ".$key->getCategorie()."'>
                <h2 class='titreArticle'>".$key->getTitre()."</h2>
                <p class='contenuArticle'>".$key->getContenu()."</p>
                <p class='dateCreationArticle'>".$key->getDateCreation()."</p>
                <p class='dateModificationArticle'>".$key->getdDateModification()."</p> 
            </div>";
        }

    ?>

<script>
        

        // Fonction pour masquer tous les articles
        function masquerArticles() {
       // Sélectionner tous les éléments de l'article
            var articles = document.querySelectorAll('.article');
        // Parcourir les articles et définir l'affichage sur aucun
        articles.forEach(function(article) {
            article.style.display = 'none';
        });
    }

    // Fonction pour afficher les articles de la catégorie spécifiée
    function afficherArticles(categorie) {
       // Sélectionne tous les éléments de l'article
        var articles = document.querySelectorAll('.article');
        // Parcourir les articles et afficher uniquement ceux qui appartiennent à la catégorie spécifiée
        articles.forEach(function(article) {
            if (article.classList.contains(categorie)) {
                article.style.display = 'block';
            }
        });
    }

    // Fonction d'initialisation
    function initialiserMenuDynamique() {
        var categories = document.querySelectorAll('.categorie');
        categories.forEach(function(categorie) {
            categorie.addEventListener('click', function() {
                // Masquer tous les articles avant d'afficher ceux de la nouvelle catégorie
                masquerArticles();
                // Récupérer la classe de la catégorie cliquée
                var categorieClasse = categorie.classList[1];
                console.log(categorieClasse)
                // Afficher les articles correspondants
                afficherArticles(categorieClasse);
            });
        });
    }

    // Appel de la fonction d'initialisation une fois que le DOM est prêt
    document.addEventListener('DOMContentLoaded', function() {
        masquerArticles();
        afficherArticles(1)
        initialiserMenuDynamique();
    });

</script>
</body>
</html>