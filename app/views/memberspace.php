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
          <a href="?action=createpost" class="btn btn-primary">Aller ici</a>
        </div>
      </div>
      <div class="card text-center titlestyle">
        <div class="card-body">
          <h5 class="card-title">Supprimer son compte</h5>
          <p class="card-text">Supprime toutes les informations du compte</p>
          <a href="?action=deleteuser&id=<?= $_SESSION['id'] ?>" class="btn btn-danger">Supprimer</a>
        </div>
      </div>
    </section>
    <?php require'footer.php'; ?>
  </body>
</html>
