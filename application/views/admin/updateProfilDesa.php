<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Update Profile Desa
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?= base_url('profileDesa') ?>">Profil Desa</a></li>
            <li class="active">Update Profil Desa</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-1">
                </div>
                <div class="col-lg-10">
                    <div class="form-group row">
                        <h3 class="box-title"><?= $profildesa['title']; ?></h3>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class=" form-group row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <img src="<?= base_url('assets/img/profileDesa/') . $profildesa['image']; ?>" class="img-thumbnail" width="30%">
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" form-group row">
                            <div class="col-sm-12">
                                <textarea class="form-control" id="content" name="content" rows="10"><?= $profildesa['content']; ?></textarea>
                                <?= form_error('content', '<small class="text-danger pl-5">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                        </div>
                        <div class="form-group row pull-right">
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-primary" name="update">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section><!-- /.content -->
</div>
</div>