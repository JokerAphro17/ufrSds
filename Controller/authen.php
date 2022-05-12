<?php 
  include('./con_conf.php');
  if ($_POST['email'] != '' && $_POST['password'] != '') {
    $req = $bdd->prepare('SELECT * FROM  Admin WHERE email = :email and password = :password');
    $req->execute(array(
      'email' => $_POST['email'],
      'password' => md5($_POST['password'])
    ));
    $result = $req->fetch();
    if ($result) {
        header('Location: controlListe.php');
    } else {
        $erreur = 'Mauvais identifiant ou mot de passe !';
        header('Location: ../view/login.php?error='.$erreur);
    }
    } else {
        $champs_vides = 'Veuillez remplir tous les champs';
        header('Location: ../view/login.php?error='.$champs_vides);
  }
?>