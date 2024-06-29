<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Barang</h1>
            </div>
            <!-- <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Starter Page</li>
                            </ol>
                        </div> -->
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-6 mt-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-barang" id="tombol_tambah">
                Tambah Pesanan
            </button>
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama barang</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($data as $barang) {
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?php echo $barang['nama_barang'] ?></td>
                        <td><?php echo $barang['kategori'] ?></td>
                        <td><?php echo $barang['jumlah'] ?></td>
                        <td>Rp.<?php echo $barang['harga']; ?></td>
                        <td>
                            <a href="/edit/<?= $barang['id']; ?>" class="btn btn-info btn-sm btn-edit">Edit</a>
                            <a href="/barang/delete/<?= $barang['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');" class="btn btn-danger btn-sm btn-delete">Delete</a>
                        </td>
                    </tr>

                <?php $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modal-barang">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('barang/save') ?>" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                    </div>
                    <div class="form-group">
                        <label for="kategori">kategori</label>
                        <select name="kategori" id="kategori" class="form-control">
                            <option value="makanan">makanan</option>
                            <option value="minuman">minuman</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">jumlah</label>
                        <input type="text" class="form-control" id="jumlah" name="jumlah">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">harga</label>
                        <input type="text" class="form-control" id="harga" name="harga">
                    </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- end modal -->

<?= $this->endSection() ?>