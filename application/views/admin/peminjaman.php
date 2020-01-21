<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> <!-- isi konten -->
    <form>
        <div class="box-footer text-left">
            <?= $this->session->flashdata('message'); ?>
            <a class="btn btn-primary" href="<?= base_url('admin/pinjam'); ?>" role="button">Tambah Data Peminjaman</a>
        </div>
        </br>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama barang</th>
                    <th scope="col">Jumlah Barang</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Status</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Pilihan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($admin as $a) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $a['nama_barang']; ?></td>
                        <td><?php echo $a['jumlah_barang']; ?></td>
                        <td> <?= date('D d F Y', $a['waktu']); ?></td>
                        <td><?php echo $a['status']; ?></td>
                        <td><?php echo $a['keterangan']; ?></td>
                        <td>
                            <div class="box-footer text-center">
                                <a class="badge badge-primary" href="<?= base_url('admin/edit_pinjam/' . $a['id']); ?>">Edit</a>
                                <a class="badge badge-danger" href="<?= base_url('admin/hapus/' . $a['id']);
                                                                    ?>" onclick="return confirm('Yakin Hapus Data?');">Hapus</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->