<?php 
require_once 'database/database.php';
$db = new Database();
$data = $db->getProdukById($_GET['id']);

if (isset($_POST['update'])) {
    $db->update($_GET['id'], $_POST['nama'], $_POST['kategori'], $_POST['harga'], $_POST['stok']);
    header("Location: index.php");
}
require_once 'layout/web_header.php'; 
?>
<div class="card p-4 mx-auto" style="max-width: 500px;">
    <h4 class="fw-bold mb-4">Edit Produk</h4>
    <form method="POST">
        <div class="mb-3"><label>Nama Produk</label><input type="text" name="nama" class="form-control" value="<?= $data['nama_produk'] ?>" required></div>
        <div class="mb-3"><label>Kategori</label><select name="kategori" class="form-select"><option value="Tenis" <?= $data['kategori'] == 'Tenis' ? 'selected' : '' ?>>Tenis</option><option value="Padel" <?= $data['kategori'] == 'Padel' ? 'selected' : '' ?>>Padel</option></select></div>
        <div class="mb-3"><label>Harga</label><input type="number" name="harga" class="form-control" value="<?= $data['harga'] ?>" required></div>
        <div class="mb-3"><label>Stok</label><input type="number" name="stok" class="form-control" value="<?= $data['stok'] ?>" required></div>
        <button name="update" class="btn btn-warning w-100 py-2">Update</button>
    </form>
</div>
<?php require_once 'layout/web_footer.php'; ?>