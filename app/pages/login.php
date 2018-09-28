<div class="login background ">
    <div class="row">
        <form method="post" class="card col s12 m6 center-content grey darken-3 center-align hoverable">
            <div class="card-content white-text">
                <span class="card-title semi-bold">Connexion</span>
                <?php
                if (isset($_GET['error']) && $_GET['error'] == 'true'){
                    echo 'Il y a une erreur dans l\'email ou le mot de passe';
                }
                ?>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" type="email" class="validate white-text" name="email">
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field col s12">
                        <input id="password" type="password" class="validate white-text" name="password">
                        <label for="password">Mot de passe</label>
                    </div>
                </div>
            </div>
            <div class="card-action">
                <button class="btn white-text">Se connecter</button>
                <a class="btn white-text" href="inscription">ou S'inscrire</a>
            </div>
        </form>
    </div>
</div>