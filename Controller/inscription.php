<?php 
include('./con_conf.php');
if($_POST['nom'] != '' && $_POST['email'] != '' && $_POST['password'] != '' && $_POST['password2'] != ''){
    if($_POST['password'] == $_POST['password2']){
        $req = $bdd->prepare('SELECT * FROM Admin WHERE email = :email');
        $req->execute(array(
            'email' => $_POST['email']
        ));
        $result = $req->fetch();
        if($result){
            $exist = "Ce compte existe déjà";
            header('Location: ../index.php?error='.$exist);
        }else{
            $req = $bdd->prepare('INSERT INTO Admin (nom, email, password) VALUES (:nom, :email, :password)');
            $req->execute(array(
                'nom' => $_POST['nom'],
                'email' => $_POST['email'],
                'password' => md5($_POST['password'])
            ));
            $reuissie = 'Inscription réussie';
            header('Location: ../view/login.php?success='.$reuissie);
        }
    }else{
        $mot_de_passe_different = 'Les mots de passe ne sont pas identiques';
        header('Location: ../index.php?error='.$mot_de_passe_different);
    }
}else{
    $champs_vides = 'Veuillez remplir tous les champs';
    header('Location: ../index.php?error='.$champs_vides);
}
?>