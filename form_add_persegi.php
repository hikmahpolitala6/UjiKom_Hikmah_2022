<?php
require_once '../../helpers/file-storage.php';
require_once '../../helpers/calculate.php';

// mengolah data hasil import form
if (isset($_POST["submit"])) {

    // nama file tempat menyimpan
    $filename = '../../data/DataAll.txt';

    // ambil data dari file
    $getData = getData($filename, "persegi");

    // ambil indeks terakhir dari array
    if (!is_null($getData)) {
        $lastRow = count($getData) - 1;
    }

   // tentukan id
    $id = (is_null($getData)) ? 1 : $getData[$lastRow]['id_persegi'] + 1;

  // simpan hasil fungsi hitung matematika
    $cal_result = persegi($_POST["side_persegi"]);

    // array data yang akan disimpan dalam file
    $data = [
        'id_segitiga' => null,
        'id_persegi' =>  $id,
        'id_lingkaran' => null,
        'base_segitiga' => null,
        'height_segitiga' => null,
        'side_persegi' =>  $_POST["side_persegi"],
        'radius_lingkaran' => null,
        'result' => $cal_result,
        'datetime' => date("Y-m-d h:i:sa")
    ];

// simpan data di file
    $result = save($filename, "persegi", $data);

    // jika proses hasil berhasil
     // atau setara dengan benar atau salah
     // itu akan meningkatkan peringatan dan mengarahkan pengguna
     // ke persegi.php
    if ($result) {
        echo "<script type='text/javascript'>
                alert('Data Berhasil Disimpan!');
                document.location.href = '../../views/persegi.php';
            </script>";
    } else {
        echo "<script type='text/javascript'>
                alert('Data GAGAL Disimpan!');
                document.location.href = '../../views/forms/form_add_persegi.php';
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hikmah | JWP</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">

</head>

<body>
    <?php include_once "../../components/navbar.php" ?>

    <div class="container py-4">

        <!-- Title website -->
        <div class="p-5 mb-3 bg-light rounded">
            <div class="container text-warning">
                <h1 class="display-6 fw-bolder ">Hitung Luas Persegi</h1>
                <p>Rumus Luas : <b>sisi*sisi</b></p>
            </div>

            <div class="container">
                <div class="card p-4">
                    <form class="row g-3" action="" method="POST">

                        <div class="mb-3">
                            <label for="sisi" class="form-label">Sisi</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" id="sisi" name="side_persegi"
                                    placeholder="sisi" required>
                              
                            </div>
                        </div>

                        <div class="mb-3 d-flex justify-content-end">
                            <a href="../persegi.php" class="btn btn-primary btn-lg mx-2" role="button">Kembali</a>

                            <input class="btn btn-success btn-lg" type="submit" name="submit" value="Hitung">
                        </div>


                    </form>
                </div>
            </div>

        </div>

        <script src="../../assets/js/bootstrap.min.js"></script>
</body>

</html>