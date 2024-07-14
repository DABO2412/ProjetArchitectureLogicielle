<?php
// Classe Article qui représente un article avec ses attributs et ses méthodes
    class Article{
            // Attributs privés de la classe Article
        private $id;
        private $titre;
        private $contenu;
        private $dateCreation;
        private $dateModification;
        private $categorie;
        
            // Constructeur pour initialiser un objet Article avec des valeurs spécifiques

        function __construct($id,$titre,$contenu,$dateCreation,$dateModification,$categorie){
            $this->id=$id;
            $this->titre=$titre;
            $this->contenu=$contenu;
            $this->dateCreation=$dateCreation;
            $this->dateModification=$dateModification;
            $this->categorie=$categorie;
        }

            // Méthode pour obtenir l'identifiant de l'article
        function getId(){
            return $this->id;
        }
            // Méthode pour définir l'identifiant de l'article

        function setId($id){
            $this->id=$id;
        }
            // Méthode pour obtenir le titre de l'article

        function getTitre(){
            return $this->titre;
        }
            // Méthode pour définir le titre de l'article

        function setTitre($titre){
            $this->titre=$titre;
        }
            // Méthode pour obtenir le contenu de l'article

        function getContenu(){
            return $this->contenu;
        }
            // Méthode pour définir le contenu de l'article

        function setContenu($contenu){
            $this->contenu=$contenu;
        }
            // Méthode pour obtenir la date de création de l'article

        function getDateCreation(){
            return $this->dateCreation;
        }
            // Méthode pour définir la date de création de l'article

        function setDateCreation($dateCreation){
            $this->dateCreation=$dateCreation;
        }
            // Méthode pour obtenir la date de modification de l'article

        function getdDateModification(){
            return $this->dateModification;
        }
            // Méthode pour définir la date de modification de l'article
        function setDateModification($dateModification){
            $this->dateModification=$dateModification;
        }
            // Méthode pour obtenir la catégorie de l'article

        function getCategorie(){
            return $this->categorie;
        }
            // Méthode pour définir la catégorie de l'article

        function setCategorie($categorie){
            $this->categorie=$categorie;
        }




    // Méthode pour hydrater l'objet Article avec des données d'un tableau associatif
        function hydrate(array $data){ 
            foreach($data as $key => $value){
                if(property_exists($this, $key)){
                    $this->$key = $value;
                }
            }
        }
    }
    