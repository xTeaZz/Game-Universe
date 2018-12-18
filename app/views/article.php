<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <?php
  $title = $post['title'];
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
        <div>
          <h1><?=$post['title']?></h1>
          <p><?=$post['message']?></p>
        </div>
        <div>
          <button class="btn btn-primary titlestyle" type="button" data-toggle="modal" data-target="#comment">Ecrire un commentaire</button>
          <div id="comment" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header center">
                  Veuillez saisir votre commentaire
                </div>
                <div class="modal-body">
                  <form method="post" action="index.php?action=comment&id=<?= $post['id'] ?>">
                    <div class="form-group">
                      <label for="commentArea">Commentaire</label>
                      <textarea class="form-control" id="commentArea" name="comment" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal" name="button">Annuler</button>
                      <input type="submit" class="btn btn-success" name="buttonSign"></input>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div>
          <?php while($c = $commentary->fetch()) { ?>
          <div class="card">
            <div class="card-header">
              <?= $c['alias'] ?>
            </div>
            <div class="card-body">
              <blockquote class="blockquote mb-0">
                <p><?= $c['comment_text'] ?></p>
                <a href="index.php?action=report&id=<?= $c['c_id'] ?>" class="btn btn-danger">Signaler</a>
              </blockquote>
            </div>
          </div>
          <?php } ?>
      </section>
      <?php require'footer.php' ?>
    </body>
</html>
