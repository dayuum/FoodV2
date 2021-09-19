<?php ob_start();//Don't touch it
    $titre = "Accueil";  
?>
<button type="button" class="btn btn-danger mb-4"><a class="text-white text-decoration-none" href="consultStock.php">Consulter le stock</a></button>
<button type="button" class="btn btn-danger mb-4"><a class="text-white text-decoration-none" href="modifStock.php">Modifier le stock</a></button><br>
<button class="btn btn-danger mt-4" id="button" >Button Js</button>
<p id="pi"></p>

<?php
/********************
 * Don't touch it
 * It can integrate the template
 ********************/
    $content = ob_get_clean();
    require "template.php";
?>
