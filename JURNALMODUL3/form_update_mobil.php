<?php
include("connect.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Buatlah query untuk mengambil masing-masing data berdasarkan id dari database
    $result = mysqli_query($conn, "SELECT * FROM showroom_mobil WHERE id = $id");

    if ($result) {
        while ($carData = mysqli_fetch_assoc($result)) {
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Detail Mobil</title>
            </head>
            <body>
                <?php include("navbar.php"); ?>
                <div class="row">
                    <center>
                        <h1>Perbarui Detail Mobil</h1>
                        <div class="col-md-4 p-3">
                            <div class="card">
                                <div class="card-body">
                                    <form action="update.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
                                        <!-- Tampilkan masing-masing data berdasarkan id -->
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="nama_mobil" id="nama_mobil" value="<?php echo $carData['nama_mobil']; ?>">
                                            <label for="nama_mobil">Nama Mobil</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="brand_mobil" id="brand_mobil" value="<?php echo $carData['brand_mobil']; ?>">
                                            <label for="brand_mobil">Brand Mobil</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="warna_mobil" id="warna_mobil" value="<?php echo $carData['warna_mobil']; ?>">
                                            <label for="warna_mobil">Warna Mobil</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="tipe_mobil" id="tipe_mobil" value="<?php echo $carData['tipe_mobil']; ?>">
                                            <label for="tipe_mobil">Tipe Mobil</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" name="harga_mobil" id="harga_mobil" value="<?php echo $carData['harga_mobil']; ?>">
                                            <label for="harga_mobil">Harga Mobil</label>
                                        </div>
                                        <button type="submit" name="update" id="update" class="btn btn-primary mb-3 mt-3 w-100">Simpan</button>
                                    </form>
                                    <?php
                                    //melakukan proses perubahan data
                                    if (isset($_POST["update"])) {
                                        $nama_mobil = $_POST["nama_mobil"];
                                        $brand_mobil = $_POST["brand_mobil"];
                                        $warna_mobil = $_POST["warna_mobil"];
                                        $tipe_mobil = $_POST["tipe_mobil"];
                                        $harga_mobil = $_POST["harga_mobil"];
                                        mysqli_query($conn, "UPDATE showroom_mobil SET nama_mobil = '$nama_mobil', brand_mobil = '$brand_mobil', warna_mobil = '$warna_mobil', tipe_mobil = '$tipe_mobil', harga_mobil = '$harga_mobil' WHERE id = $id");
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </center>
                </div>
            </body>
            </html>
            <?php
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Parameter 'id' tidak ditemukan dalam URL";
}

// Menutup koneksi ke database
$conn->close();
?>
