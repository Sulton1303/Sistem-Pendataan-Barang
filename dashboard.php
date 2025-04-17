<?php
include('db.php');
session_start();

// Mengecek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Melakukan CRUD
if (isset($_POST['insert'])) {
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $jenis_barang = $_POST['jenis_barang'];
    $pesan = $_POST['pesan'];

    $stmt = $conn->prepare("INSERT INTO barang (kode_barang, nama_barang, jenis_barang, pesan) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $kode_barang, $nama_barang, $jenis_barang, $pesan);
    
    if ($stmt->execute()) {
        $success = "Barang berhasil ditambahkan!";
    } else {
        $error = "Gagal menambahkan barang!";
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $jenis_barang = $_POST['jenis_barang'];
    $pesan = $_POST['pesan'];

    $stmt = $conn->prepare("UPDATE barang SET kode_barang=?, nama_barang=?, jenis_barang=?, pesan=? WHERE id=?");
    $stmt->bind_param("ssssi", $kode_barang, $nama_barang, $jenis_barang, $pesan, $id);
    
    if ($stmt->execute()) {
        $success = "Barang berhasil diperbarui!";
    } else {
        $error = "Gagal memperbarui barang!";
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    
    $stmt = $conn->prepare("DELETE FROM barang WHERE id=?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        $success = "Barang berhasil dihapus!";
    } else {
        $error = "Gagal menghapus barang!";
    }
}

// Melakukan Get Data
$edit_data = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $conn->query("SELECT * FROM barang WHERE id=$id");
    $edit_data = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Sistem Pendataan Barang</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
    <img src="./assets/stokbarang2.jpg" alt="Background" class="bg-image">
    
    <div class="dashboard-container">
        <header>
            <h1>Selamat Datang, <?php echo $_SESSION['username']; ?></h1>
            <a href="logout.php" class="logout-btn">Logout</a>
        </header>
        
        <?php if (isset($success)): ?>
            <div class="alert success"><?php echo $success; ?></div>
        <?php endif; ?>
        
        <?php if (isset($error)): ?>
            <div class="alert error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <div class="data-barang-container">
            <h2>Manajemen Data Barang</h2>
            
            <!-- Form Input Data -->
            <form method="POST" class="barang-form">
                <?php if ($edit_data): ?>
                    <input type="hidden" name="id" value="<?php echo $edit_data['id']; ?>">
                <?php endif; ?>
                
                <div class="form-group">
                    <input type="text" name="kode_barang" placeholder="Kode Barang" 
                           value="<?php echo $edit_data ? $edit_data['kode_barang'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <input type="text" name="nama_barang" placeholder="Nama Barang" 
                           value="<?php echo $edit_data ? $edit_data['nama_barang'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <input type="text" name="jenis_barang" placeholder="Jenis Barang" 
                           value="<?php echo $edit_data ? $edit_data['jenis_barang'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <textarea name="pesan" placeholder="Pesan"><?php echo $edit_data ? $edit_data['pesan'] : ''; ?></textarea>
                </div>
                
                <div class="action-buttons">
                    <?php if ($edit_data): ?>
                        <button type="submit" name="update" class="btn update">Update</button>
                        <a href="dashboard.php" class="btn cancel">Batal</a>
                    <?php else: ?>
                        <button type="submit" name="insert" class="btn insert">Insert</button>
                    <?php endif; ?>
                </div>
            </form>
            
            <!-- Tabel Data Barang -->
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jenis Barang</th>
                            <th>Pesan</th>
                            <th>Terakhir Diubah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM barang ORDER BY updated_at DESC";
                        $result = $conn->query($query);
                        
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                    <td>".htmlspecialchars($row['kode_barang'])."</td>
                                    <td>".htmlspecialchars($row['nama_barang'])."</td>
                                    <td>".htmlspecialchars($row['jenis_barang'])."</td>
                                    <td>".nl2br(htmlspecialchars($row['pesan']))."</td>
                                    <td>".$row['updated_at']."</td>
                                    <td>
                                        <a href='?edit=".$row['id']."'>Update</a> | 
                                        <a href='?delete=".$row['id']."' onclick=\"return confirm('Yakin ingin menghapus?')\">Delete</a>
                                    </td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>Tidak ada data barang</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>