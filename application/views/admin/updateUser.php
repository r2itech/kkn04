<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Update User
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?= base_url('admin/user') ?>">User</a></li>
            <li class="active">Update User</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <form action="" method="post" enctype="multipart/form-data">
                <div class=" col-lg-6">
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $users['nama']; ?>">
                            <?= form_error('nama', '<small class="text-danger pl-5">', '</small>'); ?>
                        </div>
                    </div>
                    <div class=" form-group row">
                        <label for="telp" class="col-sm-2 col-form-label">Telephone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="telp" name="telp" value="<?= $users['telp']; ?>">
                            <?= form_error('telp', '<small class="text-danger pl-5">', '</small>'); ?>
                        </div>
                    </div>
                    <div class=" form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="username" name="username" value="<?= $users['username']; ?>">
                            <?= form_error('username', '<small class="text-danger pl-5">', '</small>'); ?>
                        </div>
                    </div>
                    <div class=" form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="password" name="password">
                            <?= form_error('password', '<small class="text-danger pl-5">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-4">
                    <div class=" form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-4">
                                    <img src="<?= base_url('assets/img/profile/') . $users['image']; ?>" class="img-thumbnail" height="150px">
                                </div>
                                <div class="col-sm-8">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image1">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <select class="form-control" name="status" id="status">
                                <option <?php if ($users['status'] == 'admin') {
                                            echo 'selected';
                                        } ?> value="admin">Admin</option>
                                <option <?php if ($users['status'] == 'pengelola') {
                                            echo 'selected';
                                        } ?> value="pengelola">Pengelola</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row pull-right">
                        <div class="col-sm-5">
                            <button type="submit" class="btn btn-primary" name="update">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?= $this->session->flashdata('message'); ?>
            </div>
        </div>
    </section><!-- /.content -->
</div>
<!-- /.row -->