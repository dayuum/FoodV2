<?php ob_start();//Don't touch it
    $titre = "Select";  
?>

<div>
    <button type="button" class="btn btn-danger mb-4"><a class="text-white text-decoration-none" href="index.php">Accueil</a></button>
</div>
<div class="container ">    
    <div class="row">
        <form method="post" action="select.php" class="col-12 col-md-6">
            <div class="form-group">
                <label for="nom">Saisir le nom :</label>
                <input type="text" required class="form-control" id="nom" name="nom"  placeholder="Entrer le nom">
            </div>
            <div>
                <?php
                    session_start();
                    if(isset($_SESSION["message"])){
                ?>
                <?= $_SESSION["message"] ?>
                <?php }
                $_SESSION["message"]=NULL;  ?>
            </div>
            <button type="submit" class="button" name="button">Valider</button>
        </form>
    </div>
</div>

<?php
/********************
 * Don't touch it
 * It can integrate the template
 ********************/
    $content = ob_get_clean();
    require "template.php";
?>
