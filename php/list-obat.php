<?php
    // Koneksi ke database
    $mysqli = new mysqli("127.0.0.1", "root", "", "obatsalesdb");

    if ($mysqli->connect_error) {
        die("Koneksi database gagal: " . $mysqli->connect_error);
    }

    // Hitung jumlah total data
    $query = "SELECT COUNT(*) as total FROM obat";
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();
    $totalItems = $row['total'];

    // Tentukan berapa item yang ingin ditampilkan per halaman
    $itemsPerPage = 10;

    // Hitung jumlah halaman
    $totalPages = ceil($totalItems / $itemsPerPage);

    // Tentukan halaman yang aktif
    if (isset($_GET['page'])) {
        $currentPage = $_GET['page'];
    } else {
        $currentPage = 1;
    }

    // Hitung offset
    $offset = ($currentPage - 1) * $itemsPerPage;

    // Ambil data dari database
    $kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';
    $minHarga = isset($_GET['min']) ? $_GET['min'] : 0;
    $maxHarga = isset($_GET['max']) ? $_GET['max'] : 0;

    $query = "";
    if ($kategori === "" && $minHarga === 0 && $maxHarga === 0) {
        $query = "SELECT * FROM obat LIMIT $offset, $itemsPerPage";
    } else if ($minHarga !== 0 && $maxHarga !== 0 && $kategori === "") {
        $query = "SELECT * FROM obat WHERE harga BETWEEN $minHarga AND $maxHarga LIMIT $offset, $itemsPerPage";
    } else if ($kategori !== "" && $minHarga !== 0 && $maxHarga !== 0) {
        $query = "SELECT * FROM obat WHERE kategori='$kategori' AND harga BETWEEN $minHarga AND $maxHarga LIMIT $offset, $itemsPerPage";
    } else if ($kategori !== "" && $minHarga === 0 && $maxHarga === 0){
        $query = "SELECT * FROM obat WHERE kategori='$kategori' LIMIT $offset, $itemsPerPage";
    }

    
    $result = $mysqli->query($query);

    // Tampilkan data dalam markup HTML
    echo "<div id='paginated-list'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='item'>";
        echo "<img src='../asset/image/photo.png' alt='item-icon'>";
        echo "<p>" . $row['nama'] . "</p>";
        echo "<p>$" . $row['harga'] . "</p>";
        echo "</div>";
    }
    echo "</div>";

    // Tampilkan navigasi paginasi
    echo "<div id='pagination'>";
    for ($i = 1; $i <= $totalPages; $i++) {
        echo "<p><a href='?page=$i'>$i</a></p>";
    }
    echo "</div>";

    // Tutup koneksi database
    $mysqli->close();
?>
