<?php
// Enregistrement des fonctions d'autoloading pour charger automatiquement les classes PHP

    spl_autoload_register(
        function($class_name){
            $path = "classes/{$class_name}.class.php";// Chemin relatif pour la classe dans le répertoire courant
            if(file_exists($path)){
                include $path; // Inclusion du fichier de classe si celui-ci existe
            } 
        }
    );
    spl_autoload_register(
        function($class_name){
            $path = "../classes/{$class_name}.class.php"; // Chemin relatif pour la classe dans un sous-répertoire
            if(file_exists($path)){
                include $path; // Inclusion du fichier de classe si celui-ci existe
            }
        }
    );
    spl_autoload_register(
        function($class_name){
            $path = "../../classes/{$class_name}.class.php"; // Chemin relatif pour la classe dans un autre sous-répertoire
            if(file_exists($path)){
                include $path;// Inclusion du fichier de classe si celui-ci existe
            }
        }
    );
?>