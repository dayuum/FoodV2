<?php ob_start();//NE PAS MODIFIER
    $titre = "Update";
?>
<div>
    <button type="button" class="btn btn-danger mb-4"><a class="text-white text-decoration-none" href="index.php">Accueil</a></button>
</div>
<div class="container ">    
    <div class="row">
        <form method="post" action="update.php" class="col-12 col-md-6">
            <div class="form-group">
                <label for="nom">Saisir le nom :</label>
                <input type="text" required class="form-control" id="nom" name="nom"  placeholder="Entrer le nom">
            </div>
            <div class="form-group">
                <label for="quantite">Saisir une quantité :</label>
                <input type="number" required class="form-control" id="quantite" name="quantite" placeholder="Entrer une quantite">
            </div>
            <div>
                <?php
                    session_start();
                    if(isset($_SESSION["message1"])){
                ?>
                <?= $_SESSION["message1"] ?>
                <?php }
                $_SESSION["message1"]=NULL; ?>
            </div>
            <button type="submit" class="button" name="button">Valider</button>
        </form>
    </div>
</div>

<?php
/********************
 * NE PAS MODFIER
 * PERMET D'INCLURE LE TEMPLATE
 ********************/
    $content = ob_get_clean();
    require "template.php";
?>