<?php /** @var \App\Models\Inzerat $data */ ?>
<div class="container formular nadpisInz">
    <h2 id="h2pridat">Pridanie nového príspevku</h2>
</div>
<div class="container prava formular">
    <form method="post" id="forumForm">
        <input type="text" class="form-control" id="nazov" placeholder="Zadajte názov"
               name="nadpis" value="<?= (!empty(@$data['prispevok']) ? $data['prispevok']->getNazov() : "") ?>">

        <?php if (isset($data['chyby'][0])) {
            foreach ($data['chyby'][0] as $err) { ?>
                <div><?= $err ?></div>
            <?php }
        } ?>
        <div class="form-group">
            <textarea class="form-control" id="text" rows="3" placeholder="Zadajte text"
                      name="text"><?= (!empty(@$data['prispevok']) ? $data['prispevok']->getText() : "") ?></textarea>

            <?php if (isset($data['chyby'][1])) {
                foreach ($data['chyby'][1] as $err) { ?>
                    <div><?= $err ?></div>
                <?php }
            } ?>
        </div>
        <input class="btn btn-primary" type="submit" name="submit" id="odoslatPrispevok" value="Odoslať">
        <a href="?c=inzercia" id="cancel" name="cancel" class="btn btn-default">Zrušiť</a>
    </form>
</div>