<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <!--Head-->
  <?php
    $title = "Billet simple pour l'Alaska";
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
          <h1 class="">Un billet simple pour l'Alaska</h1>
          <p>Un Roman écrit par Jean Forteroche</p>
        </div>
      </div>
    </section>
    <!--Episodes-->
    <section class="container sectionmargin row justify-content-around" id="episodes">
    <?php while($p = $post->fetch()) { ?>
      <div class="card col-4" style="width: 18rem;">
        <img class="card-img-top" src="public/pictures/Alaska.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"><?= $p['title'] ?></h5>
          <p class="card-text"><?= $p['message'] = mb_substr($p['message'], 0, strpos($p['message'], ' ', 100));?></p>
          <a class="btn btn-primary" href="?action=article&id=<?= $p['id'] ?>">Lire l'article</a>
        </div>
      </div>
    <?php } ?>
    </section>
    <!--Biography-->
    <section class="sectionmargin container" id="bio">
      <div class="jumbotron">
        <h1 class="display-4">Jean Forteroche</h1>
        <p class="lead">né le 21 juin 1948 à Łódź, est un écrivain polonais, auteur d'histoires fantastiques et de fantasy.</p>
        <hr class="my-4">
        <p>Jean Forteroche a étudié l'économie et, avant de se mettre à l'écriture, a travaillé en tant que représentant de ventes senior pour une compagnie d'échanges internationaux. Sa première nouvelle, Le Sorceleur (Wiedźmin), fut publiée en 1986 dans Fantastyka, le magazine de littérature fantastique polonais de référence, et reçut un énorme succès de la part des critiques.</p>
        <a class="btn btn-primary btn-lg" href="?action=bio" role="button">Lire la suite</a>
      </div>
    </section>
    <!--Footer-->
    <?php require'footer.php' ?>
  </body>
</html>
