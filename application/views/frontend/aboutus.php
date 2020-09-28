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
                    ?>
                </small>
            </h1> -->
            <div class="col-md-12 ">

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <br>
            <h1 class="page-header">
                Ours authors
            </h1>
            <div class="col-md-12 row">

                <?php foreach ($authors as $author) { ?>
                    <div class="col-md-4 col-xs-6">
                        <img class="img-responsive img-circle" src="http://placehold.it/200x200" alt="">
                        <h4 class="text-center">
                            <a href="<?php echo base_url('author/' . $author->id . '/' . clear($author->name)) ?>"><?php echo $author->name ?></a>
                        </h4>
                    </div>
            
        <?php } ?>
        </div>

        </div>