<?php
require_once './con_conf.php'; 
if($_POST['nom'] != '' && $_POST['prenom'] != '' && $_POST['ddn'] != '' && $_POST['email'] != '' && $_POST['telephone'] != '')
    {
        if ($_POST['tuteur'] == 'non') {
            $req = $bdd->prepare('INSERT INTO Etudiant(nom, prenom, date_naiss, email, numero) VALUES(:nom, :prenom, :ddn, :email, :telephone)');
            $req->execute(array(
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'ddn' => $_POST['ddn'],
                'email' => $_POST['email'],
                'telephone' => $_POST['telephone']
            ));
            $reuissie = 'Inscription réussie';
            header('Location: ../view/enregistrement.php?success='.$reuissie);
        } else {
            if( ($_POST['nomtuteur'] != '' && $_POST['prenomtuteur'] != '' && $_POST['emailtuteur'] != '' && $_POST['telephonetuteur'] != ''))
             {
               try { 
                   $req1 = $bdd->prepare('INSERT INTO Etudiant (nom, prenom, date_naiss, email, numero, idTuteur) VALUES (:nom, :prenom, :ddn, :email, :telephone, :idTuteur)');
                    $req1->execute(array(
                    'nom' => $_POST['nom'],
                    'prenom' => $_POST['prenom'],
                    'ddn' => $_POST['ddn'],
                    'email' => $_POST['email'],
                    'telephone' => $_POST['telephone'],
                    'idTuteur' => $_POST['telephonetuteur']
                ));
                $req1->closeCursor();
                $req2 = $bdd->prepare('INSERT INTO Tuteur(nom, prenom, numero, email) VALUES(:nom, :prenom, :numero, :email)');
                $req2->execute(array(
                    'nom' => $_POST['nomtuteur'],
                    'prenom' => $_POST['prenomtuteur'],
                    'numero' => $_POST['telephonetuteur'],
                    'email' => $_POST['emailtuteur']
                ));
                $reuissie = 'ok';
               }
                catch (Exception $e) {
                    $erreur = 'Erreur : ' . $e->getMessage();
                }
                 
            }else{
                $erreur = 'Veuillez remplir tous les champs';
            }
        }
        if($reuissie == 'ok'){
            header('Location: ../view/enregistrement.php?success='.$reuissie);
        }else{
            header('Location: ../view/enregistrement.php?error='.$erreur);
        }
    }

            


                



?>