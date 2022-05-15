<?php
    include('con_conf.php');
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        // upadte by id whith pdo
        $sql = "UPDATE `Etudiant` SET `nom`=:nom,`prenom`=:prenom,`date_naiss`=:ddn,
        `email`=:email,`numero`=:telephone WHERE `numero`=:id";
        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(':nom', $_POST['nom']);
        $stmt->bindParam(':prenom', $_POST['prenom']);
        $stmt->bindParam(':ddn', $_POST['ddn']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':telephone', $_POST['numero']);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $succes = "Les donnés de l'etudiant ont été modifié avec succès";
        header('location: ../view/Liste.php?succes='.$succes);

    }
?>