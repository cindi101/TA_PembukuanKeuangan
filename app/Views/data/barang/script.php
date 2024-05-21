<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();

        $(document).on('click', '.btn-tambah', function(e) {
            e.preventDefault();
            $('#modal-tambah').modal('show');
        });

        $(document).on('click', '.btn-edit', function(e) {
            e.preventDefault();
            $('#modal-edit').modal('show');
            var id_barang = $(this).attr('data-id');
            $('#id_barang').val(id_barang);
            $.ajax({
                url: "<?= base_url() ?>data/barang/getdata",
                method: "POST",
                data: {
                    id_barang: id_barang
                },
                dataType: 'json',
                success: function(data) {
                    $('#kode_barang').val(data.kode_barang);
                    $('#nama_barang').val(data.nama_barang);
                    $('#id_kategori_barang').val(data.id_kategori_barang);
                    $('#id_jenis_barang').val(data.id_jenis_barang);
                    $('#id_satuan_barang').val(data.id_satuan_barang);
                    $('#harga_jual').val(data.harga_jual);
                }
            });
        });

        $(document).on('click', '.btn-hapus', function(e) {
            e.preventDefault();
            $('#modal-hapus').modal('show');
            var id_barang = $(this).attr('data-id');
            $('#id_barang_hapus').val(id_barang);

        });


        $(document).on('submit', '#form-tambah', function(e) {
            e.preventDefault();
            var data = new FormData(this);
            $(":submit").attr('disabled', true);
            $('.success_message2').html('Loading....');
            $.ajax({
                url: "<?= base_url() ?>data/barang/simpan",
                method: "POST",
                data: data,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.status == 'sukses') {
                        $(":submit").attr('disabled', false);
                        $('.success_message2').html(data.msg);
                        location.reload();
                    } else {
                        $(":submit").attr('disabled', false);
                        $('.success_message2').html(data.msg);
                    }
                }
            });
        });

        $(document).on('submit', '#form-edit', function(e) {
            e.preventDefault();
            var data = new FormData(this);
            $(":submit").attr('disabled', true);
            $('.success_message2').html('Loading....');
            $.ajax({
                url: "<?= base_url() ?>data/barang/update",
                method: "POST",
                data: data,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.status == 'sukses') {
                        $(":submit").attr('disabled', false);
                        $('.success_message2').html(data.msg);
                        location.reload();
                    } else {
                        $(":submit").attr('disabled', false);
                        $('.success_message2').html(data.msg);
                    }
                }
            });
        });

        $(document).on('submit', '#form-hapus', function(e) {
            e.preventDefault();
            var data = $(this).serialize();
            $(":submit").attr('disabled', true);
            $('.success_message2').html('Loading....');
            $.ajax({
                url: "<?= base_url() ?>data/barang/hapus",
                method: "POST",
                data: data,
                dataType: 'json',
                success: function(data) {
                    if (data.status == 'sukses') {
                        $(":submit").attr('disabled', false);
                        $('.success_message2').html(data.msg);
                        location.reload();
                    } else {
                        $(":submit").attr('disabled', false);
                        $('.success_message2').html(data.msg);
                    }
                }
            });
        });
    });
</script>