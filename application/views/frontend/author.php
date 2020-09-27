<div class="container">
    <div class="row">
        <div class="col-md-8">
            <!-- <h1 class="page-header">
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
            </h1> -->
            <?php foreach ($authors as $author) { ?>
                <div class="col-md-4">
                <img class="img-responsive img-circle" src="http://placehold.it/200x200" alt="">
                </div>
                <div class="col-md-8 ">
                    <h2>
                       <?php echo $author->name ?>
                    </h2> 
                    <hr>
                    <p><?php echo $author->historic ?></p>
                    <hr>
                </div>
            <?php } ?>

        </div>