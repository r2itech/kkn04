<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Profile
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Edit Profile</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-6">
                <?= $this->session->flashdata('message'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">

                <?= form_open_multipart('admin/editProfile'); ?>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $user['id']; ?>">
                        <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>">
                        <?= form_error('username', '<small class="text-danger pl-5">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Full Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
                        <?= form_error('nama', '<small class="text-danger pl-5">', '</small>'); ?>
                    </div>
                </div>
                <div class=" form-group row">
                    <label for="telp" class="col-sm-2 col-form-label">Telephone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="telp" name="telp" value="<?= $user['telp']; ?>">
                        <?= form_error('telp', '<small class="text-danger pl-5">', '</small>'); ?>
                    </div>
                </div>
                <div class=" form-group row">
                    <label for="image" class="col-sm-2 col-form-label">Picture</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail" height="150px">
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-7">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    <div class="col-sm-3">
                        <a href="<?= base_url('admin/changePassword') ?>">Change Password</a>
                    </div>
                </div>

                </form>

            </div>
        </div>
        <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->