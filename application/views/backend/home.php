<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $subtitle ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo $subtitle ?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2> Hello
                                <?php
                                echo $this->session->userdata('loggedInUser')->user;
                                ?>
                                !!!
                            </h2>
                            <h3>Welcome to the administrative page of your blog!!!</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>