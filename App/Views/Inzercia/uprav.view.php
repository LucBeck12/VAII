<?php /** @var Array $data */ ?>
<div class="zaklad modrePozadie">
    <div class="nadpis">
        <h1>ÚPRAVA INZERÁTU <b><?= $data["inzerat"]->getNadpis() ?></b></h1>
    </div>
    <?php
    include "formular.view.php";
    ?>
</div>