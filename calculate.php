<?php

// berfungsi untuk menghitung total
// data untuk setiap bentuk yang dilakukan
function calculateTotalOfEachshape(array $arrays, string $shape)
{
    $total = 0;
    if (is_array($arrays)) {

        foreach ($arrays as $key => $values) {
            if (!empty($values["id_" . $shape])) {
                $total++;
            }
        }
    }
    return $total;
}

// berfungsi untuk menghitung persentase
// data untuk setiap bentuk
function percentage(array $arrays, string $shape)
{
    if (is_array($arrays)) {
        $total_all = count($arrays);
    } else {
        $total_all = 0;
    }
    // simpan total data untuk setiap bentuk yang dilakukan
    $total_for_shape = calculateTotalOfEachshape($arrays, $shape);

    if (!empty($total_for_shape) && $total_for_shape !== 0) {
        $result = ($total_for_shape / $total_all) * 100;
        $result = round($result, 2);
    } else {
        $result = 0;
    }
    return $result . "%";
}

// berfungsi untuk menghitung luas segitiga
// dengan rumus 1/2 x alas x tinggi
function segitiga(float $base, float $height)
{
    return ($base * $height) / 2;
}

// berfungsi untuk menghitung luas persegi
// dengan rumus s x s
function persegi(float $side)
{
    return $side * $side;
}

// berfungsi untuk menghitung luas lingkaran
// dengan rumus x r²
function lingkaran(float $radius)
{
    return 3.14 * ($radius * $radius);
}


