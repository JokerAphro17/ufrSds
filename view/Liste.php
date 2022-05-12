<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../assets/bootstrap5/css/bootstrap.min.css" />
    <script src="../assets/bootstrap5/js/bootstrap.min.js" defer></script>
    <link rel="stylesheet" href="../assets/jquery.dataTables.min.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <script src="../assets/jquery.dataTables.min.js" defer></script>
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
    <div class="row justify-content-between">
      <div class="col-md-4">
        <h1>Liste des Etudiants</h1>
      </div>
      <div class="col-md-2">
        <a class="btn btn-primary" href="inscription.html">
          <i class="fas fa-plus"></i> Ajouter
        </a>
      </div>
    </div>
    <table
      id="myTable"
      class="table table-striped table-bordered"
      style="width: 100%"
    >
      <thead>
        <tr>
          <th>Nom</th>
          <th>Prenom</th>
          <th>Date_N</th>
          <th>Email</th>
          <th>Telephone</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Ilboudo</td>
          <td>Omar</td>
          <td>01/01/2000</td>
          <td>ilbouoomar27@gmail.com</td>
          <td>+226 85 95 84 58</td>
          <td>
            <button
              class="btn btn-warning text-light"
              data-bs-target="#voir"
              data-bs-toggle="modal"
              alt="infos du tuteur"
            >
              <i class="fa-solid fa-eye"></i>
            </button>
            <button
              class="btn btn-success"
              data-bs-target="#modification"
              data-bs-toggle="modal"
            >
              <i class="fa-solid fa-edit"></i>
            </button>
            <button
              class="btn btn-danger"
              data-bs-toggle="modal"
              data-bs-target="#supprimer"
            >
              <i class="fa-solid fa-trash"></i>
            </button>
          </td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <th>Nom</th>
          <th>Prenom</th>
          <th>Date Naiss</th>
          <th>Email</th>
          <th>Telephone</th>
          <th>Action</th>
        </tr>
      </tfoot>
    </table>
    <!-- Button trigger modal -->

    <!-- Modal  suppresion-->
    <div
      class="modal fade"
      id="supprimer"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content border border-3 border-danger">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">
              SUPPRESSION [ NOM DE L'ETUDIANT]
            </h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            Voulez-vous vraiment supprimer cet etudiant ?
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Annuler
            </button>
            <button type="button" class="btn btn-danger">Supprimer</button>
          </div>
        </div>
      </div>
    </div>
    <!--fin  Modal  suppresion-->
    <!-- Modal modification -->
    <div
      class="modal fade"
      id="modification"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel1">Modification d'infos</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form action="controller/update.php" method="POST">
            <div class="form-group mb-2">
                  <input
                    type="text"
                    class="form-control"
                    name="nom"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    placeholder="Nom"
                  />
                </div>
                <div class="form-group mb-2">
                  <input
                    type="text"
                    class="form-control"
                    name="prenom"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    placeholder="Prenom"
                  />
                </div>
                <div class="form-group mb-2">
                  <input
                    type="date"
                    class="form-control"
                    name="date_n"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    placeholder="Date de naissance"
                  />
                </div>

                <div class="form-group mb-2">
                  <input
                    type="email"
                    class="form-control"
                    name="email"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    placeholder="Email"
                  />
                </div>
                <div class="form-group mb-2">
                  <input
                    type="text"
                    class="form-control"
                    name="telephone"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    placeholder="Telephone"
                  />
                </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              fermé 
            </button>
            <button type="submit" class="btn btn-primary">Understood</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!--fin  Modal modification-->
    <!-- Modal voir -->
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div
      class="modal fade"
      id="voir"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              NOM DE L'ETUDIANT
            </h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <h5>TUTEUR: NOM DU TUTEUR</h5>
            <h5>EMAIL:ilboudosouleymane4@gmail.com</h5>
            <h5>TELEPHONE : +226 85 95 84 58</h5>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
    <!--fin  Modal voir-->
  </body>
  <script>
    $(document).ready(function () {
      $("#myTable").DataTable();
    });
  </script>
</html>
