<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                <?php echo $title ?>
                <small> > <?php echo $subtitle ?></small>
            </h1>
            <?php foreach ($posts as $thishighlight) { ?>

                <h2>
                    <a href="<?php echo base_url('post/' . $thishighlight->id . '/' . clear($thishighlight->title)) ?>"><?php echo $thishighlight->title ?></a>
                </h2>
                <p class="lead">
                    por <a href="<?php echo base_url('author/' . $thishighlight->idauthor . '/' . clear($thishighlight->name)) ?>"><?php echo $thishighlight->name ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $thishighlight->date ?></p>
                <hr>
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
                <a class="btn btn-primary" href="<?php echo base_url('post/' . $thishighlight->id . '/' . clear($thishighlight->title)) ?>">Read more... <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
            <?php } ?>

        </div>