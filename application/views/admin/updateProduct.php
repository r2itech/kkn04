<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Update Product
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?= base_url('product') ?>">Product</a></li>
            <li class="active">Update Product</li>
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
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $product['nama']; ?>">
                        <?= form_error('nama', '<small class="text-danger pl-5">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="RP" value="<?= $product['harga']; ?>" onkeypress="return hanyaAngka(event)">
                        <?= form_error('harga', '<small class="text-danger pl-5">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5"> <?= $product['deskripsi']; ?> </textarea>
                        <?= form_error('deskripsi', '<small class="text-danger pl-5">', '</small>'); ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="mp">Market Place</label>
                        <input type="text" class="form-control" id="mp" name="mp" value="<?= $product['mp']; ?>">
                        <?= form_error('mp', '<small class="text-danger pl-5">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="s1">Sosial Media 1</label>
                        <input type="text" class="form-control" id="s1" name="s1" value="<?= $product['s1']; ?>">
                        <?= form_error('s1', '<small class="text-danger pl-5">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="s2">Sosial Media 2</label>
                        <input type="text" class="form-control" id="s2" name="s2" value="<?= $product['s2']; ?>">
                        <?= form_error('s2', '<small class="text-danger pl-5">', '</small>'); ?>
                    </div>
                    <div class=" form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="col-sm-5">
                                    <img src="<?= base_url('assets/img/product/') . $product['image']; ?>" class="img-thumbnail" width="100%">
                                </div>
                                <div class="col-sm-6">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row pull-right">
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-primary" name="update">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section><!-- /.content -->
</div>
<!-- /.row -->