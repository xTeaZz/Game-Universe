<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<?php
  $title = "Modification d'article";
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
      <h1 class="titlestyle">Création d'article</h1>
      <form action="" method="post">
        <div class="form-group">
          <label for="title">Titre</label>
          <input type="text" class="form-control" name="title" value="<?= $post['title']?>">
        </div>
        <div class="form-group">
          <label for="postText">Texte</label>
          <textarea name="postText" class="tinymce"><?= $post['message']?></textarea>
        </div>
        <input type="submit" class="btn btn-success" name="submit" value="Envoyer"></input>
      </form>
    </section>
    <?php require'footer.php'; ?>
  </body>
</html>
