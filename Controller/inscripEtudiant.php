<?php
include('./con_conf.php'); 
$reussie = "L'etudiant a été ajouté avec succès";
if($_POST['nom'] != '' && $_POST['prenom'] != '' && $_POST['ddn'] != '' && $_POST['email'] != '' && $_POST['telephone'] != '')
    {
        if ($_POST['tuteur'] == 'non') {
            $req = $bdd->prepare('SELECT * FROM Etudiant WHERE numero = :numero or email = :email');
            $req->execute(array(
                'numero' => $_POST['telephone'],
                'email' => $_POST['email']
            ));
            $result = $req->fetch();
            if ($result) {
                $exist = "Ce compte existe déjà";
                header('Location: ../view/enregistrement.php?error='.$exist);
            } else {
            $req = $bdd->prepare('INSERT INTO Etudiant(nom, prenom, date_naiss, email, numero) VALUES(:nom, :prenom, :ddn, :email, :telephone)');
            $req->execute(array(
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'ddn' => $_POST['ddn'],
                'email' => $_POST['email'],
                'telephone' => $_POST['telephone']
            ));
            header('Location: ../view/enregistrement.php?success='.$reuissie);}

        } 
        else {
            if( ($_POST['nomtuteur'] != '' && $_POST['prenomtuteur'] != '' && $_POST['emailtuteur'] != '' && $_POST['telephonetuteur'] != ''))
             {   if ($_POST['recherche'] == '') {
                $req = $bdd->prepare('SELECT * FROM Etudiant WHERE email = :email or numero = :numero');
                $req->execute(array(
                    'email' => $_POST['email'],
                    'numero' => $_POST['telephone']
                ));
                $result = $req->fetch();
                if ($result) {
                    $exist = "Ce compte existe déjà";
                    header('Location: ../view/enregistrement.php?error='.$exist);
                } else {
                $req2 = $bdd->prepare('INSERT INTO Tuteur(nom, prenom, numero, email) VALUES(:nom, :prenom, :numero, :email)');
                $req2->execute(array(
                    'nom' => $_POST['nomtuteur'],
                    'prenom' => $_POST['prenomtuteur'],
                    'numero' => $_POST['telephonetuteur'],
                    'email' => $_POST['emailtuteur']
                ));
                $req1 = $bdd->prepare('INSERT INTO Etudiant (nom, prenom, date_naiss, email, numero, idTuteur) VALUES (:nom, :prenom, :ddn, :email, :telephone, :idTuteur)');
                $req1->execute(array(
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'ddn' => $_POST['ddn'],
                'email' => $_POST['email'],
                'telephone' => $_POST['telephone'],
                'idTuteur' => $_POST['telephonetuteur']
            ));
                header('Location: ../view/enregistrement.php?success='.$reuissie);
            }
               }
              else{
                  
                  $numeroTuteur=explode (" ",$_POST['recherche']);
                    $req = $bdd->prepare('SELECT * FROM Tuteur WHERE numero = :numero');
                    $req->execute(array(
                        'numero' => $numeroTuteur[2]
                    ));
                    $result = $req->fetch();
                    if ($result) {
                        // insert into etudiant
                        $req1 = $bdd->prepare('INSERT INTO Etudiant (nom, prenom, date_naiss, email, numero, idTuteur) VALUES (:nom, :prenom, :ddn, :email, :telephone, :idTuteur)');
                        $req1->execute(array(
                        'nom' => $_POST['nom'],
                        'prenom' => $_POST['prenom'],
                        'ddn' => $_POST['ddn'],
                        'email' => $_POST['email'],
                        'telephone' => $_POST['telephone'],
                        'idTuteur' => $numeroTuteur[2]
                    ));
                        header('Location: ../view/enregistrement.php?success='.$reuissie);
                    } else {
                        $erreur = 'Tuteur non trouvé';
                        header('Location: ../view/enregistrement.php?error='.$erreur);
                    }
              }
                 
            }
            else{
                  
                $numeroTuteur=explode (" ",$_POST['recherche']);
                  $req = $bdd->prepare('SELECT * FROM Tuteur WHERE numero = :numero');
                  $req->execute(array(
                      'numero' => $numeroTuteur[2]
                  ));
                  $result = $req->fetch();
                  if ($result) {
                      // insert into etudiant
                      $req1 = $bdd->prepare('INSERT INTO Etudiant (nom, prenom, date_naiss, email, numero, idTuteur) VALUES (:nom, :prenom, :ddn, :email, :telephone, :idTuteur)');
                      $req1->execute(array(
                      'nom' => $_POST['nom'],
                      'prenom' => $_POST['prenom'],
                      'ddn' => $_POST['ddn'],
                      'email' => $_POST['email'],
                      'telephone' => $_POST['telephone'],
                      'idTuteur' => $numeroTuteur[2]
                  ));
                      
                      header('Location: ../view/enregistrement.php?success='.$reuissie);
                  } else {
                      $erreur = 'Tuteur non trouvé';
                      header('Location: ../view/enregistrement.php?error='.$erreur);
                  }
            }

        }
    }
    else{
        $erreur="Veuillez remplir tous les champs du tuteur";
        header('Location: ../view/enregistrement.php?error='.$erreur);
        }
    
?>