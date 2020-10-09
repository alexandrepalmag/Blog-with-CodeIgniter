<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo 'Manage '.$subtitle ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong><?php echo 'Add New ' . $subtitle ?></strong>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">

                        </div>

                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong><?php echo 'Change Existing ' . $subtitle ?></strong>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php 
                                $this->table->set_heading("Category Name", "Change","Delete");
                                foreach($categories as $category) {
                                    $getName=$category->title;
                                    $change=anchor(base_url('admin/category'),'<a class="btn btn-info" aria-label="Delete"><i class="fa fa-pencil-square-o"></i></a>');
                                    $delete=anchor(base_url('admin/category'),'<a class="btn btn-danger" aria-label="Delete"><i class="fa fa-trash fa-lg"></i></a>');

                                    $this->table->add_row($getName,$change,$delete);

                                }

                                $this->table->set_template(array(
                                    'table_open' => '<table class="table">'
                                ));
                                echo $this->table->generate();
                            ?>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
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