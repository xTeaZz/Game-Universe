<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<?php
  $title = "Modification des informations du compte";
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
      <h1 class="titlestyle">Modification des informations du compte</h1>
    <form action="index.php?action=changeEmail" method="post">
        <div class="form-group">
            <label for="newEmail">Nouveau Email</label>
            <input type="email" class="form-control" id="newEmail" name="newEmail" aria-describedby="emailHelp" placeholder="Nouveau Email">
        </div>
        <input type="submit" class="btn btn-success" name="changeEmail" value="Modifier">
    </form>
    <form action="index.php?action=changePassword">
        <div class="form-group">
            <label for="newPassword">Nouveau mot de passe</label>
            <input type="password" class="form-control" id="newPassword"  name="newPassword" placeholder="Nouveau mot de passe">
        </div>
            <input type="submit" class="btn btn-success" name="changePassword" value="Modifier">
        </form>
    </section>
    <?php require'footer.php'; ?>
  </body>
</html>
