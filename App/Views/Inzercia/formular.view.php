<?php /** @var \App\Models\Inzerat $data */ ?>
<form method="post">
    <?php if (!empty($data['inzerat'])) { ?>
        <input type="hidden" value="<?= $data['inzerat']->getId() ?>" name="id">
    <?php } ?>
    <div class="form-group">
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Zadajte nadpis"
               name="nadpis" value="<?= (!empty(@$data['inzerat']) ? $data['inzerat']->getNadpis() : "") ?>">

        <?php if (isset($data['chyby'][0])) {
            foreach ($data['chyby'][0] as $err) { ?>
                <div><?= $err ?></div>
            <?php }
        } ?>
    </div>
    <div class="form-group">
            <textarea class="form-control" rows="3" placeholder="Zadajte text"
                      name="text"><?= (!empty(@$data['inzerat']) ? $data['inzerat']->getText() : "") ?></textarea>

        <?php if (isset($data['chyby'][1])) {
            foreach ($data['chyby'][1] as $err) { ?>
                <div><?= $err ?></div>
            <?php }
        } ?>
    </div>
    <div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="typ" id="exampleRadios2" value="Predám"
                <?= (empty(@$data['inzerat']) || $data['inzerat']->getTyp() == "Predám" ? 'checked="checked"' : "") ?>>
            <label class="form-check-label" for="exampleRadios2">Predám</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="typ" id="exampleRadios1" value="Kúpim"
                <?= (!empty(@$data['inzerat']) && $data['inzerat']->getTyp() == "Kúpim" ? 'checked="checked"' : "") ?>>
            <label class="form-check-label" for="exampleRadios1">Kúpim</label>
        </div>
    </div>
    <select class="form-control form-control-sm kategoria" name="kategoria">
        <option value="Zvieratá" <?= (empty(@$data['inzerat']) || $data['inzerat']->getKategoria() == "Zvieratá" ? 'selected="selected"' : "") ?>>
            Zvieratá
        </option>
        <option value="Autá" <?= (!empty(@$data['inzerat']) && $data['inzerat']->getKategoria() == "Autá" ? 'selected="selected"' : "") ?>>
            Autá
        </option>
        <option value="Elektronika" <?= (!empty(@$data['inzerat']) && $data['inzerat']->getKategoria() == "Elektronika" ? 'selected="selected"' : "") ?>>
            Elektronika
        </option>
        <option value="Dom a záhrada" <?= (!empty(@$data['inzerat']) && $data['inzerat']->getKategoria() == "Dom a záhrada" ? 'selected="selected"' : "") ?>>
            Dom a záhrada
        </option>
        <option value="Knihy" <?= (!empty(@$data['inzerat']) && $data['inzerat']->getKategoria() == "Knihy" ? 'selected="selected"' : "") ?>>
            Knihy
        </option>
        <option value="Hudba" <?= (!empty(@$data['inzerat']) && $data['inzerat']->getKategoria() == "Hudba" ? 'selected="selected"' : "") ?>>
            Hudba
        </option>
        <option value="Nábytok" <?= (!empty(@$data['inzerat']) && $data['inzerat']->getKategoria() == "Nábytok" ? 'selected="selected"' : "") ?>>
            Nábytok
        </option>
        <option value="Šport" <?= (!empty(@$data['inzerat']) && $data['inzerat']->getKategoria() == "Šport" ? 'selected="selected"' : "") ?>>
            Šport
        </option>
        <option value="Oblečenie" <?= (!empty(@$data['inzerat']) && $data['inzerat']->getKategoria() == "Oblečenie" ? 'selected="selected"' : "") ?>>
            Oblečenie
        </option>
        <option value="Ostatné" <?= (!empty(@$data['inzerat']) && $data['inzerat']->getKategoria() == "Ostatné" ? 'selected="selected"' : "") ?>>
            Ostatné
        </option>
    </select>
    <div class="form-row">
        <div class="col-2">
            <input type="text" class="form-control" placeholder="Zadajte cenu" name="cena"
                   value="<?= (!empty(@$data['inzerat']) ? $data['inzerat']->getCena() : "") ?>">
        </div>
        <label id="eur"> € </label>
        <div class="col">
            <input type="text" class="form-control" placeholder="Zadajte telefónne číslo" name="telefonneCislo"
                   value="<?= (!empty(@$data['inzerat']) ? $data['inzerat']->getTelefonneCislo() : "") ?>">
        </div>
        <div class="col">
            <input type="email" class="form-control" placeholder="Zadajte email" name="email"
                   value="<?= (!empty(@$data['inzerat']) ? $data['inzerat']->getEmail() : "") ?>">
        </div>
        <div class="container chyby">
            <?php if (isset($data['chyby'][2])) {
                foreach ($data['chyby'][2] as $err) { ?>
                    <div><?= $err ?></div>
                <?php }
            } ?>

            <?php if (isset($data['chyby'][3])) {
                foreach ($data['chyby'][3] as $err) { ?>
                    <div><?= $err ?></div>
                <?php }
            } ?>

            <?php if (isset($data['chyby'][4])) {
                foreach ($data['chyby'][4] as $err) { ?>
                    <div><?= $err ?></div>
                <?php }
            } ?>
        </div>
    </div>
    <input class="btn btn-primary buttonForm" type="submit" name="submit" value="Odoslať">
    <a href="?c=inzercia" id="cancel" name="cancel" class="btn btn-default buttonForm">Zrušiť</a>
</form>
