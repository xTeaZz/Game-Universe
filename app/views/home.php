<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <!--Head-->
  <?php
    $title = "Game Universe";
    require'head.php';
    ?>
  <!--Body-->
  <body class="sectionbackground">
    <!--Header-->
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
    <!--Hero-->
    <section class="herosection sectionmargin">
      <div class="hero">
        <div class="herocaption center">
          <h1>Game Universe</h1>
        </div>
      </div>
    </section>
    <!--Episodes-->
    <section class="container sectionmargin row justify-content-around" id="episodes">
    <?php while($p = $post->fetch()) { ?>
      <div class="card col-4" style="width: 18rem;">
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
          <a class="btn btn-primary" href="?action=article&id=<?= $p['id'] ?>">Lire l'article</a>
        </div>
      </div>
    <?php } ?>
    </section>
    <!--Footer-->
    <?php require'footer.php' ?>
  </body>
</html>
