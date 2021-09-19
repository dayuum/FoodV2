<?php
    if($_POST){
        try{
            require_once("db.php");
            $cnx->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $cnx->exec("SET NAMES 'utf8';");

            $nom = $_POST["nom"];
    
            $sql = "SELECT * from Ingredient where :nom = nom";
            $stmt = $cnx->prepare($sql);
            $stmt-> bindParam(':nom', $nom);
            $stmt->execute();
            $donnees = $stmt -> fetchColumn(2);
            if($donnees == ""){
                // if the Ingredient is not in the DB throw exception
                throw new Exception();
            }
            session_start();
            $_SESSION["message"] = "L'Ingredient $nom a pour quantité $donnees";
            header('location:consultStock.php');  
        }catch (Exception $ex) {
            session_start();
            $_SESSION["message"] = "Il n'y a pas d'ingrédient de ce nom dans le stock";
            header('location:consultStock.php');
        }
    }
?>
