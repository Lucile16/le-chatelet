<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
      <meta name='author' content="Lucile BEUCHER">
      <meta name='keywords' content="bts, sio, recettes">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      
      <!--Logo ??-->
  </head>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="index.php?page=0">Site de recettes</a>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav me-auto mb-2 mb-lg-0">
              <a class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=='home.php'){ ?>active<?php } ?>" href="index.php?page=0" id="accueil">Accueil</a>
              <a class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=='list_recipes.php'){ ?>active<?php } ?>" href="index.php?page=1" id="recettes">Recettes</a>
              <a class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=='contact.php'){ ?>active<?php } ?>" href="index.php?page=6" id="contact">Contact</a>
          </div>
        </div>

        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </nav>
  </header>