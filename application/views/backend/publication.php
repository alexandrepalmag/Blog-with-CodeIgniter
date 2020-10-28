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
                                <label id="select-category">Categories</label>
                                <select class="form-control">
                                    <?php foreach ($categories as $category) { ?>
                                        <option value="<?php echo $category->id ?>"><?php echo $category->title ?></option>
                                    <?php } ?>
                                </select>
                            </div>
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
                                <textarea type="text" id="txt-content" name="txt-content" class="form-control" placeholder="Enter user content..." value="<?php echo set_value('txt-content'); ?>"></textarea>
                            </div>
                            <div class="form-group">
                                <label id="txt-date">Date</label>
                                <input type="datetime-local" id="txt-date" name="txt-date" class="form-control"><?php echo set_value('txt-date'); ?>
                            </div>
                            <input type="hidden" name="txt-user" id="txt-user" value="<?php echo $this->session->userdata('loggedInUser')->id; ?>">
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
                                $date = $publication->title;
                                $change = anchor(base_url('admin/publication/change/' . md5($publication->id)), '<button class="btn btn-info" aria-label="Delete"><i class="fa fa-pencil-square-o"></i></button>');
                                $delete = anchor(base_url('admin/publication/delete/' . md5($publication->id)), '<button class="btn btn-danger" aria-label="Delete"><i class="fa fa-trash fa-lg"></i></button>');
                                $this->table->add_row($photopub, $title, $date, $change, $delete);
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