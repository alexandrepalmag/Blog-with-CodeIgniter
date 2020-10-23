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
                                echo form_open('admin/users/insert');
                            ?>
                            <div class="form-group">
                                <label id="txt-name">User Name</label>
                                <input type="text" id="txt-name" name="txt-name" class="form-control" placeholder="Enter user name..." value="<?php echo set_value('txt-name'); ?>">
                            </div>
                            <div class="form-group">
                                <label id="txt-email">Email</label>
                                <input type="text" id="txt-email" name="txt-email" class="form-control" placeholder="Enter user email..." value="<?php echo set_value('txt-email'); ?>">
                            </div>
                            <div class="form-group">
                                <label id="txt-historic">Historic</label>
                                <textarea id="txt-historic" name="txt-historic" class="form-control"><?php echo set_value('txt-historic'); ?></textarea>
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
        <div class="col-lg-6">
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
                            $this->table->set_heading("Photo", "User Name", "Change", "Delete");
                            foreach ($users as $user) {
                                $userName = $user->name;
                                if ($user->img == 1) {
                                    $photoUser = img("assets/frontend/img/users/" . md5($user->id) . ".jpg");
                                } else {
                                    $photoUser = img("assets/frontend/img/noPhoto.png");
                                }
                                $change = anchor(base_url('admin/users/change/' . md5($user->id)), '<button class="btn btn-info" aria-label="Delete"><i class="fa fa-pencil-square-o"></i></button>');
                                $delete = anchor(base_url('admin/users/delete/' . md5($user->id)), '<button class="btn btn-danger" aria-label="Delete"><i class="fa fa-trash fa-lg"></i></button>');

                                $this->table->add_row($photoUser, $userName, $change, $delete);
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