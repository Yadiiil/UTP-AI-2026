<?php 
require_once 'database/database.php';
if (isset($_POST['save'])) {
    $db = new Database();
    $db->create($_POST['nama'], $_POST['kategori'], $_POST['harga'], $_POST['stok']);
    header("Location: index.php");
}
require_once 'layout/web_header.php'; 
?>
<div class="container py-4 d-flex justify-content-center">
    <div class="card p-4 shadow-sm" style="max-width: 500px; width: 100%;">
        <h4 class="fw-bold mb-4">Tambah Produk Baru</h4>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label text-secondary">Nama Perlengkapan</label>
                <input type="text" name="nama" class="form-control" placeholder="Contoh: Raket Padel Pro" required>
            </div>
            <div class="mb-3">
                <label class="form-label text-secondary">Kategori</label>
                <select name="kategori" class="form-select">
                    <option value="Tenis">Tenis</option>
                    <option value="Padel">Padel</option>
                </select>
            </div>
            <div class="row g-3">
                <div class="col-6 mb-3">
                    <label class="form-label text-secondary">Harga (Rp)</label>
                    <input type="number" name="harga" class="form-control" required>
                </div>
                <div class="col-6 mb-3">
                    <label class="form-label text-secondary">Stok</label>
                    <input type="number" name="stok" class="form-control" required>
                </div>
            </div>
            <button name="save" class="btn btn-primary w-100 py-2 mt-2 fw-bold">Simpan Produk</button>
        </form>
    </div>
</div>
<?php require_once 'layout/web_footer.php'; ?>