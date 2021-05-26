<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= isset($title) ? e($title): 'Mon site' ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/script.js"></script>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-expand-md navbar-dark sticky-top">
    <a class="navbar-brand" href="#"></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
        <i class="fas fa-bars fa-lg"></i>
    </button>

    <div class="collapse navbar-collapse justify-content-center" id="myNavbar">
        <ul class="nav nav-pills navbar-nav">
            <li class="nav-item"><a class="nav-link goto" href="#home">Accueil</a></li>
            <li class="nav-item"><a class="nav-link goto" href="#skills">Compétences</a></li>
            <li class="nav-item"><a class="nav-link goto" href="#about">À propos</a></li>
            <li class="nav-item"><a class="nav-link goto" href="#contact">Contact</a></li>
            <li class="nav-item"><a class="nav-link" href="blog">Blog</a></li>
        </ul>
    </div>
</nav>

<?= $content ?>

</body>
</html>