<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= isset($title) ? e($title): 'Mon site' ?></title>
    <link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/main.css">

</head>
<body>

<!-- navbar -->

<nav class="navbar navbar-expand-lg fixed-top ">
    <a class="navbar-brand" href="#">Accueil</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav mr-4">

            <li class="nav-item">
                <a class="nav-link" data-value="about" href="#">A propos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " data-value="blog" href="#">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " data-value="contact" href="#">Contact</a>
            </li>
        </ul>

    </div>
</nav>

<div class="container mt-4">
    <?= $content ?>
</div>

<footer class="bg-light py-4 footer mt-auto">
    <div class="container">

    </div>
</footer>

<!-- add Javascript file from js file -->

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src='js/main.js'></script>

</body>
</html>