<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <?php
        $title = "Centre d'administration";
        require'head.php';
      ?>
  <body>
    <?php
      if (isset($_SESSION['alias'])) {
        if ($_SESSION['admin'] == 1) {
          require'adminheader.php';
        }
        else{
          require'logedheader.php';
        }
      }
      else {
        require'header.php';
      }
    ?>
    <section class="container paddingtop">
      <h1 class="titlestyle">Espace membre</h1>
      <div class="card text-center titlestyle">
        <div class="card-body">
          <h5 class="card-title">Modifier ses informations</h5>
          <p class="card-text">Modifier les informations tel que pseudo, mot de passe etc...</p>
          <a href="?action=edituser" class="btn btn-primary">Aller ici</a>
        </div>
      </div>
      <div class="card text-center titlestyle">
        <div class="card-body">
          <h5 class="card-title">Supprimer son compte</h5>
          <p class="card-text">Supprime toutes les informations du compte</p>
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
            Supprimer
          </button>
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Voulez vous vraiment supprimer votre compte ?</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                  <a href="?action=deleteuser&id=<?= $_SESSION['id'] ?>" class="btn btn-danger">Supprimer</a>
                </div>
              </div>
            </div>
          </div>         
        </div>
      </div>
    </section>
    <?php require'footer.php'; ?>
  </body>
</html>
