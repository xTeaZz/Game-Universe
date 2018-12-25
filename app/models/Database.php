<?php

namespace App\models;

  class Database {

    /*Effectue une connexion avec la base de données*/

    public function getConnection() {
      $db = new \PDO('mysql:host=localhost;dbname=jonathan_gameuniverse', 'root', '');
      return $db;
    }

  }

?>
