<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> <!-- isi konten -->

    <div class="row">
        <div class="col-lg-4">

            <form class="admin" method="post" action="<?= base_url('admin/tambah_aksi'); ?>">
                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label>Jumlah Barang</label>
                    <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label>Kondisi</label>
                    <select class="custom-select" id="kondisi" name="kondisi">
                        <option selected>Pilih...</option>
                        <option value="Baru">Baru</option>
                        <option value="Bekas">Bekas</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="text" class="form-control" id="harga" name="harga" aria-label="Rupiah amount (with dot and two decimal places)">
                    </div>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea type="text" class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                    <!-- <label>Keterangan</label>
                    <input type="text area" class="form-control" id="keterangan" name="keterangan" aria-describedby="emailHelp"> -->
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->