<?php 
// Classe CategorieDAO pour la gestion des données des catégories

class CategorieDAO{
    protected $db; // Instance de connexion à la base de données
        // Constructeur : initialise la connexion à la base de données

    function __construct(){
            $this->db = MyPDO::getInstance();
        }
            // Destructeur : ferme la connexion à la base de données

        function __destruct()
        {
            $this->db = null;
        }
            // Méthode pour récupérer la liste des catégories depuis la base de données

        function list(){
            $categories=[]; // Tableau vide pour stocker les catégories récupérées
            $request="SELECT * from categorie "; // Requête SQL pour sélectionner toutes les catégories
            $query = $this->db->query($request)->fetchAll(PDO::FETCH_ASSOC); // Exécution de la requête et récupération des résultats sous forme de tableau associatif
        // Boucle sur les résultats de la requête

            foreach($query as $row){
                            // Création d'un objet Categorie à partir des données de la ligne courante
                $categorie = new Categorie($row['id'], $row['libelle']);
                $categorie->hydrate($row); // Hydratation de l'objet avec les données complètes de la ligne

                array_push($categories, $categorie); // Ajout de l'objet Categorie au tableau des catégories
            }
            return $categories; // Retourne le tableau des catégories
        
        }
}