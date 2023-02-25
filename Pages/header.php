<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
      <meta name='author' content="Mathias, Pierre, Tony, Lucile">
      <meta name='keywords' content="epsi, chatelet, infra">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <!-- <link rel="icon" type="image/png" sizes="32x32" href="./Images/favicon-32x32.png"> -->
      <title>Clinique LE CHATELET</title>
  </head>

  <?php session_start(); ?>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand fw-bold text-dark" href="index.php?page=0">
          <img src="./Images/favicon-32x32.png" alt="Logo" width="24" height="24" class="d-inline-block align-text-top me-2">
          Le Chatelet
        </a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav me-auto mb-2 mb-lg-0">
              <a class="nav-link <?php if(basename($_SERVER['PHP_SELF'])  =='recommandations.php'){ ?>active<?php } ?>" href="index.php?page=1">Recommandations de la CNIL</a>
          </div>
        </div>
        <?php if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) { ?>
        <a class="d-flex btn btn-success" href="index.php?page=2">Se connecter</a>
        <?php }  else { ?>
        <a class="d-flex btn btn-danger" href="index.php?page=3">Se déconnecter</a>
        <?php } ?>
      </div>
    </nav>
  </header>