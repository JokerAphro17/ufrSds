<?php 
    include('con_conf.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    // delete by id whith pdo 
        $sql = "DELETE FROM `Etudiant` WHERE `numero` = :id";
        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $succes = "L'utilisateur a été supprimé avec succès";
        header('location: ../view/Liste.php?succes='.$succes);
    }
?>