<?php
// Classe MyPDO qui étend PDO pour implémenter un singleton pour la connexion à la base de données
class MyPDO extends PDO {
    // Constantes pour les paramètres de connexion à la base de données
  private const SERVER="localhost";
  private const USER="root";
  private const PWD="";
  private const DB="mglsi_news";
  private const DSN="mysql:host=".self::SERVER.";dbname=".self::DB;
  private static $instance;
    // Instance unique de MyPDO
  protected function __clone(){
    return new Exception('Le clonage est interdit');
  }

  public static function getInstance(){
        // Si l'instance n'existe pas encore, la créer
    if ( !self::$instance ){
      try{
                // Crée une nouvelle instance de MyPDO
        self::$instance = new MyPDO(self::DSN,self::USER,self::PWD);
      }
      catch(PDOException $e){
                // En cas d'erreur de connexion, afficher un message et arrêter l'exécution
        die("Erreur connexion: ".$e->getMessage());
      } 
    }
        // Retourne l'instance unique de MyPDO
    return self::$instance;
  }

}


