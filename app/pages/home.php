<div class="carousel carousel-slider" style="height: 100vh">
    <?php
    $carousel = [
        [
            'title' => 'PC'
        ],
        [
            'title' => 'PlayStation'
        ],
        [
            'title' => 'Xbox'
        ],
        [
            'title' => 'Nintendo'
        ]
    ];

    foreach ($carousel as $item) {
    ?>
        <a class="carousel-item" style="background-image: url('../public/img/<?php echo strtolower($item['title'])?>.jpg'); background-size: cover">
            <div class="center-content carousel-content center-align white-text">
                <h1><?php echo $item['title']?></h1>
                <p>Toutes les dernières nouveautés <?php echo $item['title']?></p>
            </div>
        </a>
    <?php
    }
    ?>
</div>
<div class="row" style="margin-bottom: 0">
    <div class="col s12 grey center-align">
        <h3 class="white-text">Actualité Gaming</h3>
    </div>
    <?php
        $news = Article::get3Last();
    ?>
    <ul class="collection col s12">

            <?php
            foreach ($news as $new){ ?>
                <li class="collection-item avatar">
                <?php
                $new-> id;
                ?>
                <p class="bold">
                    <?php
                    echo $new->title;
                    ?>
                    <br>
                    <?php
                    echo $new->picture;
                    ?>
                </p>
                <br>
                <?php
                $timestamp = $new->date;
                echo date("d/m/Y H:i:s", $timestamp);
                ?><br><br>
                <?php echo $new->content; ?><br>
                </li>
                <?php
            } ?>
    </ul>
</div>


<script>
    $(document).ready(function(){
        //init slider
        $('.carousel').carousel({
            indicators: true
        });

    });
</script>