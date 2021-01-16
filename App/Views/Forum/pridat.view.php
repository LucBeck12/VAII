<?php ?>
<div class="zaklad modrePozadie">
    <div class="nadpis">
        <h1>PRIDANIE NOVÉHO PRÍSPEVKU</h1>
    </div>
    <form method="post">
        <input type="text" class="form-control" id="nazov" placeholder="Zadajte názov" name="nadpis">
        <div class="form-group">
            <textarea class="form-control" id="text" rows="3" placeholder="Zadajte text" name="text"></textarea>
        </div>
        <div id="chyby" class="chyby chybyPrispevok"></div>
        <input class="btn btn-primary" type="button" name="submit" id="odoslatPrispevok" value="Odoslať">
        <a href="?c=forum" id="cancel" name="cancel" class="btn btn-default">Zrušiť</a>
        <input class="hidden" id="chybyInput" name="chybyInput">
    </form>
</div>