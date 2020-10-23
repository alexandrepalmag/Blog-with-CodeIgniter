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
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            echo validation_errors('<div class="alert alert-danger">', '</div>');
                            echo form_open('admin/category/insert');
                            ?>
                            <div class="form-group">
                                <label id="txt-category">Category Name</label>
                                <input type="text" id="txt-category" name="txt-category" class="form-control" placeholder="Enter category name...">
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
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong><?php echo 'Change Existing ' . $subtitle ?></strong>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            $this->table->set_heading("Category Name", "Change", "Delete");
                            foreach ($categories as $category) {
                                $getName = $category->title;
                                $change = anchor(base_url('admin/category/change/' . md5($category->id)), '<button class="btn btn-info" aria-label="Delete"><i class="fa fa-pencil-square-o"></i></button>');
                                $delete = anchor(base_url('admin/category/delete/' . md5($category->id)), '<button class="btn btn-danger" aria-label="Delete"><i class="fa fa-trash fa-lg"></i></button>');

                                $this->table->add_row($getName, $change, $delete);
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
