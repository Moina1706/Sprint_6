

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/ico" href="../img/index.png" />
    <title>Header</title>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
  </head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Liste complete</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarcigarette" role="button" data-bs-toggle="dropdown" aria-expanded="false">Vapoteuses</a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="read_ci_ref.php">par References</a></li>
            <li><a class="dropdown-item" href="read_ci_nom.php">par Nom</a></li>
            <li><a class="dropdown-item" href="read_ci_prixachat.php">par Prix d'achat</a></li>
            <li><a class="dropdown-item" href="read_ci_prixvente.php">par Prix de vente</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="read_ci_quantite.php">par Quantite</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            E-Liquides
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
          <li><a class="dropdown-item" href="read_li_ref.php">par References</a></li>
            <li><a class="dropdown-item" href="read_li_nom.php">par Nom</a></li>
            <li><a class="dropdown-item" href="read_li_prixachat.php">par Prix d'achat</a></li>
            <li><a class="dropdown-item" href="read_li_prixvente.php">par Prix de vente</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="read_li_quantite.php">par Quantite</a></li>
          </ul>
        </li>
        
      </ul>


      <form class="d-flex" action="search_ref.php" method="POST">
        <input class="form-control me-2" type="search" placeholder="Recherche par réference" name="search_ref" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</body>
</html>