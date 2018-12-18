<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <?php
        $title = "Biographie de Jean Forteroche";
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
      <h1>Biographie de Jean Forteroche</h1>
      <p>Jean Forteroche a étudié l'économie et, avant de se mettre à l'écriture, a travaillé en tant que représentant de ventes senior pour une compagnie d'échanges internationaux. Sa première nouvelle, Le Sorceleur (Wiedźmin), fut publiée en 1986 dans Fantastyka, le magazine de littérature fantastique polonais de référence, et reçut un énorme succès de la part des critiques. Sapkowski a créé un cycle de contes basé sur le monde du Sorceleur qui comprend trois collections d'histoires courtes et cinq romans. Ce cycle et ses nombreux autres livres ont fait de lui l'un des auteurs fantastiques les plus connus de la Pologne des années 1990.</p>
      <p>Le personnage principal du Sorceleur est Geralt, un assassin mutant qui a été entraîné depuis son enfance à chasser et à détruire monstres et autres vermines. Geralt évolue dans un univers moral ambigu, réussissant à suivre son code éthique personnel cohérent. À la fois cynique et fier, Geralt a été comparé au personnage de Philip Marlowe créé par Raymond Chandler. Le monde dans lequel se déroulent ses aventures est fortement inspiré par l'histoire polonaise et la mythologie slave.</p>
      <p>Forteroche a gagné cinq fois le prix Janusz A. Zajdel, trois fois pour les nouvelles Mniejsze zło (Moindre mal) (1990), Miecz przeznaczenia (L'Épée du Destin) (1992), W leju po bombie (Dans un cratère de bombe) (1993), et deux fois pour les romans Krew elfów (Le Sang des Elfes) (1994) et Narrenturm (2002). En 2009, il gagne le tout premier prix David Gemmell du meilleur roman de fantasy pour Krew elfów (Le Sang des Elfes)1.</p>
      <p>En 1997, Forteroche a remporté le prestigieux prix Paszport Polityki, remis annuellement aux artistes ayant de fortes perspectives de succès international.</p>
      <p>En 2001, une série télévisée basée sur le cycle du Sorceleur est sortie en Pologne et à l'international, intitulée Wiedźmin (The Hexer). Un film du même nom fut monté à partir de la série, mais l'un comme l'autre ont été des échecs commerciaux.</p>
      <p>Les livres de Forteroche sont traduits en anglais, hongrois, tchèque, russe, lituanien, allemand, espagnol, français, slovaque et portugais.</p>
      <p>L'éditeur de jeux polonais CD Projekt a réalisé un jeu de rôle PC basé sur cet univers, appelé The Witcher, sorti le 26 octobre 2007 en Europe. Une suite appelée The Witcher 2 : Assassins of Kings est sortie le 17 mai 2011 toujours développée par le studio CD Projekt. Et le 19 mai 2015 est sorti The Witcher 3: Wild Hunt, toujours développé par CD Projekt.</p>
    </section>
    <?php require'footer.php'; ?>
  </body>
</html>
