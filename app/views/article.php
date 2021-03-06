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
          <h2><?=$post['category_name']?></h2>
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
                  <form method="post" action="index.php?action=comment&id=<?= $post['p_id'] ?>">
                    <div class="form-group">
                      <label for="commentArea">Commentaire</label>
                      <textarea class="form-control" id="commentArea" name="comment" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal" name="button">Annuler</button>
                      <input type="submit" class="btn btn-success" name="buttonSign">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div>         
        <?php 
          $first = 0;
            foreach ($commentary as &$c) {
              if ($first != 0 && $c['id_parent'] == 0) { ?>
                </div>
                </div>
                <div class="card">
            <div class="card-header">
              <?= $c['alias'] ?>
              <?php
                $filename = 'src/avatar/'.$c['id_user'].'.jpg';
                if (file_exists($filename)) {
                    $filename = $c['id_user'];
                } else {
                  $filename = "anonymous";
                }
              ?>
              <img class="avatar" src="src/avatar/<?=$filename?>.jpg" alt="Card image cap">
            </div>
            <div class="card-body">
              <blockquote class="blockquote mb-0">
                <p><?= $c['comment_text'] ?></p>
                <div class="reply">
                  <button class="btn btn-success" type="button" data-toggle="modal" data-target="#reply">Répondre</button>
                    <div id="reply" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header center">
                            Veuillez saisir votre réponse
                          </div>
                          <div class="modal-body">
                            <form method="post" action="index.php?action=reply&id=<?= $c['c_id'] ?>&post=<?= $post['p_id'] ?>">
                              <div class="form-group">
                                <label for="commentArea">Réponse</label>
                                <textarea class="form-control" id="commentArea" name="comment" rows="3"></textarea>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" name="button">Annuler</button>
                                <input type="submit" class="btn btn-success" name="buttonSign">
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  <a href="index.php?action=report&id=<?= $c['c_id'] ?>&postid=<?= $post['p_id'] ?>" class="btn btn-danger">Signaler</a>
                </div>

              <?php } ?>
              <?php if($first == 0 && $c['id_parent'] == 0) { 
                $first = $c['c_id'];?>
            <div class="card">
            <div class="card-header">
              <?= $c['alias'] ?>
              <?php
                $filename = 'src/avatar/'.$c['id_user'].'.jpg';
                if (file_exists($filename)) {
                    $filename = $c['id_user'];
                } else {
                  $filename = "anonymous";
                }
              ?>
              <img class="avatar" src="src/avatar/<?=$filename?>.jpg" alt="Card image cap">
            </div>
            <div class="card-body">
              <blockquote class="blockquote mb-0">
                <p><?= $c['comment_text'] ?></p>
                <div class="reply">
                  <button class="btn btn-success" type="button" data-toggle="modal" data-target="#reply">Répondre</button>
                    <div id="reply" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header center">
                            Veuillez saisir votre réponse
                          </div>
                          <div class="modal-body">
                            <form method="post" action="index.php?action=reply&id=<?= $c['c_id'] ?>&post=<?= $post['p_id'] ?>">
                              <div class="form-group">
                                <label for="commentArea">Réponse</label>
                                <textarea class="form-control" id="commentArea" name="comment" rows="3"></textarea>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" name="button">Annuler</button>
                                <input type="submit" class="btn btn-success" name="buttonSign">
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  <a href="index.php?action=report&id=<?= $c['c_id'] ?>&postid=<?= $post['p_id'] ?>" class="btn btn-danger">Signaler</a>
                </div>
              <?php } ?>
                  <?php if($c['id_parent'] != 0) { ?>
                    <div class="card">
                    <div class="card-header">
                      <?= $c['alias'] ?>
                      <?php
                        $filename = 'src/avatar/'.$c['id_user'].'.jpg';
                        if (file_exists($filename)) {
                            $filename = $c['id_user'];
                        } else {
                          $filename = "anonymous";
                        }
                      ?>
                      <img class="avatar" src="src/avatar/<?=$filename?>.jpg" alt="Card image cap">
                    </div>
                    <div class="card-body">
                      <blockquote class="blockquote mb-0">
                        <p><?= $c['comment_text'] ?></p>
                        <a href="index.php?action=report&id=<?= $c['c_id'] ?>&postid=<?= $post['p_id'] ?>" class="btn btn-danger">Signaler</a>
                      </blockquote>
                    </div>
                  </div>
                  <?php }                  
                  }?>
              </blockquote>
            </div>
          </div>
      </section>
      <?php require'footer.php' ?>
    </body>
</html>