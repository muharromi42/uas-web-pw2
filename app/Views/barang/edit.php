<!DOCTYPE html>
<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>
<div class="container">
    <h1>Edit User</h1>
    <?= \Config\Services::validation()->listErrors(); ?>
    <form action="<?= base_url('barang/update/' . $barang['id']) ?>" method="post">
        <input type="hidden" name="_method" value="PUT" />
        <div class="form-group">
            <label for="nama_barang">Nama:</label>
            <input type="text" name="nama_barang" value="<?= set_value('nama_barang', $barang['nama_barang']) ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="kategori">kategori:</label>
            <select name="kategori" id="kategori" class="form-control">
                <option value="makanan">makanan</option>
                <option value="minuman">minuman</option>
            </select>
        </div>

        <div class="form-group">
            <label for="jumlah">jumlah:</label>
            <input type="text" name="jumlah" class="form-control" value="<?= set_value('jumlah', $barang['jumlah']) ?>">
        </div>

        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="text" name="harga" class="form-control" value="<?= set_value('harga', $barang['harga']) ?>">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<!-- Masukkan skrip JavaScript Bootstrap jika diperlukan -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
<?= $this->endSection() ?>