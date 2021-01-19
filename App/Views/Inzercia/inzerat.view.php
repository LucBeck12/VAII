<div class="buttonPridaj">
    <a <?php if (\App\Models\Auth::getInstance()->isLogged()) { ?> href="?c=inzercia&a=pridaj" <?php } else { ?>
        href="?c=login" <?php } ?> class="btn btn-primary">Pridaj inzerát</a>
</div>
<div class="fotogaleria">
    <?php /** @var \App\Models\Inzerat[] $data */
    if (count($data) == 0) { ?>
        <div class="text">
            <p>Zatiaľ neboli pridané žiadne inzeráty.</p>
        </div>
    <?php } else {
        foreach ($data as $inzerat) { ?>
            <div class="cardInzerat card foto foto2" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $inzerat->getNadpis() ?></h5>
                    <p class="card-text"><?= $inzerat->getText() ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Typ: </b>
                        <a class="card-link"
                           href="<?= $inzerat->getTyp() == "Kúpim" ? "?c=inzercia&a=kupim" : "?c=inzercia&a=predam" ?>"><?= $inzerat->getTyp() ?> </a>
                    </li>
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
                <?php if (\App\Models\Auth::getInstance()->isLogged() && \App\Models\Auth::getInstance()->getLoggedUser()->getId() == $inzerat->getUserId()) { ?>
                    <div class="card-body">
                        <a class="card-link" href="?c=inzercia&a=uprav&id=<?= $inzerat->getId() ?>">Upraviť</a>
                        <a class="card-link" href="?c=inzercia&a=zmaz&id=<?= $inzerat->getId() ?>">Zmazať</a>
                    </div>
                <?php } ?>
            </div>
        <?php }
    } ?>
</div>