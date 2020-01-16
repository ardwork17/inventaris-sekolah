<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> <!-- isi konten -->

    <div class="row">
        <div class="col-lg-4">

            <?php foreach ($admin as $a) : ?>
                <form class="admin" method="post" action="<?= base_url('admin/edit_data_pinjam'); ?>">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="hidden" name="id" value="<?= $a->id; ?>">
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $a->nama_barang; ?>">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Barang</label>
                        <input type="text" class="form-control" id="jumlah_barang" name="jumlah_barang" value="<?= $a->jumlah_barang; ?>">
                    </div>
                    <div class=" form-group">
                        <label>Status</label>
                        <input type="text" class="form-control" id="status" name="status" value="<?= $a->status; ?>">
                    </div>
                    <div class=" form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $a->keterangan; ?>">
                    </div>
                    <button type=" submit" class="btn btn-primary">Update</button>
                <?php endforeach; ?>
                </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->