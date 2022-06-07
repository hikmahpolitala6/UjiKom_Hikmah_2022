<?php
require_once '../../helpers/file-storage.php';
require_once '../../helpers/calculate.php';

// mengolah data hasil import form
if (isset($_POST["submit"])) {

  // nama file tempat menyimpan
    $filename = '../../data/DataAll.txt';

// ambil data dari file
    $getData = getData($filename, "segitiga");

    // ambil indeks terakhir dari array
    if (!is_null($getData)) {
        $lastRow = count($getData) - 1;
    }
// tentukan id
    $id = (is_null($getData)) ? 1 : $getData[$lastRow]['id_segitiga'] + 1;

    
  // simpan hasil fungsi hitung matematika
    $cal_result = segitiga($_POST["base_segitiga"], $_POST["height_segitiga"]);

    // array data yang akan disimpan dalam file
    $data = [
        'id_segitiga' => $id,
        'id_persegi' =>  null,
        'id_lingkaran' => null,
        // 'student_name' => $_POST["student_name"],
        'base_segitiga' => $_POST["base_segitiga"],
        'height_segitiga' => $_POST["height_segitiga"],
        'side_persegi' =>  null,
        'radius_lingkaran' => null,
        'result' => $cal_result,
        'datetime' => date("Y-m-d h:i:sa")
    ];

   // simpan data di file
    $result = save($filename, "segitiga", $data);

   // jika proses hasil berhasil
     // atau setara dengan benar atau salah
     // itu akan meningkatkan peringatan dan mengarahkan pengguna
     // ke segitiga.php
    if ($result) {
        echo "<script type='text/javascript'>
                alert('Data Berhasil Disimpan!');
                document.location.href = '../../views/segitiga.php';
            </script>";
    } else {
        echo "<script type='text/javascript'>
                alert('Data GAGAL Disimpan!');
                document.location.href = '../../views/forms/form_add_segitiga.php';
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
    <title>Hikmah | JWP </title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">

</head>

<body>
    <?php include_once "../../components/navbar.php" ?>

    <div class="container py-4">

        <!-- Title website -->
        <div class="p-5 mb-3 bg-light rounded">
            <div class="container text-warning">
                <h1 class="display-6 fw-bolder ">Hitung Luas Segitiga</h1>
                <p>Rumus Luas : <b>1/2*Alas*Tinggi</b></p>
            </div>

            <div class="container">
                <div class="card p-4">
                    <form class="row g-3" action="" method="POST">

                       
                        <div class="mb-3">
                            <label for="alas" class="form-label">Alas</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" id="alas" name="base_segitiga"
                                    placeholder="alas" required>
                               
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="tinggi" class="form-label">Tinggi</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" id="tinggi" name="height_segitiga"
                                    placeholder="tinggi" required>
                                
                            </div>
                        </div>

                        <div class="mb-3 d-flex justify-content-end">
                            <a href="../segitiga.php" class="btn btn-primary btn-lg mx-2" role="button">Kembali</a>

                            <input class="btn btn-success btn-lg" type="submit" name="submit" value="Hitung">
                        </div>


                    </form>
                </div>
            </div>

        </div>

        <script src="./assets/js/bootstrap.min.js"></script>
</body>

</html>