<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<?php
  $title = "Création d'articles";
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
          <input type="text" class="form-control" name="title" placeholder="Titre">
        </div>
        <div class="form-group">
          <label for="postText">Texte</label>
          <textarea name="postText" class="tinymce"></textarea>
        </div>
        <div class="reply">
          <label for="title">Catégories</label>
          <select class="form-control" name="categories">
          <?php while($c = $category2->fetch()): ?>
            <option value = <?=$c['id']?>><?=$c['category_name']?></option>
          <?php endwhile; ?>
          
          </select>
        </div>
        <div class="form-group">
            <label for="picture">Image</label>
            <input type="file" class="form-control" id="picture" name="picture">
        </div>
        <input type="submit" class="btn btn-success" name="submit" value="Envoyer">
      </form>
    </section>
    <?php require'footer.php'; ?>
  </body>
</html>
