<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Mailbox
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Mail</li>
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
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Pesan Masuk</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Waktu</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($mail as $m) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $m['name'] ?></td>
                                        <td><?= $m['email'] ?></td>
                                        <td><?= $m['subject'] ?></td>
                                        <td>
                                            <?php date_default_timezone_set('Asia/Jakarta');
                                            echo date('d-F-Y H:i:s', $m['time']); ?>
                                        </td>
                                        <td>
                                            <?php if ($m['readStatus'] == 0)
                                                echo '<b class="text-primary"> Unread </b>';
                                            else
                                                echo '<b class="text-danger"> Readed </b>'
                                            ?>
                                        </td>
                                        <td align="center">
                                            <a href="<?= base_url('admin/readMail/') . $m['id']; ?>" class="btn btn-info btn-xs"> Read </a>
                                            <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-danger<?= $m['id'] ?>">
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
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Waktu</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- /.modal -->
<?php $no = 0;
foreach ($mail as $m) : $no++; ?>
    <div class="modal modal-danger fade" id="modal-danger<?= $m['id']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Pesan !!!</h4>
                </div>
                <div class="modal-body">
                    <p>Pesan dengan id [<?= $m['id'] ?>] , nama pengirim [<?= $m['name'] ?>] akan dihapus?&hellip;</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('admin/deleteMail/') . $m['id']; ?>" class="btn btn-outline">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>