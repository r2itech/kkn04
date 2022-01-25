<script type="text/javascript">
    function opsi(value) {
        var st = $("#status").val();
        if (st == "admin" || st == "pengelola") {
            document.getElementById("tambah").disabled = false;
        } else {
            document.getElementById("tambah").disabled = true;
        }
    }
</script>
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">User</li>
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
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>">
                            <?= form_error('nama', '<small class="text-danger pl-5">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username'); ?>">
                            <?= form_error('username', '<small class="text-danger pl-5">', '</small>'); ?>
                        </div>
                    </div>
                    <div class=" form-group row">
                        <label for="telp" class="col-sm-2 col-form-label">Telephone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="telp" name="telp" value="<?= set_value('telp'); ?>">
                            <?= form_error('telp', '<small class="text-danger pl-5">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-4">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <select class="form-control" name="status" id="status" onchange="opsi(this)">
                                <option selected value="">--- Pilih Status User ---</option>
                                <option value="admin">Admin</option>
                                <option value="pengelola">Pengelola</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row pull-right">
                        <div class="col-sm-5">
                            <button type="submit" class="btn btn-primary" name="tambah" id="tambah" disabled="true">Tambah</button>
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
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data User</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Telepon</th>
                                    <th>Image</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($users as $u) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $u['nama'] ?></td>
                                        <td><?= $u['telp'] ?></td>
                                        <td align="center"><img src="<?= base_url('assets/img/profile/') . $u['image']; ?>" width="25%" class="img-thumbnail" alt="user.img" /></td>
                                        <td><?= $u['username'] ?></td>
                                        <td><?= $u['password'] ?></td>
                                        <td align="center" width="20%">
                                            <a href="<?= base_url('admin/updateUser/') . $u['id']; ?>" class="btn btn-info btn-xs"> Update </a>
                                            <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-danger<?= $u['id'] ?>">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $i++ ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th width="25%">Deskripsi</th>
                                    <th>Link</th>
                                    <th>Image</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div>
<!-- /.row -->

<!-- /.Modal -->
<?php $no = 0;
foreach ($users as $u) : $no++; ?>
    <div class="modal modal-danger fade" id="modal-danger<?= $u['id']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete User</h4>
                </div>
                <div class="modal-body">
                    <p>User [<?= $u['nama'] ?>] dengan id [<?= $u['id'] ?>] akan dihapus?&hellip;</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('admin/deleteUser/') . $u['id']; ?>" class="btn btn-outline">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach; ?>