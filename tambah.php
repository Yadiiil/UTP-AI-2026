<?php 
require_once 'database/database.php';
if (isset($_POST['save'])) {
    $db = new Database();
    $db->create($_POST['nama'], $_POST['kategori'], $_POST['harga'], $_POST['stok']);
    header("Location: index.php");
}
require_once 'layout/web_header.php'; 
?>
<div class="card p-4 mx-auto" style="max-width: 500px;">
    <h4 class="fw-bold mb-4">Tambah Produk Baru</h4>
    <form method="POST">
        <div class="mb-3"><label>Nama Produk</label><input type="text" name="nama" class="form-control" required></div>
        <div class="mb-3"><label>Kategori</label><select name="kategori" class="form-select"><option value="Tenis">Tenis</option><option value="Padel">Padel</option></select></div>
        <div class="mb-3"><label>Harga</label><input type="number" name="harga" class="form-control" required></div>
        <div class="mb-3"><label>Stok</label><input type="number" name="stok" class="form-control" required></div>
        <button name="save" class="btn btn-primary w-100 py-2">Simpan</button>
    </form>
</div>
<?php require_once 'layout/web_footer.php'; ?>