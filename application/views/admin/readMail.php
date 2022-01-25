<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Read Mail
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"> <a href="<?= base_url('admin/mail') ?>">Mail</a></li>
            <li class="active">Mail Box</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Read Mail</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="mailbox-read-info">
                            <h3><?= $mail['subject'] ?></h3>
                            <h5>From: <?= $mail['email'] ?> <span class="mailbox-read-time pull-right"><?php date_default_timezone_set('Asia/Jakarta');
                                                                                                        echo date('d-F-Y H:i:s', $mail['time']); ?></span></h5>
                        </div><!-- /.mailbox-read-info -->
                        <div class="mailbox-controls with-border text-center">
                            <div class="btn-group pull-right">
                                <a class="btn btn-default btn-sm" data-toggle="tooltip" title="Delete" href="<?= site_url('admin/deleteMail/') . $mail['id']; ?>"><i class="fa fa-trash-o"></i></a>
                                <a class="btn btn-default btn-sm" data-toggle="tooltip" title="Back" href="<?= site_url('admin/mail'); ?>"><i class="fa fa-reply"></i></a>
                            </div><!-- /.btn-group -->
                        </div><!-- /.mailbox-controls -->
                        <div class="mailbox-read-message">
                            <p><?= $mail['content']; ?></p>
                        </div><!-- /.mailbox-read-message -->
                    </div><!-- /.box-body -->
                </div><!-- /. box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->