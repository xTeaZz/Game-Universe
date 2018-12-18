<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<?php
  $title = "Création de compte";
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

      </section>
      <?php require'footer.php' ?>
    </body>
</html>
