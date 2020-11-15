<?php /** @var \App\Models\Inzerat $data */ ?>
<div class="container prava formular">
    <form method="post">
        <h2 id="h2pridat">Pridanie nového inzerátu</h2>
        <div class="form-group">
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Zadajte nadpis" name="nadpis">
        </div>
        <div class="form-group">
            <textarea class="form-control" rows="3" placeholder="Zadajte text" name="text"></textarea>
        </div>
        <div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="typ" id="exampleRadios1" value="Kúpim"
                       checked>
                <label class="form-check-label" for="exampleRadios1">
                    Kúpim
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="typ" id="exampleRadios2" value="Predám">
                <label class="form-check-label" for="exampleRadios2">
                    Predám
                </label>
            </div>
        </div>
        <select class="form-control form-control-sm kategoria" name="kategoria" >
            <option value="Zvieratá">Zvieratá</option>
            <option value="Auto">Auto</option>
            <option value="Elektronika">Elektronika</option>
            <option value="Dom a záhrada">Dom a záhrada</option>
            <option value="Knihy">Knihy</option>
            <option value="Hudba">Hudba</option>
            <option value="Nábytok">Nábytok</option>
            <option value="Šport">Šport</option>
            <option value="Oblečenie">Oblečenie</option>
            <option value="Ostatné">Ostatné</option>
        </select>
        <div class="form-row">
            <div class="col-2">
                <input type="text" class="form-control" placeholder="Zadajte cenu" name="cena">
            </div>
            <label id="eur"> € </label>
            <div class="col">
                <input type="text" class="form-control" placeholder="Zadajte telefónne číslo" name="telefonneCislo">
            </div>
            <div class="col">
                <input type="email" class="form-control" placeholder="Zadajte email" name="email">
            </div>
        </div>
        <input class="btn btn-primary" type="submit" value="Odoslať">
    </form>
</div>