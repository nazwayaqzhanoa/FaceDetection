<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Mobil</title>
</head>
<body>
    <?php include("navbar.php") ?>
    <center>
        <div class="container">
            <h1>List Mobil</h1>

            <?php
            include("connect.php");

            // Buatlah query untuk mengambil data dari database (gunakan query SELECT)
            $query = mysqli_query($conn,"SELECT * FROM showroom_mobil");
            
            

            // Buatlah perkondisian dimana: 
            // 1. a. Apabila ada data dalam database, maka outputnya adalah semua data dalam database akan ditampilkan 
            //       (gunakan num_rows > 0, while, dan mysqli_fetch_assoc())
            //    b. Untuk setiap data yang ditampilkan, buatlah sebuah button atau link yang akan mengarahkan web ke halaman 
            //       form_detail_mobil.php dimana halaman tersebut akan menunjukkan seluruh data dari satu mobil berdasarkan id
            // 2. Apabila tidak ada data dalam database, maka outputnya adalah pesan 'tidak ada data dalam tabel'

            //<!--  **********************  1  **************************     -->
            
            if ($query) {
                while ($selects = mysqli_fetch_assoc($query)) {
                }
                ?>
                <table class="table">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="nama_mobil">nama_mobil</th>
                        <th scope="brand_mobil">brand_mobil</th>
                        <th scope="warna_mobil">warna_mobil</th>
                        <th scope="tipe_mobil">tipe_mobil</th>
                        <th scope="harga_mobil">harga_mobil</th>
                        </tr>
                    </thead>
                    <tbody>
                <tr>
                    <th scope="row"><?= $selects?></th>
                    <td><? $selects['$nama_mobil']?></td>
                    <td><? $selects['$brand_mobil']?></td>
                    <td><? $selects['$warna_mobil']?></td>
                    <td><? $selects['$tipe_mobil']?></td>
                    <td><? $selects['$harga_mobil']?></td>
                </tr>
                    </tbody>
                <?php
                
            
            







            //<!--  **********************  1  **************************     -->

            //<!--  **********************  2  **************************     -->
        } else {
            echo "Tidak ada dalam tabel";
        }
         
                 
            

            
            
            //<!--  **********************  2  **************************     -->
            ?>
        </div>
    </center>
</body>
</html>
