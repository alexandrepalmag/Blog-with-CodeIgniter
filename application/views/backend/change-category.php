<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo 'Manage ' . $subtitle ?></h1>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong><?php echo 'Update ' . $subtitle ?></strong>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            echo validation_errors('<div class="alert alert-danger">', '</div>');
                            echo form_open('admin/category/saveEditions');
                            foreach ($categories as $category) {
                            ?>
                                <div class="form-group">
                                    <label id="txt-category">Category Name</label>
                                    <input type="text" id="txt-category" name="txt-category" class="form-control" placeholder="Enter category name..." value="<?php echo $category->title ?>">
                                </div>
                                <input type="hidden" name="txt-id" id="txt-id" value="<?php echo $category->title ?>">
                                <button type="submit" class="btn btn-default">Update</button>
                            <?php
                            }
                            echo form_close();
                            ?>
                        </div>

                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
    <!-- /.row -->
</div>

<!-- <form role="form">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input class="form-control" placeholder="Entre com o texto">
                                </div>
                                <div class="form-group">
                                    <label>Featured Photo</label>
                                    <input type="file">
                                </div>
                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea class="form-control" rows="3"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Selects</label>
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-default">Register</button>
                                <button type="reset" class="btn btn-default">Clear</button>
                            </form> -->