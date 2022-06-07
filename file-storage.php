<?php

function getData(string $filename, string $tabel = "", bool $id = false): ?array
{
    if (file_exists($filename)) {
        $data = json_decode(file_get_contents($filename), true);

        if ($id === false) {
            return $data;
        }

        switch ($tabel) {
            case 'segitiga':
                $search = array_search($id, array_column($data, 'id_segitiga'));
                break;
            case 'persegi':
                $search = array_search($id, array_column($data, 'id_persegi'));
                break;
            default:
                $search = array_search($id, array_column($data, 'id_lingkaran'));
                break;
        }

        return $data[$search];
    } else {
        return null;
    }
}

function save(string $filename, string $tabel, array $data): bool
{
    try {
        $hasil = [];
        if (file_exists($filename)) {
            $hasil = getData($filename, $tabel);
        }

        $hasil[] = $data;
        file_put_contents($filename, json_encode($hasil));

        return true;
    } catch (Exception $e) {
        return false;
    }
}