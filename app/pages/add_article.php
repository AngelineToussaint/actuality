<?php
User::checkAccess($_SESSION['user']['role']);
?>

<div class="add_article background">
    <div class="row">
        <form method="post" class="card col s12 m6 center-content grey darken-3 hoverable" enctype="multipart/form-data">
            <div class="card-content white-text">
                <span class="card-title semi-bold center-align">Ajouter un article</span>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="title" type="text" class="validate white-text" name="title">
                        <label for="title">Titre</label>
                        <?php
                        echo 'La taille de l\'image ne peux pas dépasser 2Mo.';
                        ?>
                    </div>
                    <div class="file-field input-field col s12">
                        <div class="btn">
                            <span><i class="material-icons">image</i></span>
                            <input type="file" accept="image/*" name="picture">
                            <input type="hidden" name="MAX_FILE_SIZE" value="200000" />
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path white-text validate" type="text">
                        </div>
                    </div>
                    <div class="input-field col s12">
                        <input id="content" type="text" class="validate white-text" name="content">
                        <label for="content">Description</label>
                    </div>
                </div>
            </div>
            <div class="card-action center-align">
                <button class="btn white-text">Importer l'article</button>
            </div>
        </form>
    </div>
</div>

