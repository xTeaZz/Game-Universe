<header class="navbarfixed">
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Game Universe</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="index.php?action=episodes" class="btn btn-secondary">Actualités</a>
        </li>
        <li class="nav-item">
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Catégories
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <?php while($c = $category->fetch()) { ?>
                <a class="dropdown-item" href="index.php?action=<?=$c['id']?>"><?=$c['category_name']?></a>
            <?php } ?>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <!--Inscription-->
    <div>
      <button class="btn btn-outline-warning" type="button" data-toggle="modal" data-target="#sign">Inscription</button>
      <div id="sign" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header center">
              Veuillez entrer vos identifiants d'Inscription
            </div>
            <div class="modal-body">
              <form method="post" action="index.php?action=signin">
                <div class="form-group">
                  <label>Pseudo</label>
                  <input type="text" class="form-control" name="alias" placeholder="Pseudo">
                </div>
                <div class="form-group">
                  <label>Adresse Email</label>
                  <input type="email" class="form-control" name="mail" aria-describedby="emailHelp" placeholder="Adresse Email">
                </div>
                <div class="form-group">
                  <label>Mot de Passe</label>
                  <input type="password" class="form-control" name="pass" placeholder="Mot de Passe">
                </div>
                <div class="form-group">
                  <div class="g-recaptcha" data-sitekey="6LdR-IQUAAAAAP_fREsTgi9YR7x8Q-BVj3jLGfHy"></div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" name="button">Annuler</button>
                <input type="submit" class="btn btn-success" name="buttonSign">
              </div>
            </form>
          </div>
        </div>
      </div>
      <!--Connection-->
      <button class="btn btn-outline-success" type="button" data-toggle="modal" data-target="#login">Connexion</button>
      <div id="login" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header center">
              Veuillez entrer vos identifiants
            </div>
            <div class="modal-body">
              <form method="post" action="index.php?action=login">
                <div class="form-group">
                  <label>Mail</label>
                  <input type="text" class="form-control" name="mail" placeholder="Mail">
                </div>
                <div class="form-group">
                  <label>Mot de Passe</label>
                  <input type="password" class="form-control" name="pass" placeholder="Mot de Passe">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" name="button">Annuler</button>
                <input type="submit" class="btn btn-success" name="buttonLogin">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </nav>
</header>
