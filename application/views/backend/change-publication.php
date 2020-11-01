<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo 'Manage ' . $subtitle ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong><?php echo 'Add New ' . $subtitle ?></strong>
                </div>
                <div class="panel-body">
                    <div class="row" style="padding-bottom: 10px;">
                        <div class="col-lg-3 col-lg-offset-3">
                            <?php
                            echo validation_errors('<div class="alert alert-danger">', '</div>');
                            echo form_open('admin/publication/change');
                            foreach ($publications as $publication) {
                            ?>
                                <div class="form-group">
                                    <label id="select-category">Categories</label>
                                    <select id="select-category" name="select-category" class="form-control">
                                        <?php foreach ($categories as $category) { ?>
                                            <option value="<?php echo $category->id ?>" <?php if ($category->id == $publication->category) {
                                                                                            echo "selected";
                                                                                        } ?>><?php echo $category->title ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label id="txt-title">Title</label>
                                    <input type="text" id="txt-title" name="txt-title" class="form-control" placeholder="Enter with title..." value="<?php echo $publication->title; ?>">
                                </div>
                                <div class="form-group">
                                    <label id="txt-subtitle">Subtitle</label>
                                    <input type="text" id="txt-subtitle" name="txt-subtitle" class="form-control" placeholder="Enter with subtitle..." value="<?php echo $publication->subtitle; ?>">
                                </div>
                                <div class="form-group">
                                    <label id="txt-content">Content</label>
                                    <textarea type="text" id="txt-content" name="txt-content" class="form-control" placeholder="Enter user content..." value="<?php echo $publication->content; ?>"></textarea>
                                </div>
                                <div class="form-group">
                                    <label id="txt-date">Date</label>
                                    <input type="datetime-local" id="txt-date" name="txt-date" class="form-control" value="<?php echo strftime('%Y-%m-%dT%H:%M:%S', strtotime($publication->date)); ?>">
                                </div>
                                <button type="submit" class="btn btn-default">Save Changes</button>
                            <?php
                                echo form_close();
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong><?php echo 'Featured image of ' . $subtitle ?></strong>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-1"> 
                            <?php
                            if ($publication->img == 1) {
                                echo img("assets/frontend/img/publication/" . md5($publication->id) . ".jpg");
                            } else {
                                echo img("assets/frontend/img/noPhoto2.png");
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            $divopen = '<div class="form-group">';
                            $divclose = '</div>';
                            echo form_open_multipart('admin/publication/newPhoto');
                            echo form_hidden('id', md5($publication->id));
                            echo $divopen;
                            $image = array('name' => 'userfile', 'id' => 'userfile', 'class' => 'form-control');
                            echo form_upload($image);
                            echo $divclose;
                            echo $divopen;
                            $button = array(
                                'name' => 'btn_add', 'id' => 'btn_add', 'class' => 'btn btn_default',
                                'value' => 'Add new image'
                            );
                            echo form_submit($button);
                            echo $divclose;
                            echo form_close();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>