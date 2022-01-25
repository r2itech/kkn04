<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Product
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Product</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <form action="" method="post" enctype="multipart/form-data">
                <div class=" col-lg-6">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                        <?= form_error('nama', '<small class="text-danger pl-5">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="RP" onkeypress="return hanyaAngka(event)">
                        <?= form_error('harga', '<small class="text-danger pl-5">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5"></textarea>
                        <?= form_error('deskripsi', '<small class="text-danger pl-5">', '</small>'); ?>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        <label for="mp">Market Place</label>
                        <input type="text" class="form-control" id="mp" name="mp">
                        <?= form_error('mp', '<small class="text-danger pl-5">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="s1">Sosial Media 1</label>
                        <input type="text" class="form-control" id="s1" name="s1">
                        <?= form_error('s1', '<small class="text-danger pl-5">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="s2">Sosial Media 2</label>
                        <input type="text" class="form-control" id="s2" name="s2">
                        <?= form_error('s2', '<small class="text-danger pl-5">', '</small>'); ?>
                    </div>
                    <div class=" form-group">
                        <label for="image">Picture</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                            <?= form_error('image', '<small class="text-danger pl-5">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row pull-right">
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
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
                        <h3 class="box-title">Data Product</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th width="25%">Deskripsi</th>
                                    <th>Link</th>
                                    <th>Image</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($product as $p) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $p['nama'] ?></td>
                                        <td><?= $p['harga'] ?></td>
                                        <td><?= $p['deskripsi'] ?></td>
                                        <td rowspan="1">
                                            <?= $p['mp'] ?>
                                            <?= $p['s1'] ?>
                                            <?= $p['s2'] ?>
                                        </td>
                                        <td align="center"><img src="<?= base_url('assets/img/product/') . $p['image']; ?>" width="15%" class="img-thumbnail" alt="Product.img" /></td>
                                        <td align="center" width="20%">
                                            <a href="<?= base_url('product/updateProduct/') . $p['id']; ?>" class="btn btn-info btn-xs"> Update </a>
                                            <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-danger<?= $p['id'] ?>">
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
foreach ($product as $p) : $no++; ?>
    <div class="modal modal-danger fade" id="modal-danger<?= $p['id']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete Product</h4>
                </div>
                <div class="modal-body">
                    <p>Data Produk [<?= $p['nama'] ?>] dengan id [<?= $p['id'] ?>] akan dihapus?&hellip;</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('product/deleteProduct/') . $p['id']; ?>" class="btn btn-outline">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach; ?>