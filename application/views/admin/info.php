<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Info
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Info</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-12">
                <?= $this->session->flashdata('message'); ?>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-6">
                    <?= form_open_multipart('admin/info'); ?>
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?= $about['id']; ?>">
                            <input type="text" class="form-control" id="title" name="title" value="<?= $about['title']; ?>">
                            <?= form_error('title', '<small class="text-danger pl-5">', '</small>'); ?>
                        </div>
                    </div>
                    <div class=" form-group row">
                        <label for="content" class="col-sm-2 col-form-label">Content</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="content" name="content" rows="5"><?= $about['content']; ?></textarea>
                            <?= form_error('content', '<small class="text-danger pl-5">', '</small>'); ?>
                        </div>
                    </div>
                    <div class=" form-group row">
                        <label for="image1" class="col-sm-2 col-form-label">Image 1</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-4">
                                    <img src="<?= base_url('assets/img/about/') . $about['image1']; ?>" class="img-thumbnail" height="150px">
                                </div>
                                <div class="col-sm-8">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image1" name="image1">
                                        <label class="custom-file-label" for="image1">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" form-group row">
                        <label for="image2" class="col-sm-2 col-form-label">Image 2</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-4">
                                    <img src="<?= base_url('assets/img/about/') . $about['image2']; ?>" class="img-thumbnail" height="150px">
                                </div>
                                <div class="col-sm-8">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image2" name="image2">
                                        <label class="custom-file-label" for="image2">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1">
                </div>
                <div class="col-lg-4">
                    <div class="form-group row">
                        <label for="telp" class="col-sm-4 col-form-label">Telephone</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="telp" name="telp" value="<?= $about['telp']; ?>">
                            <?= form_error('telp', '<small class="text-danger pl-5">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="email" name="email" value="<?= $about['email']; ?>">
                            <?= form_error('email', '<small class="text-danger pl-5">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                    </div>
                    <div class="form-group row">
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
</div><!-- /.content-wrapper -->