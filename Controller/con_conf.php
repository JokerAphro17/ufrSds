// connect to data base 
<?php 
//nexw pdo connec 
try {
    $bdd = new PDO('mysql:host=localhost;dbname=ufr_sds', 'Jokeru17', 'Kakare45');
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

?>