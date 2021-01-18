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

                        <!--<a type="button" class="card-link" data-toggle="modal" data-target="#exampleModal">Zmazať</a>

                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Zmazať inzerát</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Naozaj si prajete zmazať inzerát?</div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Nie</button>
                                        <a type="button" class="btn btn-primary" href="?c=inzercia&a=zmaz&id=/*$inzerat->getId() */">Áno</a>
                                    </div>
                                </div>
                            </div>
                        </div>-->

                        <a class="card-link" href="?c=inzercia&a=zmaz&id=<?= $inzerat->getId() ?>">Zmazať</a>
                    </div>
                <?php } ?>
            </div>
        <?php }
    } ?>
</div>