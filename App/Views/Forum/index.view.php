<div class="zaklad modrePozadie">
    <div class="nadpis">
        <h1>MESTSKÉ FÓRUM</h1>
    </div>
    <div class="buttonPridaj">
        <a <?php if (\App\Models\Auth::getInstance()->isLogged()) { ?> href="?c=forum&a=pridat" <?php } else { ?>
            href="?c=login" <?php } ?> class="btn btn-primary">Pridaj príspevok</a>
    </div>
    <table class="table table-striped table-light" id="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Pridal</th>
            <th scope="col">Názov</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>