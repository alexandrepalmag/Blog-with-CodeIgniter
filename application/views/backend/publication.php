<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo 'Manage ' . $subtitle ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong><?php echo 'Add New ' . $subtitle ?></strong>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            echo validation_errors('<div class="alert alert-danger">', '</div>');
                            echo form_open('admin/users/insert');
                            ?>
                            <div class="form-group">
                                <label id="txt-title">Title</label>
                                <input type="text" id="txt-title" name="txt-title" class="form-control" placeholder="Enter with title..." value="<?php echo set_value('txt-title'); ?>">
                            </div>
                            <div class="form-group">
                                <label id="txt-subtitle">Subtitle</label>
                                <input type="text" id="txt-subtitle" name="txt-subtitle" class="form-control" placeholder="Enter with subtitle..." value="<?php echo set_value('txt-subtitle'); ?>">
                            </div>
                            <div class="form-group">
                                <label id="txt-content">Content</label>
                                <input type="text" id="txt-content" name="txt-content" class="form-control" placeholder="Enter user content..." value="<?php echo set_value('txt-content'); ?>">
                            </div>
                            <div class="form-group">
                                <label id="txt-date">Date</label>
                                <textarea id="txt-date" name="txt-date" class="form-control"><?php echo set_value('txt-date'); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label id="txt-user">User</label>
                                <input type="text" id="txt-user" name="txt-user" class="form-control" placeholder="Enter user..." value="<?php echo set_value('txt-user'); ?>">
                            </div>
                            <div class="form-group">
                                <label id="txt-password">Password</label>
                                <input type="password" id="txt-password" name="txt-password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label id="txt-confirmPassword">Confirm Password</label>
                                <input type="password" id="txt-confirmPassword" name="txt-confirmPassword" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-default">Register</button>
                            <?php
                            echo form_close();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong><?php echo 'Change Existing ' . $subtitle ?></strong>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <style>
                                img {
                                    width: 60px;
                                }
                            </style>
                            <?php
                            $this->table->set_heading("Photo", "Title", "Date", "Change", "Delete");
                            foreach ($publications as $publication) {
                                $title = $publication->title;
                                $photopub = "Photo";
                                //$date = postIn($publication->title);
                                $change = anchor(base_url('admin/publication/change/' . md5($publication->id)), '<button class="btn btn-info" aria-label="Delete"><i class="fa fa-pencil-square-o"></i></button>');
                                $delete = anchor(base_url('admin/publication/delete/' . md5($publication->id)), '<button class="btn btn-danger" aria-label="Delete"><i class="fa fa-trash fa-lg"></i></button>');

                                $this->table->add_row($photopub, $titlte, $date, $change, $delete);
                            }
                            $this->table->set_template(array(
                                'table_open' => '<table class="table">'
                            ));
                            echo $this->table->generate();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>