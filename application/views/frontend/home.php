<!-- Page Content -->
<div class="container">

<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

        <h1 class="page-header">
            Página Inicial -
            <small>Postagens Recentes</small>
        </h1>
        <?php foreach($posts as $thishighlight) { ?>
       
        <h2>
            <a href="<?php echo base_url('post/'.$thishighlight->id.'/'.clear($thishighlight->title)) ?>"><?php echo $thishighlight->title ?></a>
        </h2>
        <p class="lead">
            por <a href="index.php">Start Bootstrap</a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Postado em 25 de Janeiro de 2017 10:00</p>
        <hr>
        <img class="img-responsive" src="http://placehold.it/900x300" alt="">
        <hr>
        <p><?php echo $thishighlight->title ?></p>
        <a class="btn btn-primary" href="<?php echo base_url('post/'.$thishighlight->id.'/'.clear($thishighlight->title)) ?>">Read more... <span class="glyphicon glyphicon-chevron-right"></span></a>

        <hr>
    <?php } ?>

    </div>
