<?php
class Database {
    public $db;
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "maroon_sports";

    public function __construct() {
        $this->db = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->db->connect_error) die("Koneksi Gagal!");
    }

    public function getAllProduk() {
        return $this->db->query("SELECT * FROM produk ORDER BY id DESC");
    }

    public function getProdukById($id) {
        $stmt = $this->db->prepare("SELECT * FROM produk WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create($nama, $kategori, $harga, $stok) {
        $stmt = $this->db->prepare("INSERT INTO produk (nama_produk, kategori, harga, stok) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssii", $nama, $kategori, $harga, $stok);
        return $stmt->execute();
    }

    public function update($id, $nama, $kategori, $harga, $stok) {
        $stmt = $this->db->prepare("UPDATE produk SET nama_produk=?, kategori=?, harga=?, stok=? WHERE id=?");
        $stmt->bind_param("ssiii", $nama, $kategori, $harga, $stok, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        return $this->db->query("DELETE FROM produk WHERE id = $id");
    }
}