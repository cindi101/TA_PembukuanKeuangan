<!-- Content-->
<section class="container-fluid">

    <div class="row">
        <div class="col-12">

            <!-- Basic Examples-->
            <div class="card mt-4">
                <div class="card-header">
                    <h6 class="card-title">Pemasukan<button class="btn btn-success btn-sm pull-right btn-tambah"> <i class="fa fa-plus"></i> Tambah</button>
                    </h6>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Modal Pemasukan</th>
                                <th>Nominal Pemasukan</th>
                                <th>Selisih</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($pemasukan->getResult() as $r) { ?>
                                <tr>
                                    <td><?= $no++ ?>.</td>
                                    <td><?= TanggalIndo($r->tanggal_pemasukan) ?></td>
                                    <td>Rp. <?= number_format($r->modal_pemasukan, 0, ',', '.') ?></td>
                                    <td>Rp. <?= number_format($r->biaya_pemasukan, 0, ',', '.') ?></td>
                                    <td>Rp. <?= number_format(($r->biaya_pemasukan - $r->modal_pemasukan), 0, ',', '.') ?></td>
                                    <td>
                                        <button class="btn btn-info btn-sm btn-edit" data-id="<?= $r->id_pemasukan ?>" data-nama="<?= $r->modal_pemasukan ?>" data-tanggal="<?= $r->tanggal_pemasukan ?>" data-biaya="<?= $r->biaya_pemasukan ?>"> <i class="fa fa-pencil"></i> Edit</button>
                                        <button class="btn btn-danger btn-sm btn-hapus" data-id="<?= $r->id_pemasukan ?>"><i class="fa fa-trash"></i> Hapus</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- / Basic Examples-->

        </div>


    </div>

    <div class="modal fade" id="modal-tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-tambah" method="POST">
                    <div class="modal-body">
                        <div class="success_message2"></div>
                        <div class="form-group">
                            <label for="">Tanggal pemasukan:</label>
                            <input type="date" name="tanggal_pemasukan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Modal pemasukan:</label>
                            <input type="text" name="modal_pemasukan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Nominal pemasukan:</label>
                            <input type="number" name="biaya_pemasukan" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-edit" method="POST">
                    <div class="modal-body">
                        <div class="success_message2"></div>
                        <div class="form-group">
                            <label for="">Tanggal pemasukan:</label>
                            <input type="hidden" name="id_pemasukan" id="id_pemasukan" class="form-control">
                            <input type="date" name="tanggal_pemasukan" id="tanggal_pemasukan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Modal pemasukan:</label>
                            <input type="text" name="modal_pemasukan" id="modal_pemasukan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Nominal pemasukan:</label>
                            <input type="number" name="biaya_pemasukan" id="biaya_pemasukan" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-hapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form-hapus" method="POST">
                    <div class="modal-body">
                        <div class="success_message2"></div>
                        <p>Apakah anda yakin akan menghapus data ini?</p>
                        <div class="form-group d-none">
                            <label for="">Nama Jenis Barang:</label>
                            <input type="text" name="id_pemasukan" id="id_pemasukan_hapus" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-primary">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>