<?php
$row = 1;
$array = [];
if (($handle = fopen("../../data/file.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        // echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        for ($c = 0; $c < $num; $c++) {
            // echo $data[$c] . "<br />\n";
            if ($c == 1 && $row != 2) {
                $array[] = array(
                    'username' => $data[1],
                    'fullname' => $data[2]
                );
            }
        }
    }
    fclose($handle);
}


$filesoal = file_get_contents("../../data/json/soal.json");
$soal = json_decode($filesoal, TRUE);


$fileisi = file_get_contents("../../data/json/isi.json");
$isi = json_decode($fileisi, TRUE);


$jawaban = [];
foreach ($array as $key => $v) {
    $pertanyaan = [];
    foreach ($soal as $key1 => $value) {
        if (isset($value['id'])) {
            $mt_rand5 = mt_rand(1, 5);
            $mt_rand3 = mt_rand(1, 2);
            $mt_rand2 = mt_rand(1, 2);
            if ($value['id'] == 1 or $value['id'] == 2) {
                $pertanyaan[] = [
                    'pertanyaan_' . $value['id'] => 'Ya',
                    'bagian' => $value['bagian']
                ];
            } else if ($value['id'] == 3) {
                if ($mt_rand5 == 1) {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => 'Youtube',
                        'bagian' => $value['bagian']
                    ];
                } elseif ($mt_rand5 == 2) {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => 'Iklan',
                        'bagian' => $value['bagian']
                    ];
                } elseif ($mt_rand5 == 3) {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => 'Facebook',
                        'bagian' => $value['bagian']
                    ];
                } elseif ($mt_rand5 == 4) {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => 'Orang Lain',
                        'bagian' => $value['bagian']
                    ];
                } elseif ($mt_rand5 == 5) {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => 'Instagram',
                        'bagian' => $value['bagian']
                    ];
                }
            } else if ($value['id'] == 4) {
                $pertanyaan[] = [
                    'pertanyaan_' . $value['id'] => $v['username'],
                    'bagian' => $value['bagian']
                ];
            } else if ($value['id'] == 5) {
                if ($v['fullname'] != '') {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => $v['fullname'],
                        'bagian' => $value['bagian']
                    ];
                } else {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => $v['username'],
                        'bagian' => $value['bagian']
                    ];
                }
            } else if ($value['id'] == 6) {
                if ($mt_rand2 == 1) {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => 'Pria',
                        'bagian' => $value['bagian']
                    ];
                } else {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => 'Wanita',
                        'bagian' => $value['bagian']
                    ];
                }
            } else if ($value['id'] == 7) {
                $pertanyaan[] = [
                    'pertanyaan_' . $value['id'] => rand(15, 40),
                    'bagian' => $value['bagian']
                ];
            } else if ($value['id'] == 8) {
                if ($mt_rand3 == 1) {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => 'Swasta',
                        'bagian' => $value['bagian']
                    ];
                } elseif ($mt_rand3 == 2) {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => 'Negri',
                        'bagian' => $value['bagian']
                    ];
                } elseif ($mt_rand3 == 3) {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => 'Pengusaha',
                        'bagian' => $value['bagian']
                    ];
                } else {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => 'Belum Bekerja',
                        'bagian' => $value['bagian']
                    ];
                }
            } else if ($value['id'] == 9) {
                if ($mt_rand5 == 1) {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => 'Sumatera',
                        'bagian' => $value['bagian']
                    ];
                } elseif ($mt_rand5 == 2) {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => 'Kalimantan',
                        'bagian' => $value['bagian']
                    ];
                } elseif ($mt_rand5 == 3) {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => 'Jawa',
                        'bagian' => $value['bagian']
                    ];
                } elseif ($mt_rand5 == 4) {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => 'Sulawesi',
                        'bagian' => $value['bagian']
                    ];
                } elseif ($mt_rand5 == 5) {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => 'Papua',
                        'bagian' => $value['bagian']
                    ];
                }
            } else if ($value['id'] > 9 && $value['id'] < 51) {
                if (substr($value['id'], -1) == 1) {
                    $nmrny = 1;
                } elseif (substr($value['id'], -1) == 5) {
                    $nmrny = 5;
                } elseif (substr($value['id'], -1) == 3) {
                    $nmrny = 3;
                } else {
                    $nmrny = mt_rand(3, 4);
                }
                $pertanyaan[] = [
                    'pertanyaan_' . $value['id'] =>  mt_rand(3, 4),
                    'bagian' => $value['bagian']
                ];
            } else if ($value['id'] == 51) {
                if ($mt_rand5 == 1) {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => '< 10x',
                        'bagian' => $value['bagian']
                    ];
                } elseif ($mt_rand5 == 2) {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => '10x - 20x',
                        'bagian' => $value['bagian']
                    ];
                } elseif ($mt_rand5 == 3) {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => '21x - 30x',
                        'bagian' => $value['bagian']
                    ];
                } elseif ($mt_rand5 == 4) {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => '31x - 40x',
                        'bagian' => $value['bagian']
                    ];
                } elseif ($mt_rand5 == 5) {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => '> 40x',
                        'bagian' => $value['bagian']
                    ];
                }
            } else if ($value['id'] == 52) {
                if ($mt_rand5 == 1) {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => 'Pagi',
                        'bagian' => $value['bagian']
                    ];
                } elseif ($mt_rand5 == 2) {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => 'Siang',
                        'bagian' => $value['bagian']
                    ];
                } elseif ($mt_rand5 == 3) {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => 'Sore',
                        'bagian' => $value['bagian']
                    ];
                } elseif ($mt_rand5 == 4) {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => 'Malam',
                        'bagian' => $value['bagian']
                    ];
                } elseif ($mt_rand5 == 5) {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => 'Tengah Malam',
                        'bagian' => $value['bagian']
                    ];
                }
            } else if ($value['id'] == 53) {
                if ($mt_rand3 == 1) {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => 'Feed',
                        'bagian' => $value['bagian']
                    ];
                } elseif ($mt_rand3 == 2) {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => 'Instastory',
                        'bagian' => $value['bagian']
                    ];
                } elseif ($mt_rand3 == 3) {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => 'Reels',
                        'bagian' => $value['bagian']
                    ];
                }
            } else if ($value['id'] == 54) {
                if ($mt_rand2 == 1) {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => 'Ya',
                        'bagian' => $value['bagian']
                    ];
                } else {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => 'Tidak',
                        'bagian' => $value['bagian']
                    ];
                }
            } else if ($value['id'] == 55) {
                if ($mt_rand2 == 1) {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => 'Ya',
                        'bagian' => $value['bagian']
                    ];
                } else {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => 'Tidak',
                        'bagian' => $value['bagian']
                    ];
                }
            } else if ($value['id'] == 56) {
                if ($mt_rand2 == 1) {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => 'Ya',
                        'bagian' => $value['bagian']
                    ];
                } else {
                    $pertanyaan[] = [
                        'pertanyaan_' . $value['id'] => 'Tidak',
                        'bagian' => $value['bagian']
                    ];
                }
            }
        }
    }
    $jawaban[] = array(
        'jawaban' => $pertanyaan,
        'status' => true
    );
}
echo json_encode($jawaban);
// print_r($jawaban);
$cek = file_put_contents("../../data/json/isi.json", json_encode($jawaban, JSON_PARTIAL_OUTPUT_ON_ERROR));
