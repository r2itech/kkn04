<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Profil Wirausaha
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Profil Wirausaha</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <?= $this->session->flashdata('message'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-1">
            </div>
            <div class="col-xs-10">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Profil Wirausaha</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example" class="table table-bordered table-striped">
                            <tbody>
                                <?php foreach ($profile as $p) : ?>
                                    <tr>
                                        <td align="center"><?= '<b>' . $p['title'] . '</b>' ?></td>
                                        <td rowspan="2">
                                    <tr>
                                        <td align="center"><img src="<?= base_url('assets/img/profileUsaha/') . $p['image']; ?>" width="50%" class="img-thumbnail" alt="profile.img" /></td>
                                    </tr>
                                    <tr>
                                        <td align="center"><a href="<?= base_url('profileUsaha/updateProfile/') . $p['id']; ?>" class="btn btn-info btn-xs"> Update </a></td>
                                    </tr>
                                    </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->