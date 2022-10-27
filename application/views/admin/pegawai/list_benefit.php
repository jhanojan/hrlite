<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                    <?php echo $this->session->flashdata('msg'); ?>
                    <?php if (validation_errors()) { ?>
                        <div class="alert alert-danger">
                            <strong><?php echo strip_tags(validation_errors()); ?></strong>
                            <a href="" class="float-right text-decoration-none" data-dismiss="alert"><i class="fas fa-times"></i></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-primary card-outline">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">List Master Benefit</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class=" table table-bordered table-hover" id="table-id" style="font-size:13px;">
                                        <thead>
                                            <th>#</th>
                                            <th>Kode benefit</th>
                                            <th>Nama benefit</th>
                                            <th>Edit</th>
                                            <th>Hapus</th>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($mst_benefit as $md) : ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $md['kode_mst_benefit']; ?></td>
                                                    <td><?php echo $md['title']; ?></td>
                                                    <td><button type="buton" class="tombol-edit btn btn-info btn-block btn-sm" data-id="<?php echo $md['id_mst_benefit']; ?>" data-toggle="modal" data-target="#edit-benefit">Edit benefit</button></td>
                                                    <td><a href="<?php echo base_url('admin/del_mst_benefit/') . $md['id_mst_benefit']; ?>" class="tombol-hapus btn btn-danger btn-block btn-sm">Hapus</a> </td>
                                                <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Master benefit
                        </div>
                        <div class="card-body">
                            <form role="form" action="<?php echo base_url('admin/list_mst_benefit'); ?>" method="post">
                                <div class="form-group">
                                    <label for="kdjab">Kode benefit</label>
                                    <input type="text" class="form-control" id="kdjab" name="kode_mst_benefit" value="<?php echo $kode_mst_benefit; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="jab">Nama benefit</label>
                                    <input type="text" class="form-control" id="jab" name="title">
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan Data</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="edit-benefit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit benefit</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <form action="<?php echo base_url('admin/proses_edit_mst_benefit'); ?>" method="post" id="form_id">
                        <div class="form-group">
                            <label for="kdjab">Kode benefit</label>
                            <input type="hidden" name="id_mst_benefit" id="idjson">
                            <input type="text" class="form-control" id="kdmstbenefitjson" name="kode_mst_benefit" readonly>
                        </div>
                        <div class="form-group">
                            <label for="jab">Nama benefit</label>
                            <input type="text" class="form-control" id="titlejson" name="title">
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">Simpan Perubahan</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>

<script>
    $('.tombol-edit').on('click', function() {
        const id_mst_benefit = $(this).data('id');
        $.ajax({
            url: '<?php echo base_url('admin/edit_mst_benefit'); ?>',
            // id kiri data yg dikirimkan, yang kanan isi datanya
            data: {
                id_mst_benefit: id_mst_benefit
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#kdmstbenefitjson').val(data.kode_mst_benefit);
                $('#titlejson').val(data.title);
                $('#idjson').val(data.id_mst_benefit);
            }
        });
    });
</script>