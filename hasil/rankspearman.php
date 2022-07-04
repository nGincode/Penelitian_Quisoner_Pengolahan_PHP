<?php


$filesoal = file_get_contents("../json/soal.json");
$soal = json_decode($filesoal, TRUE);


$fileisi = file_get_contents("../json/isi.json");
$isi = json_decode($fileisi, TRUE);


$filertable = file_get_contents("../json/rtable.json");
$rtbl = json_decode($filertable, TRUE);



//rank

function rank($array, $rank)
{

    $i = 1;
    $data = [];
    foreach ($array as $key => $values) {
        $max = max($array);
        $data[] = array(
            'rank' => $i,
            'no' => $max
        );
        $keys = array_search($max, $array);
        unset($array[$keys]);
        if (sizeof($array) > 0) {
            if (!in_array($max, $array)) {
                $i++;
            }
        }
    }

    $hasil = [];
    foreach ($data as $value) {
        if ($value['no'] == $rank) {
            $hasil[] = $value['rank'];
        }
    }
    $nilai = array_unique($hasil);
    return $nilai;
}

function arrayjml($pilih, $datavalid)
{


    $filesoal = file_get_contents("../json/soal.json");
    $soal = json_decode($filesoal, TRUE);


    $fileisi = file_get_contents("../json/isi.json");
    $isi = json_decode($fileisi, TRUE);

    $jmlx1 = [];
    $jmlx2 = [];
    $jmly = [];
    foreach ($isi as $noa => $a) {

        $jumlahx1 = 0;
        foreach ($soal as $c) {
            if (isset($c['hubungan'])) {
                if ($c['hubungan'] == 'x1') {
                    foreach ($a['jawaban'] as $d) {
                        if (isset($d['pertanyaan_' . $c['id']]) && in_array($c['id'], $datavalid)) {
                            $jumlahx1 += $d['pertanyaan_' . $c['id']];
                        }
                    }
                }
            }
        }

        $jumlahx2 = 0;
        foreach ($soal as $c) {
            if (isset($c['hubungan'])) {
                if ($c['hubungan'] == 'x2') {
                    foreach ($a['jawaban'] as $d) {
                        if (isset($d['pertanyaan_' . $c['id']]) && in_array($c['id'], $datavalid)) {
                            $jumlahx2 += $d['pertanyaan_' . $c['id']];
                        }
                    }
                }
            }
        }


        $jumlahy = 0;
        foreach ($soal as $c) {
            if (isset($c['hubungan'])) {
                if ($c['hubungan'] == 'y') {
                    foreach ($a['jawaban'] as $d) {
                        if (isset($d['pertanyaan_' . $c['id']]) && in_array($c['id'], $datavalid)) {
                            $jumlahy += $d['pertanyaan_' . $c['id']];
                        }
                    }
                }
            }
        }


        $jmlx1[] = $jumlahx1;
        $jmlx2[] = $jumlahx2;
        $jmly[] = $jumlahy;
    }


    if ($pilih == 'x1') {
        return $jmlx1;
    } elseif ($pilih == 'x2') {
        return $jmlx2;
    } elseif ($pilih == 'y') {
        return $jmly;
    }
}
?>



<div class="formbg-outer">
    <div class="formbg">
        <div class="judul" onclick="toggle_visibility('rank')">Uji Hubungan

            <div style="float: right;" id="rankhide">Hide</div>

        </div>
        <div id="rank" style="display: none;" class="formbg-inner padding-horizontal--48  animate__animated animate__fadeInDown">

            <center>
                <h2>Uji Rank Spearman</h2><br>
            </center><br>

            <center>
                Pertanyaan Dianalisis: <?php foreach ($datavalid as $datavalidv) {
                                            echo ' Pertanyaan ' . $datavalidv;
                                        } ?>
            </center>
            <br>
            <div class="row">

                <div class="column" style="width: 100%;">
                    <table id="customers">
                        <tr>
                            <th style="text-align: center;">Username</th>
                            <th style="text-align: center;">X1</th>
                            <th style="text-align: center;">X2</th>
                            <th style="text-align: center;">Y</th>
                            <th style="text-align: center;">Rank X1</th>
                            <th style="text-align: center;">Rank X2</th>
                            <th style="text-align: center;">Rank Y</th>
                            <th style="text-align: center;">d1 = X1 - Y</th>
                            <th style="text-align: center;">d1 <sup>2</sup></th>
                            <th style="text-align: center;">d2 = X2 - Y</th>
                            <th style="text-align: center;">d2 <sup>2</sup></th>
                        </tr>
                        <?php
                        $d1 = 0;
                        $d2 = 0;
                        $kesmpulan = [];
                        foreach ($isi as $noa => $a) { ?>
                            <tr>
                                <?php

                                foreach ($a['jawaban'] as $b) {
                                    if (isset($b['pertanyaan_4'])) { ?>
                                        <td><?= $b['pertanyaan_4'] ?></td>
                                <?php }
                                } ?>


                                <?php
                                $jumlahx1 = 0;
                                foreach ($soal as $c) {
                                    if (isset($c['hubungan'])) {
                                        if ($c['hubungan'] == 'x1') {
                                            foreach ($a['jawaban'] as $d) {
                                                if (isset($d['pertanyaan_' . $c['id']]) && in_array($c['id'], $datavalid)) {
                                                    $jumlahx1 += $d['pertanyaan_' . $c['id']];
                                                }
                                            }
                                        }
                                    }
                                }

                                $jumlahx2 = 0;
                                foreach ($soal as $c) {
                                    if (isset($c['hubungan'])) {
                                        if ($c['hubungan'] == 'x2') {
                                            foreach ($a['jawaban'] as $d) {
                                                if (isset($d['pertanyaan_' . $c['id']]) && in_array($c['id'], $datavalid)) {
                                                    $jumlahx2 += $d['pertanyaan_' . $c['id']];
                                                }
                                            }
                                        }
                                    }
                                }


                                $jumlahy = 0;
                                foreach ($soal as $c) {
                                    if (isset($c['hubungan'])) {
                                        if ($c['hubungan'] == 'y') {
                                            foreach ($a['jawaban'] as $d) {
                                                if (isset($d['pertanyaan_' . $c['id']]) && in_array($c['id'], $datavalid)) {
                                                    $jumlahy += $d['pertanyaan_' . $c['id']];
                                                }
                                            }
                                        }
                                    }
                                }
                                ?>
                                <td>
                                    <?= $jumlahx1 ?>
                                </td>
                                <td>
                                    <?= $jumlahx2 ?>
                                </td>
                                <td>
                                    <?= $jumlahy ?>
                                </td>
                                <td><?= $rnkx1 = rank(arrayjml('x1', $datavalid), $jumlahx1)[0]; ?></td>
                                <td><?= $rnkx2 = rank(arrayjml('x2', $datavalid), $jumlahx2)[0]; ?></td>
                                <td><?= $rnky = rank(arrayjml('y', $datavalid), $jumlahy)[0]; ?></td>
                                <td><?= $rnkx1 - $rnky; ?></td>
                                <td><?= pow($rnkx1 - $rnky, 2); ?></td>
                                <td><?= $rnkx2 - $rnky; ?></td>
                                <td><?= pow($rnkx2 - $rnky, 2); ?></td>
                            </tr>


                        <?php
                            $d1 += pow($rnkx1 - $rnky, 2);
                            $d2 += pow($rnkx2 - $rnky, 2);
                        } ?>
                        <tr>
                            <th colspan="8">Jumlah</th>
                            <th><?= $d1 ?></th>
                            <th></th>
                            <th><?= $d2 ?></th>
                        </tr>
                    </table>
                    <br><br>
                    <b>Diketahui :</b><br>
                    N = <?= count($isi) ?><br>
                    d1<sup>2</sup> = <?= $d1 ?><br>
                    d2<sup>2</sup> = <?= $d2 ?><br><br>
                    <b>Rumus :</b><br>
                    <img width="300" src="https://parameterd.files.wordpress.com/2013/09/212.png"><br>
                    <b>Penyelesaian :</b><br>
                    1.) Hubungan X1 dengan Y<br>
                    rs = 6(<?= $d1 ?>)/<?= count($isi) ?>(<?= count($isi) ?><sup>2</sup> - 1)<br>
                    rs = <?= 6 * $d1 ?>/<?= count($isi) ?>(<?= pow(count($isi), 2) - 1 ?>)<br>
                    <?php
                    $d1bil1 = 6 * $d1;
                    $d1bil2 = count($isi) * (pow(count($isi), 2) - 1);
                    ?>
                    rs = <?= $hasilnyax1 = 1 - ($d1bil1 / $d1bil2)  ?><br>
                    <img src="https://2.bp.blogspot.com/-jdTucUHYxz4/TaGFnBhqrHI/AAAAAAAAAds/XUIUhvLyF5k/s1600/tabel%2Barti%2Bkorelasi.PNG"><br>
                    Maka korelasinya adalah <?php if ($hasilnyax1 >= 1) {
                                                echo '<b style="color:green">Sempurna</b>';
                                                $rankspearmkes = '<b style="color:green">Sempurna</b>';
                                            } elseif ($hasilnyax1 >= 0.75) {
                                                echo '<b style="color:#97ad09">Sangat Kuat</b>';
                                                $rankspearmkes =  '<b style="color:#97ad09">Sangat Kuat</b>';
                                            } elseif ($hasilnyax1 >= 0.50) {
                                                echo '<b style="color:#708100">Kuat</b>';
                                                $rankspearmkes =  '<b style="color:#708100">Kuat</b>';
                                            } elseif ($hasilnyax1 >= 0.25) {
                                                echo '<b style="color:#ffa700">Cukup</b>';
                                                $rankspearmkes =  '<b style="color:#ffa700">Cukup</b>';
                                            } elseif ($hasilnyax1 < 0.25) {
                                                echo '<b style="color:red">Sangat Lemah</b>';
                                                $rankspearmkes =  '<b style="color:red">Sangat Lemah</b>';
                                            } elseif ($hasilnyax1 <= 0) {
                                                echo '<b style="color:red">Tidak Ada</b>';
                                                $rankspearmkes =  '<b style="color:red">Tidak Ada</b>';
                                            }

                                            $kesmpulan[] = array(
                                                'nama' => 'X1',
                                                'x' => $rankspearmkes
                                            );
                                            ?>
                    <br><br>
                    2.) Hubungan X2 dengan Y<br>
                    rs = 6(<?= $d2 ?>)/<?= count($isi) ?>(<?= count($isi) ?><sup>2</sup> - 1)<br>
                    rs = <?= 6 * $d2 ?>/<?= count($isi) ?>(<?= pow(count($isi), 2) - 1 ?>)<br>
                    <?php
                    $d1bil11 = 6 * $d2;
                    $d1bil12 = count($isi) * (pow(count($isi), 2) - 1);
                    ?>
                    rs = <?= $hasilnyax2 = 1 - ($d1bil11 / $d1bil12)  ?><br>
                    <img src="https://2.bp.blogspot.com/-jdTucUHYxz4/TaGFnBhqrHI/AAAAAAAAAds/XUIUhvLyF5k/s1600/tabel%2Barti%2Bkorelasi.PNG"><br>
                    Maka korelasinya adalah <?php if ($hasilnyax2 >= 1) {
                                                echo '<b style="color:green">Sempurna</b>';
                                                $rankspearmkes2 = '<b style="color:green">Sempurna</b>';
                                            } elseif ($hasilnyax2 >= 0.75) {
                                                echo '<b style="color:#97ad09">Sangat Kuat</b>';
                                                $rankspearmkes2 =  '<b style="color:#97ad09">Sangat Kuat</b>';
                                            } elseif ($hasilnyax2 >= 0.50) {
                                                echo '<b style="color:#708100">Kuat</b>';
                                                $rankspearmkes2 =  '<b style="color:#708100">Kuat</b>';
                                            } elseif ($hasilnyax2 >= 0.25) {
                                                echo '<b style="color:#ffa700">Cukup</b>';
                                                $rankspearmkes =  '<b style="color:#ffa700">Cukup</b>';
                                            } elseif ($hasilnyax2 < 0.25) {
                                                echo '<b style="color:red">Sangat Lemah</b>';
                                                $rankspearmkes2 =  '<b style="color:red">Sangat Lemah</b>';
                                            } elseif ($hasilnyax2 <= 0) {
                                                echo '<b style="color:red">Tidak Ada</b>';
                                                $rankspearmkes2 =  '<b style="color:red">Tidak Ada</b>';
                                            }

                                            $kesmpulan[] = array(
                                                'nama' => 'X2',
                                                'x' => $rankspearmkes2
                                            );
                                            ?>
                </div>

            </div>
        </div>


        <div class="formbg-inner padding-horizontal--48">
            <div class="row" style="position: relative; margin-top:-30px;">
                <div class="column" style="width:100%">
                    <h4>Kesimpulan</h4><br>
                    <table id="customers" style="max-width: 300px;">
                        <tr>
                            <th style="text-align: center;">Variabel</th>
                            <th style="text-align: center;">Status</th>
                        </tr>
                        <?php
                        foreach ($kesmpulan as  $kesmpulanv) {


                        ?>
                            <tr>
                                <td><b><?= $kesmpulanv['nama']  ?> -> Y</b></td>
                                <td><?= $kesmpulanv['x']  ?></td>
                            </tr>
                        <?php     } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br>