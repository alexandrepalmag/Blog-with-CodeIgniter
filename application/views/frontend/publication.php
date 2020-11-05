<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                <?php echo $title ?>
                <small> >
                    <?php
                    if ($subtitle != '') {
                        echo $subtitle;
                    } else {
                        foreach ($subtitledb as $dbtitle) {
                            echo $dbtitle->title;
                        }
                    }
                    ?></small>
            </h1>

            <?php foreach ($posts as $thishighlight) { ?>
                <h2>
                    <?php echo $thishighlight->title ?>
                </h2>
                <p class="lead">
                    by <a href="<?php echo base_url('author/' . $thishighlight->idauthor . '/' . clear($thishighlight->name)) ?>"><?php echo $thishighlight->name ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $thishighlight->date ?></p>
                <hr>
                <p><?php echo $thishighlight->subtitle ?></p>
                <?php
                if ($thishighlight->img == 1) {
                    $photopub = base_url("assets/frontend/img/publication/" . md5($thishighlight->id) . ".jpg");
                ?>
                    <img class="img-responsive" src="<?php echo $photopub ?>" alt="">
                    <hr>
                <?php
                }
                ?>
                <p><?php echo $thishighlight->subtitle ?></p>
                <hr>
            <?php } ?>

        </div>