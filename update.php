<?php
    if($_POST){
        require_once("db.php");
        $cnx->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $cnx->exec("SET NAMES 'utf8';");

        $fichier = $_FILES["fileToUpload"]['tmp_name'];
        $ressource = fopen($fichier, 'rb');

        try{
            for ($i=0; $i < 3; $i++) { 
                $contenu = fgets($ressource, 4096);
                $ingredients = explode(";", $contenu);
                $id = $ingredients[0];
                $nom = $ingredients[1];
                $quantite = $ingredients[2];
                $prix = $ingredients[3];
                $sql = "update ingredients set id = :id,quantite = :quantite,prix = :prix where nom = :nom";
                $stmt = $cnx->prepare($sql);
                $stmt-> bindParam(':id', $id);
                $nom = str_replace("\"","",$nom);
                $stmt-> bindParam(':nom', $nom);
                $stmt-> bindParam(':quantite', $quantite);
                $prix = trim($prix);
                $stmt-> bindParam(':prix', $prix);
                $stmt->execute();
            }
            $donnees = $stmt -> rowCount();
            if ($donnees == 0){
                throw new Exception();
            }
            fclose($fileName);
            session_start();
            $_SESSION["message1"] = "Les ingrédients ont bien été modifiés en base de données";
            header('location:updateHTML.php');
        }catch(Exception $e){
            session_start();
            $_SESSION["message1"] = "OOPS - Quelque chose s'est mal passé, format du fichier invalide ou le stock reste inchangé";
            header('location:updateHTML.php');
        }
    }
    
?>

