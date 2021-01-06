<?php
/** @var string $contentHTML */
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dolný Kubín</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
            integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://localhost/semka/public/css.css">
    <script src="http://localhost/semka/public/js.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="?c=home">
        <img src="semka/public/Pictures/erb.png" alt="erb.jpg, 102kB">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="?c=home">Domov <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="?c=home&a=omeste">O meste <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="?c=home&a=historia">História <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="?c=home&a=pamiatky">Pamiatky <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Inzercia
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="?c=inzercia">Pozri inzeraty</a>
                    <a class="dropdown-item" href="?c=inzercia&a=pridaj">Pridaj inzerat</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Fórum
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="?c=forum">Pozri fórum</a>
                    <?php if (\App\Models\Auth::getInstance()->isLogged()) { ?>
                        <a class="dropdown-item" href="?c=forum&a=mojprofil">Moje príspevky</a>
                        <a class="dropdown-item" href="?c=forum&a=pridat">Pridaj príspevok</a>
                    <?php } ?>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav text-right">
            <?php if (!\App\Models\Auth::getInstance()->isLogged()) { ?>
                <li class="nav-item active">
                    <a class="nav-link" href="?c=login">Login <span class="sr-only">(current)</span></a>
                </li>
            <?php } else { ?>
                <li class="nav-item active nav-link">
                    Prihlásený používateľ: <?= \App\Models\Auth::getInstance()->getLoggedUser()->getLogin() ?>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="?c=login&a=logout">Odhlásiť <span class="sr-only">(current)</span></a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>
<p id="loggedUser"
   class="hidden"><?= (\App\Models\Auth::getInstance()->isLogged()) ? \App\Models\Auth::getInstance()->getLoggedUser()->getLogin() : "" ?>
</p>

<div class="web-content">
    <?= $contentHTML ?>
</div>
</body>
</html>