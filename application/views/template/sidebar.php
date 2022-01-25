<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p><?= $user['nama']; ?></p>
                <a href="<?php echo site_url('admin/editProfile') ?>"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <?php if ($title == 'Dashboard')
                echo '<li class="treeview active">';
            else
                echo '<li class="treeview">';
            ?><a href="<?php echo site_url('admin') ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
            </li>
            <?php if ($user['status'] == 'admin') { ?>
                <?php if ($title == 'User')
                    echo '<li class="treeview active">';
                else
                    echo '<li class="treeview">';
                ?><a href="<?php echo site_url('admin/user') ?>">
                    <i class="fa fa-users"></i> <span>User</span>
                </a>
                </li>
            <?php } ?>
            <?php
            if ($title == 'Info')
                echo '<li class="treeview active">';
            else
                echo '<li class="treeview">';
            ?><a href="<?php echo site_url('admin/info') ?>">
                <i class="fa fa-exclamation-circle"></i> <span>Info</span>
            </a>
            </li>
            <?php if ($title == 'Profil Desa' || $title == 'Profil Wirausaha' || $title == 'Update Profil Desa' || $title == 'Update Profil Wirausaha')
                echo '<li class="treeview active">';
            else
                echo '<li class="treeview">';
            ?>
            <a href="#">
                <i class="fa fa-table"></i> <span>Profile</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo site_url('profileDesa') ?>"><i class="fa fa-circle-o"></i>Desa</a></li>
                <li><a href="<?php echo site_url('profileUsaha') ?>"><i class="fa fa-circle-o"></i>Wirausaha</a></li>
            </ul>
            <?php if ($title == 'Product' || $title == 'Update Product')
                echo '<li class="treeview active">';
            else
                echo '<li class="treeview">';
            ?><a href="<?php echo site_url('product') ?>">
                <i class="fa fa-pencil-square"></i> <span>Product</span>
            </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>