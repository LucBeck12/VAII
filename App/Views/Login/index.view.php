<?php /** @var \App\Models\Auth $data */ ?>
<div class="container formularLogin nadpisInz">
    <form class="form-signin" method="post">
        <div id="loginIcon">
            <h2 id="h2pridat h2login">Prihlásenie</h2>
            <img class="mb-4" id="loginIcon" src="semka/public/Pictures/login.png" alt="" width="72" height="72">
        </div>

        <div class="form-group">
            <label for="login" class="sr-only">Login</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Login"
                   name="login" value="<?= (!empty(@$data['login']) ? $data['login'] : "") ?>"
                   autofocus="">

            <?php if (isset($data['chyby'][0])) {
                foreach ($data['chyby'][0] as $err) { ?>
                    <div><?= $err ?></div>
                <?php }
            } ?>
        </div>

        <div class="form-group">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="heslo" id="inputPassword" class="form-control" placeholder="Password">

            <?php if (isset($data['chyby'][1])) {
                foreach ($data['chyby'][1] as $err) { ?>
                    <div><?= $err ?></div>
                <?php }
            } ?>
        </div>

        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Prihlásiť</button>
    </form>
</div>