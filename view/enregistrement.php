<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="../assets/bootstrap5/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" defer></script>

    <link
      rel="stylesheet"
      <!--
      href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css"
      --
    />

    <script src="../assets/bootstrap5/js/bootstrap.min.js" defer></script>
    <script src="../assets/jquery-3.6.0.min.js"></script>
    <title>Gestionnaire UFR/SDS</title>
  </head>
  <body class="container">
    <nav class="navbar row">
      <div class="col-12">
        <a class="navbar-brand" href="#">
          <h1
            class="text-center text-success bg-light"
            style="font-size: 3.5rem"
          >
            <img
              src="../assets/img/logo.png"
              alt=""
              style="height: 5rem"
              class="d-inline-block align-text-top"
            />Gestionnaire UFR/SDS
          </h1>
        </a>
      </div>
    </nav>

    <div class="form bg-light col-md-6 p-3 offset-3">
      <div class="row justify-content-between">
        <div class="col-md-4">
          <h1>ENREGISTREMENT</h1>
        </div>
        <div class="col-md-2">
          <a class="btn btn-primary" href="Liste.php">LISTE</a>
        </div>
      </div>
      <form action="../Controller/inscripEtudiant.php" method="POST">
        <div class="form-group mt-2">
          <input
            type="text"
            require
            class="form-control"
            name="nom"
            id="exampleInputEmail1"
            aria-describedby="emailHelp"
            placeholder="Nom"
          />
        </div>
        <div class="form-group mt-2">
          <input
            type="text"
            require
            class="form-control"
            name="prenom"
            id="exampleInputEmail1"
            aria-describedby="emailHelp"
            placeholder="Prenom"
          />
        </div>
        <div class="form-group mt-2">
          <input
            type="date"
            require
            class="form-control"
            name="ddn"
            id="exampleInputEmail1"
            aria-describedby="emailHelp"
            placeholder="Date de naissance "
          />
        </div>
        <div class="form-group mt-2">
          <input
            type="email"
            require
            class="form-control"
            name="email"
            id="exampleInputEmail1"
            aria-describedby="emailHelp"
            placeholder="Email"
          />
        </div>
        <div class="form-group mt-2">
          <input
            type="text"
            class="form-control"
            name="telephone"
            id="exampleInputEmail1"
            aria-describedby="emailHelp"
            placeholder="Telephone"
          />
        </div>

        <div class="d-flex">
          <h5>a t-il un tuteur ?</h5>
          <div class="form-check ms-2">
            <input
              class="form-check-input"
              type="radio"
              name="tuteur"
              id="radio1"
              value="oui"
            />
            <label class="form-check-label" for="flexRadioDefault1 ">
              oui
            </label>
          </div>
          <div class="form-check ms-2">
            <input
              class="form-check-input"
              type="radio"
              name="tuteur"
              id="radio2"
              value="non"
              checked
            />
            <label class="form-check-label" for="flexRadioDefault2">
              non
            </label>
          </div>
        </div>

        <div
          class="form-group mt-2 mb-3 row justify-content-between"
          id="parain"
        >
          <div class="col-md-5 d-flex">
            <span class="input-group-text" id="basic-addon1">
              <i class="fas fa-search"></i>
            </span>
            <input
              type="text "
              class="form-control"
              id="tags"
              name="recherche"
              aria-describedby="emailHelp"
              placeholder="Entrer le nom du tuteur"
            />
          </div>
          <div class="col-md-4">
            <div
              class="btn btn-success"
              data-bs-toggle="modal"
              data-bs-target="#staticBackdrop"
              id="ajout"
            >
              <i class="fas fa-plus"></i> UN TUTEUR
            </div>
          </div>
        </div>
        <?php if (isset($_GET['error'])) {
            echo '<div class="alert alert-danger"> 
            <strong>Erreur!</strong> ' . $_GET['error'] . 
            '</div>';
            if (isset($_GET['success'])) {
              echo '<div class="alert alert-success"> 
              <strong>Succès!</strong> ' . $_GET['success'] . 
              '</div>';
            }
          } ?>
      
        <div class="row justify-content-center">
          <div class="col-3">
            <button class="btn btn-primary">Enregistrer</button>
          </div>
        </div>
        <div
          class="modal fade"
          id="staticBackdrop"
          data-bs-backdrop="static"
          data-bs-keyboard="false"
          tabindex="-1"
          aria-labelledby="staticBackdropLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">
                  Enregistrement du tuteur
                </h5>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">
                <div class="form-group mb-2">
                  <input
                    type="text"
                    class="form-control"
                    name="nomtuteur"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    placeholder="Nom"
                  />
                </div>
                <div class="form-group mb-2">
                  <input
                    type="text"
                    class="form-control"
                    name="prenomtuteur"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    placeholder="Prenom"
                  />
                </div>
                <div class="form-group mb-2">
                  <input
                    type="email"
                    class="form-control"
                    name="emailtuteur"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    placeholder="Email"
                  />
                </div>
                <div class="form-group mb-2">
                  <input
                    type="text"
                    class="form-control"
                    name="telephonetuteur"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    placeholder="Telephone"
                  />
                </div>
              </div>
              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-danger"
                  data-bs-dismiss="modal"
                >
                  Fermer
                </button>
                <button type="button" data-bs-dismiss="modal" class="btn btn-success">
                  Enregistrer 
                </button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <!-- Button trigger modal -->
    <!-- Modal -->
  </body>
    <?php  
     include('../Controller/con_conf.php');
     $query = $bdd->query("SELECT * FROM Tuteur");
      $data = $query->fetchAll();
    ?>
    <script>
      $( function() {
      var availableTags = [
      <?php 
      foreach ($data as $key => $value) {
        echo '"'.$value['nom'].' '.$value['prenom'].''.$value['numero'].'",';
      }
      ?>
      ];
      $( "#tags" ).autocomplete({
        source: availableTags
      });
      } );

    $("#parain").hide();
    $("#radio1").click(function () {
      $("#parain").show();
    });
    $("#radio2").click(function () {
      $("#parain").hide();
    });
  </script>
</html>
