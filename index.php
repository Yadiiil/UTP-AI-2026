<?php 
require_once 'database/database.php';
$db = new Database();
$produk = $db->getAllProduk();

$rekomendasi = "";
if (isset($_POST['cek_ai'])) {
    $lap = $_POST['lapangan'];
    $lvl = $_POST['level'];
    if ($lap == "Hard" && $lvl == "Pro") $rekomendasi = "Rekomendasi: Wilson Blade v9";
    elseif ($lap == "Clay" && $lvl == "Pemula") $rekomendasi = "Rekomendasi: Babolat Boost Drive";
    elseif ($lap == "Padel" && $lvl == "Pro") $rekomendasi = "Rekomendasi: Bullpadel Vertex 04";
    elseif ($lap == "Padel" && $lvl == "Pemula") $rekomendasi = "Rekomendasi: Adidas Drive 3.2";
    else $rekomendasi = "Rekomendasi: Yonex Ezone 100";
}
require_once 'layout/web_header.php'; 
?>
<div class="card p-4 mb-4 bg-secondary bg-opacity-10 border-0">
    <h5 class="fw-bold"><i class="bi bi-robot me-2"></i>AI Racket Finder</h5>
    <form method="POST" class="row g-2">
        <div class="col-md-5"><select name="lapangan" class="form-select"><option value="Hard">Hard Court</option><option value="Padel">Padel Court</option></select></div>
        <div class="col-md-5"><select name="level" class="form-select"><option value="Pemula">Pemula</option><option value="Pro">Pro</option></select></div>
        <div class="col-md-2"><button name="cek_ai" class="btn btn-primary w-100">Cek</button></div>
    </form>
    <?php if($rekomendasi): ?><div class="alert alert-info mt-3"><?= $rekomendasi ?></div><?php endif; ?>
</div>

<div class="d-flex justify-content-between mb-3">
    <h4>Katalog Produk</h4>
    <a href="tambah.php" class="btn btn-primary text-white">Tambah Produk</a>
</div>

<table class="table table-hover align-middle mb-0">
    <thead class="table-dark">
        <tr>
            <th class="ps-4">Nama Produk</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th class="text-center">Stok</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $produk->fetch_assoc()): ?>
        <tr>
            <td class="ps-4 fw-semibold"><?= $row['nama_produk'] ?></td>
            <td><span class="badge bg-info text-dark"><?= $row['kategori'] ?></span></td>
            <td>Rp <?= number_format($row['harga']) ?></td>
            <td class="text-center"><?= $row['stok'] ?></td>
            <td class="text-center">
                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-warning rounded-circle"><i class="bi bi-pencil"></i></a>
                <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger rounded-circle"><i class="bi bi-trash"></i></a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php require_once 'layout/web_footer.php'; ?>