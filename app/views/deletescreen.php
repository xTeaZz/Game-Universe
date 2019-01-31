<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <?php
    $title = "Liste des episodes";
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
        <?php while($p = $post->fetch()) { ?>
        <div class="rows">
          <div class="card marginlist">
            <img class="card-img-top" src="src/images/test.png" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title"><?= $p['title'] ?></h5>
            <p class="card-text">
          <?php 
            $str = $p['message'];
          if (strlen($str) <= 100) {
            $p['message'] = $str;
          }
          else {
            $p['message'] = mb_substr($p['message'], 0, strpos($p['message'], ' ', 100));
          }
          ?>
            <?= $p['message']?>
          </p>
            <a class="btn btn-danger" href="?action=deletepost&id=<?= $p['id'] ?>">Supprimer l'article</a>
          </div>
        </div>
        <?php } ?>
      </section>
      <?php require'footer.php'; ?>
    </body>
</html>
