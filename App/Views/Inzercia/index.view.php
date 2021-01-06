<?php /** @var Array $data */ ?>
<div class="zaklad modrePozadie">
    <div class="nadpis">
        <h1>MESTSKÁ INZERCIA</h1>
    </div>
    <div class="fotogaleria">
        <?php /** @var \App\Models\Inzerat $inzerat */
        foreach ($data as $inzerat) { ?>
            <div class="cardInzerat card foto foto2" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $inzerat->getNadpis() ?></h5>
                    <p class="card-text"><?= $inzerat->getText() ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Typ: </b><?= $inzerat->getTyp() ?> </li>
                    <li class="list-group-item"><b>Kategória: </b><?= $inzerat->getKategoria() ?> </li>
                    <?php if (!empty($inzerat->getCena())) { ?>
                        <li class="list-group-item"><b>Cena: </b><?= $inzerat->getCena() ?>€</li>
                    <?php } else { ?>
                        <li class="list-group-item"><b>Cena: </b> dohodou</li>
                    <?php } ?>
                    <?php if (!empty($inzerat->getTelefonneCislo())) { ?>
                        <li class="list-group-item"><b>Telefónne číslo: </b><?= $inzerat->getTelefonneCislo() ?> </li>
                    <?php } ?>
                    <?php if (!empty($inzerat->getEmail())) { ?>
                        <li class="list-group-item"><b>Email: </b><?= $inzerat->getEmail() ?> </li>
                    <?php } ?>
                </ul>
                <div class="card-body">
                    <a class="card-link" href="?c=inzercia&a=uprav&id=<?= $inzerat->getId() ?>">Upraviť</a>
                    <a class="card-link" href="?c=inzercia&a=zmaz&id=<?= $inzerat->getId() ?>">Zmazať</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>