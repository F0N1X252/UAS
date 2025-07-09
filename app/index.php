<?php
require 'dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = trim($_POST['nim'] ?? '');
    $nama = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');

    if ($nim && $nama && $email) {
        $stmt = $conn->prepare("INSERT INTO tasks (nim, nama, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nim, $nama, $email);
        $stmt->execute();
        $stmt->close();

        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

$result = $conn->query("SELECT * FROM tasks");
if (!$result) {
    die("Query error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Mahasiswa App</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <form method="POST">
        <input type="text" name="nim" placeholder="NIM" required><br>
        <input type="text" name="nama" placeholder="Nama" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <button type="submit">Tambah</button>
    </form>

    <h2>List Mahasiswa</h2>
    <ul>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <li>
                <?php echo htmlspecialchars($row['nim']) . ' - ' . 
                           htmlspecialchars($row['nama']) . ' - ' . 
                           htmlspecialchars($row['email']); ?>
            </li>
        <?php } ?>
    </ul>
</body>
</html>
