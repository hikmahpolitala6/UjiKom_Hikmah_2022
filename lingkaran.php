<?php
require_once '../helpers/file-storage.php';// memanggil fungsi file stroge
require_once '../helpers/calculate.php';// 

$filename = '../data/DataAll.txt';// filename menyimpan data  atau disebut dengan variabel
$result = getData($filename, "lingkaran") ?? []; // result memanggil data di filename dataall.tx,
// jika nilai lingkaran kosong maka hasilnya kosong, tetapi jika nilai lingkaran terisi maka hasilnya ada
$lingkaran_total = calculateTotalOfEachshape($result, "lingkaran");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hikmah | JWP</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

</head>

<body>
    <?php include_once "../components/navbar.php" ?>

    <div class="container py-4">

        <!-- Title website -->
        <div class="p-5 mb-3 bg-light rounded">
            <div class="container text-warning">
                <h1 class="display-6 fw-bolder text-uppercase">Data Lingkaran</h1>
                <p>Daftar Data Lingkaran Yang Diinputkan</p>
            </div>

            <div class="container">
                <a href="./forms/form_add_lingkaran.php" class="btn btn-primary float-end" role="button">+ Hitung</a>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Jari-jari (r)</th>
                            <th scope="col">Hasil</th>
                            <th scope="col">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>


                        <!-- PHP START HERE -->
                        <?php
                        rsort($result);// untuk mengambil distancing nilai terakhir yang diinputkan
                        
                        if (is_array($result) && $lingkaran_total != 0) { // jika nilai result dan lingkaran_total maka nilai nya kosong

                            foreach ($result as $key => $values) {

                                if (!empty($values["id_lingkaran"])) {

                                    echo "<tr class='text-center'>";

                                    foreach ($values as $keyData => $data) {
                                        if (!empty($data)) {

                                            if ($keyData === "datetime") {
                                               // ubah format tanggal menjadi hari/bulan/tahun jam:menit
                                                $date = date_create($data);
                                                echo "<td>" . date_format($date, "d/m/Y H:i") . "</td>";
                                            } else {
                                                if ($keyData === "result") {
                                                    echo "<td>" . $data . " </td>";
                                                } else {
                                                    echo "<td>" . $data . "</td>";
                                                }
                                            }
                                        }
                                    }
                                    echo "</tr>";
                                }
                            }
                        } else {
                            echo "<td colspan='5' class='p-4 bg-light text-center text-danger fw-bold'>Data Tidak Ditemukan</td>";
                        }
                        ?>
                        <!-- PHP END HERE -->

                    </tbody>
                </table>
            </div>

        </div>

        <script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>