<?php
    if($_POST){
        try{
            require_once("db.php");
            $cnx->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $cnx->exec("SET NAMES 'utf8';");

            $nom = $_POST["nom"];
            $quantite = $_POST["quantite"];
    
            $sql = "UPDATE Ingredient SET quantite=:quantite where :nom = nom";
            $stmt = $cnx->prepare($sql);
            $stmt-> bindParam(':nom', $nom);
            $stmt-> bindParam(':quantite', $quantite);
            $stmt->execute();
            $donnees = $stmt -> rowCount();
            if ($donnees == 0){
                throw new Exception();
            }
            session_start();
            $_SESSION["message1"] = "La quantité de $nom a bien été modifiée";
            header('location:modifStock.php');
        }catch (Exception $ex) {
            session_start();
            $_SESSION["message1"] = "Il n'y a pas d'ingrédient de ce nom dans le stock ou le stock reste inchangé";
            header('location:modifStock.php');
        }
    }
?>

