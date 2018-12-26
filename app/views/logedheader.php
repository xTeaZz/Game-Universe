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
          <a class="nav-link" href="?action=episodes">Actualités<span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?action=bio">Catégories<span class="sr-only"></span></a>
        </li>
      </ul>
    </div>
      <p class="textcolor pheader">Bonjour <?=$_SESSION['alias']?></p>
    <!--Deconnection-->
      <form method="post" action="index.php?action=logout">
        <input type="submit" class="btn btn-outline-danger marginheader" name="buttonLogout" value="Déconnexion"></input>
      </form>
  </nav>
</header>
