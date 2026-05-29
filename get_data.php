<?php
// Konfigurasi Database
$host     = 'localhost';
$db       = 'healthmap';
$user     = 'postgres';
$password = '123456';
$port     = '5432'; // Port default PostgreSQL

try {
    // Membuat koneksi DSN (Data Source Name)
    $dsn = "pgsql:host=$host;port=$port;dbname=$db;";
    
    // Inisialisasi PDO
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    $pdo = new PDO($dsn, $user, $password, $options);

    // Contoh pengambilan data sederhana
    $stmt = $pdo->query("SELECT * FROM nama_tabel LIMIT 10");
    $data = $stmt->fetchAll();

    // Menampilkan hasil dalam format JSON (Opsional, berguna untuk API/Mobile)
    header('Content-Type: application/json');
    echo json_encode($data);

} catch (PDOException $e) {
    // Menangani error jika koneksi gagal
    die("Koneksi gagal: " . $e->getMessage());
}
?>