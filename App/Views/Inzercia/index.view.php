<?php /** @var Array $data */ ?>

<div class="galeria inzercia">
    <?php /** @var \App\Models\Inzerat $inzerat */
    foreach ($data as $inzerat) { ?>
        <div class="card obrazok" style="width: 18rem;">
            <!--<img class="card-img-top" src="..." alt="Card image cap">-->
            <div class="card-body">
                <h5 class="card-title"><?= $inzerat->getNadpis() ?></h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Typ: </b><?= $inzerat->getTyp() ?> </li>
                <li class="list-group-item"><b>Kategoria: </b><?= $inzerat->getKategoria() ?> </li>
                <?php if (!empty($inzerat->getCena())) { ?>
                    <li class="list-group-item"><b>Cena: </b><?= $inzerat->getCena() ?>€</li>
                <?php } else { ?>
                    <li class="list-group-item"><b>Cena: </b> dohodou</li>
                <?php } ?>
                <?php if (!empty($inzerat->getTelefonneCislo())) { ?>
                    <li class="list-group-item"><b>Telefonne cislo: </b><?= $inzerat->getTelefonneCislo() ?> </li>
                <?php } ?>
                <?php if (!empty($inzerat->getEmail())) { ?>
                    <li class="list-group-item"><b>Email: </b><?= $inzerat->getEmail() ?> </li>
                <?php } ?>
            </ul>
            <div class="card-body">
                <a href="#" class="card-link">Podrobnosti</a>
                <a href="#" class="card-link">Upravit</a>
                <a href="#" class="card-link">Zmazat</a>
            </div>
        </div>
    <?php } ?>
</div>