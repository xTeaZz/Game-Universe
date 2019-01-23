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
                <a class="dropdown-item" href="index.php?action=<?=$c['category_name']?>"><?=$c['category_name']?></a>
            <?php } ?>
            </div>
          </div>
        </li>
      </ul>
    </div>
      <p class="textcolor pheader">Bonjour <?=$_SESSION['alias']?></p>
    <!--Espace Membre-->
      <form method="post" action="index.php?action=member">
        <input type="submit" class="btn btn-outline-info marginheader" name="buttonMember" value="Espace membre"></input>
      </form>
    <!--Centre d'administration-->
      <form method="post" action="index.php?action=admin">
        <input type="submit" class="btn btn-outline-primary marginheader" name="buttonAdmin" value="Centre d'administration"></input>
      </form>
    <!--Deconnection-->
      <form method="post" action="index.php?action=logout">
        <input type="submit" class="btn btn-outline-danger marginheader" name="buttonLogout" value="Déconnexion"></input>
      </form>
  </nav>
</header>
