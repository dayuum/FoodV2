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
                $sql = "insert into ingredients (id,nom,quantite,prix) values (:id,:nom,:quantite,:prix)";
                $stmt = $cnx->prepare($sql);
                $stmt-> bindParam(':id', $id);
                $nom = str_replace("\"","",$nom);
                $stmt-> bindParam(':nom', $nom);
                $stmt-> bindParam(':quantite', $quantite);
                $prix = trim($prix);
                $stmt-> bindParam(':prix', $prix);
                $stmt->execute();
            }
            fclose($fileName);
            session_start();
            $_SESSION["message"] = "Les ingrédients ont bien été ajoutés en base de données";
            header('location:insertHTML.php');
        }catch(PDOException $pdoe){
            switch ($pdoe->getCode()) {
                case 'HY000':
                    session_start();
                    $_SESSION["message"] = "Fichier invalide";
                    header('location:insertHTML.php');
                    break;
                case '23000':
                    session_start();
                    $_SESSION["message"] = "Les ingrédients sont déjà présent dans la base de données";
                    header('location:insertHTML.php');
                    break;
            }  
        }
        catch(Exception $e){
            session_start();
            $_SESSION["message"] = "OOPS - Quelque chose s'est mal passé";
            header('location:insertHTML.php');
        }
    }
    
?>

