<?php
$post = Article::getArticle($_GET['id']);

?>
<div class="row background" style="margin-bottom: 0">
    <div class="card col s12 m6 center-content grey darken-3 hoverable">
        <div class="card-content white-text">
            <span class="card-title semi-bold center-align"><?php echo $post->title; ?></span>
            <?php
            $timestamp = $post->date;
            echo date("d/m/Y", $timestamp); ?>
            <br>
            <?php
            echo $post->picture; ?>
            <br>
            <?php
            echo $post->content;
            ?>
        </div>
        <h6 class="semi-bold white-text">Commentaires</h6>
        <ul class="collapsible">
            <?php
            $comments = Article::getComments($post->id);
            foreach ($comments as $key => $comment) {
                if ($key == 0) {
                    ?> <li class="active"> <?php
                } else {
                    ?> <li> <?php
                }
                ?>
                    <div class="collapsible-header"><i class="material-icons">comment</i><?php echo $comment->firstName?></div>
                    <div class="collapsible-body grey"><span><?php echo $comment->content?></span></div>
                </li>
            <?php
            }
            ?>
        </ul>
        <div class="card-action center-align">
            <?php
            $articlePrev = Article::previous($post->id);
            $articleNext = Article::next($post->id);

            if ($articlePrev != null) { ?>
                <a class="btn white-text" href="article?id=<?php echo $articlePrev->id; ?>">Article Précédent</a>
            <?php
            }

            if ($articleNext != null) { ?>
                <a class="btn white-text" href="article?id=<?php echo $articleNext->id; ?>">Article Suivant</a>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.collapsible').collapsible();
    });
</script>


