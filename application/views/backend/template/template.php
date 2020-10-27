<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Navegação</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url('admin') ?>">Administrative Panel</a>
        </div>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="<?php echo base_url('admin/category') ?>"><i class="fa fa-sitemap fa-fw"></i> Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/publication') ?>"><i class="fa fa-edit fa-fw"></i> Posts</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/users') ?>"><i class="fa fa-wrench fa-fw"></i> Users</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/users/logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logoff</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>