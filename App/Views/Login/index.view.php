<?php /** @var \App\Models\Auth $data */ ?>
<div class="zaklad modrePozadie formularLogin">
    <div class="nadpis loginIcon">
        <h1>PRIHLÁSENIE</h1>
        <img class="mb-4" src="semka/public/Pictures/login.png" alt="" width="72" height="72">
    </div>
    <form method="post">
        <div class="form-group">
            <label class="sr-only">Login</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Login"
                   name="login" value="<?= (!empty(@$data['login']) ? $data['login'] : "") ?>"
                   autofocus="" required>

            <?php if (isset($data['chyby'][0])) {
                foreach ($data['chyby'][0] as $err) { ?>
                    <div><?= $err ?></div>
                <?php }
            } ?>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="sr-only">Heslo</label>
            <input type="password" name="heslo" id="inputPassword" class="form-control" placeholder="Password" required>

            <?php if (isset($data['chyby'][1])) {
                foreach ($data['chyby'][1] as $err) { ?>
                    <div><?= $err ?></div>
                <?php }
            } ?>
        </div>
        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Prihlásiť</button>
    </form>
</div>