<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> <!-- isi konten -->
    <form>
        <div class="box-footer text-left">
        </div>
        </br>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama barang</th>
                    <th scope="col">Jumlah Barang</th>
                    <th scope="col">Kondisi</th>
                    <th scope="col">Tanggal Pembelian</th>
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
                        <td><?php echo $a['kondisi']; ?></td>
                        <td> <?= date('D d F Y ', $a['pembelian']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->