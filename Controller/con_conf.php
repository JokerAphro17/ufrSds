
<?php 
 
try {
    $bdd = new PDO('mysql:host=localhost;dbname=ufr_sds', 'aphro', 'Ulquiora@04');
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage("la connection a échoué"));
}

?>
