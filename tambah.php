<?php 
require_once 'partials/database.php'; // Pastikan nama folder lo 'partials' bukan 'Database'
if (isset($_POST['save'])) {
    $db = new Database();
    // Simpan data: Nama, Kategori, Harga, Stok 
    $db->create($_POST['nama'], $_POST['kategori'], $_POST['harga'], $_POST['stok']);
    header("Location: index.php");
}
require_once 'layout/web_header.php'; 
?>

<div class="container py-5 d-flex justify-content-center">
    <div class="card shadow-lg border-0 rounded-4 bg-body-tertiary w-100" style="max-width: 500px;">
        <div class="card-body p-5">
            <h3 class="fw-bold mb-4 text-center">Tambah Produk</h3>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Nama Perlengkapan</label>
                    <input type="text" name="nama" class="form-control rounded-3" placeholder="Contoh: Raket Padel Pro" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="kategori" class="form-select rounded-3">
                        <option value="Tenis">Tenis</option>
                        <option value="Padel">Padel</option>
                    </select>
                </div>
                <div class="row g-3 mb-4">
                    <div class="col-6">
                        <label class="form-label">Harga (Rp)</label>
                        <input type="number" name="harga" class="form-control rounded-3" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Stok</label>
                        <input type="number" name="stok" class="form-control rounded-3" required>
                    </div>
                </div>
                <button name="save" class="btn btn-primary w-100 py-3 rounded-pill fw-bold">
                    <i class="bi bi-save me-2"></i>Simpan Produk
                </button>
            </form>
        </div>
    </div>
</div>

<?php require_once 'layout/web_footer.php'; ?>