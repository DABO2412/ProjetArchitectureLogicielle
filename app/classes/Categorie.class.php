<?php
// Définition de la classe Categorie
    class Categorie{
            // Propriétés privées de la classe

        private $id;
        private $libelle;
    // Constructeur de la classe, initialisant les propriétés avec les valeurs fournies

        function __construct($id,$libelle){
            $this->id=$id;
            $this->libelle=$libelle;
        }
            // Méthode getter pour récupérer l'ID de la catégorie

        function getId(){
            return $this->id;
        }
            // Méthode setter pour définir l'ID de la catégorie

        function setId($id){
            $this->id=$id;
        }
            // Méthode getter pour récupérer le libellé de la catégorie

        function getLibelle(){
            return $this->libelle;
        }
            // Méthode setter pour définir le libellé de la catégorie

        function setLibelle($libelle){
            $this->libelle=$libelle;
        }
            // Méthode d'hydratation pour remplir les propriétés avec un tableau de données

        function hydrate(array $data){ 
            foreach($data as $key => $value){
                if(property_exists($this, $key)){
                    $this->$key = $value;
                }
            }
        }
    }
    
