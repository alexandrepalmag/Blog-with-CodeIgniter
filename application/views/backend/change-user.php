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
                            echo form_open('admin/users/saveEditions');
                            foreach ($users as $user) {
                            ?>
                                <div class="form-group">
                                    <label id="txt-name">User Name</label>
                                    <input type="text" id="txt-name" name="txt-name" class="form-control" placeholder="Enter user name..." value="<?php echo $user->name ?>">
                                </div>
                                <div class="form-group">
                                    <label id="txt-email">Email</label>
                                    <input type="text" id="txt-email" name="txt-email" class="form-control" placeholder="Enter user email..." value="<?php echo $user->email; ?>">
                                </div>
                                <div class="form-group">
                                    <label id="txt-historic">Historic</label>
                                    <textarea id="txt-historic" name="txt-historic" class="form-control"><?php echo $user->historic; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label id="txt-user">User</label>
                                    <input type="text" id="txt-user" name="txt-user" class="form-control" placeholder="Enter user..." value="<?php echo $user->user; ?>">
                                </div>
                                <div class="form-group">
                                    <label id="txt-password">Password</label>
                                    <input type="password" id="txt-password" name="txt-password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label id="txt-confirmPassword">Confirm Password</label>
                                    <input type="password" id="txt-confirmPassword" name="txt-confirmPassword" class="form-control">
                                </div>
                                <input type="hidden" name="txt-id" id="txt-id" value="<?php echo $user->id ?>">
                                <button type="submit" class="btn btn-default">Update</button>
                            <?php
                            }
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
                    <strong><?php echo 'Featured image of ' . $subtitle ?></strong>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>