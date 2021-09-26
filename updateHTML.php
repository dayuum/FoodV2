<?php ob_start();//Don't touch it
    $titre = "Update";  
?>

<div>
    <button type="button" class="btn btn-danger mb-4"><a class="text-white text-decoration-none" href="index.php">Accueil</a></button>
</div>

<form action="update.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" class="btn btn-success mb-1" value="Insérer" name="submit">
</form>
<div>
    <?php
        session_start();
        if(isset($_SESSION["message1"])){
    ?>
    <?= $_SESSION["message1"] ?>
    <?php }
    $_SESSION["message1"]=NULL; ?>
</div>

       
<?php
/********************
 * Don't touch it
 * It can integrate the template
 ********************/
    $content = ob_get_clean();
    require "template.php";
?>
