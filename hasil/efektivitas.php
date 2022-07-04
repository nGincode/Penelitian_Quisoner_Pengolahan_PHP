<?php


$filesoal = file_get_contents("../data/json/soal.json");
$soal = json_decode($filesoal, TRUE);


$fileisi = file_get_contents("../data/json/isi.json");
$isi = json_decode($fileisi, TRUE);


$filertable = file_get_contents("../data/json/rtable.json");
$rtbl = json_decode($filertable, TRUE);

?>



<div class="formbg-outer">
    <div class="formbg">
        <div class="judul" onclick="toggle_visibility('efektif')">Uji Efektivitas

            <div style="float: right;" id="efektifhide">Hide</div>

        </div>
        <div id="efektif" style="display: none;" class="formbg-inner padding-horizontal--48  animate__animated animate__fadeInDown">


            <center>
                <h2>Analisis Efektivitas Metode AIDA</h2><br>
            </center><br>

            <center>
                Pertanyaan Dianalisis: <?php foreach ($datavalid as $datavalidv) {
                                            echo ' Pertanyaan ' . $datavalidv;
                                        } ?>
            </center>
            <br>
            <div class="row">

                <div class="column" style="width: 100%;">
                    <?php
                    $kesimpulanefektif = [];
                    foreach ($soal as $v1) {
                        if (isset($v1['judul']['hubungan'])) {
                            if ($v1['judul']['hubungan'] == 'y') {

                    ?>
                                <b><?= $v1['judul']['isi']  ?></b>
                                <table id="customers">
                                    <tr>
                                        <th style="text-align: center;">Pertanyaan</th>
                                        <th style="text-align: center;">Total Skor</th>
                                    </tr>
                                    <?php
                                    $jmlskor = 0;
                                    $totalpernyataan = 0;
                                    foreach ($soal as $v) {
                                        if (isset($v['hubungan'])) {
                                            if ($v['hubungan'] == 'y') {
                                                if ($v['bagian'] == $v1['judul']['bagian']) {
                                    ?>
                                                    <tr>
                                                        <?php if (in_array($v['id'], $datavalid)) { ?>
                                                            <td><?= 'Pertanyaan ' . $v['id'] ?></td>
                                                        <?php } ?>
                                                        <?php
                                                        $totalskor = 0;
                                                        foreach ($isi as $v2) {
                                                            foreach ($v2['jawaban'] as $v3) {
                                                                if (isset($v3['pertanyaan_' . $v['id']]) && in_array($v['id'], $datavalid)) {
                                                                    $totalskor += $v3['pertanyaan_' . $v['id']];
                                                                }
                                                            }
                                                        }

                                                        $totalpernyataan += 1;
                                                        $jmlskor += $totalskor;
                                                        ?>
                                                        <?php if ($totalskor) { ?>
                                                            <td><?= $totalskor ?></td>
                                                        <?php } ?>
                                                    </tr>
                                    <?php }
                                            }
                                        }
                                    } ?>
                                    <tr>
                                        <th style="text-align: center;">Total</th>
                                        <th style="text-align: center;"><?= $jmlskor ?></th>
                                    </tr>
                                </table>
                                <br>
                                <b>Diketahui :</b><br>
                                Total Nilai = <?= $jmlskor ?><br>
                                Total Pernyataan = <?= $totalpernyataan ?><br>
                                Xn = <?= 5 * $totalpernyataan * count($isi) ?> (Nilai Jawaban Quisoner Tertinggi x Total Pernyataan x Jumlah Responden)<br><br>

                                <b>Rumus :</b>

                                <table>
                                    <tr>
                                        <td rowspan="2">X = </td>
                                        <td>Tota Nilai</td>
                                        <td rowspan="2">x 100%</td>
                                    </tr>
                                    <tr>
                                        <td style="border-top: solid 1px black;">Total Nilai Harapan Xn</td>
                                    </tr>
                                </table>
                                <br>
                                <b>Penyelesaian :</b><br>
                                <table>
                                    <tr>
                                        <td rowspan="2">X = </td>
                                        <td><?= $jmlskor ?></td>
                                        <td rowspan="2">x 100%</td>
                                    </tr>
                                    <tr>
                                        <td style="border-top: solid 1px black;"> <?= 5 * $totalpernyataan * count($isi) ?></td>
                                    </tr>
                                </table>
                                X = <?= round(($jmlskor / (5 * $totalpernyataan * count($isi))) * 100, 2)  ?>%<br>

                                <div class="column" style="width: 100%;">
                                    <table id="customers" style="max-width: 300px;">
                                        <tr>
                                            <td><b>Kriteria</b></td>
                                            <td><b>Kategori</b></td>
                                        </tr>
                                        <tr>
                                            <td> ≥ 80%</td>
                                            <td>Sangat Efektif</td>
                                        </tr>
                                        <tr>
                                            <td>60% - 79.9%</td>
                                            <td>Efektif</td>
                                        </tr>
                                        <tr>
                                            <td>40% - 59.9%</td>
                                            <td>Cukup Efektif</td>
                                        </tr>
                                        <tr>
                                            <td>20% - 39.9%</td>
                                            <td>Tidak Efektif</td>
                                        </tr>
                                        <tr>
                                            <td>≤ 10.9%</td>
                                            <td>Sangat Tidak Efektif</td>
                                        </tr>
                                    </table>
                                </div>
                                <br><br>
                                Maka Hasilnya Adalah <?php if (round(($jmlskor / (5 * $totalpernyataan * count($isi))) * 100, 2) >= 80) {
                                                            echo '<b style="color:green">Sangat Efektif</b>';
                                                            $efektifitas = '<b style="color:green">Sangat Efektif</b>';
                                                        } elseif (round(($jmlskor / (5 * $totalpernyataan * count($isi))) * 100, 2) >= 60) {
                                                            echo '<b style="color:#97ad09">Efektif</b>';
                                                            $efektifitas =  '<b style="color:#97ad09">Efektif</b>';
                                                        } elseif (round(($jmlskor / (5 * $totalpernyataan * count($isi))) * 100, 2) >= 40) {
                                                            echo '<b style="color:#708100">Cukup Efektif</b>';
                                                            $efektifitas =  '<b style="color:#708100">Cukup Efektif</b>';
                                                        } elseif (round(($jmlskor / (5 * $totalpernyataan * count($isi))) * 100, 2) >= 20) {
                                                            echo '<b style="color:#ffa700">Tidak Efektif</b>';
                                                            $efektifitas =  '<b style="color:#ffa700">Tidak Efektif</b>';
                                                        } elseif (round(($jmlskor / (5 * $totalpernyataan * count($isi))) * 100, 2) < 20) {
                                                            echo '<b style="color:red">Sangat Tidak Efektif</b>';
                                                            $efektifitas =  '<b style="color:red">Sangat Tidak Efektif</b>';
                                                        }
                                                        ?>
                                <br><br><br>
                    <?php
                                $kesimpulanefektif[] = array(
                                    'nama' => $v1['judul']['isi'],
                                    'ket' => $efektifitas
                                );
                            }
                        }
                    } ?>
                </div>


            </div>
        </div>

        <div class="formbg-inner padding-horizontal--48">
            <div class="row" style="position: relative; margin-top:-30px;">
                <div class="column" style="display: block;" style="width:100%">
                    <h4>Kesimpulan</h4><br>
                    <table id="customers" style="max-width: 300px;">
                        <tr>
                            <th style="text-align: center;">Variabel</th>
                            <th style="text-align: center;">Status</th>
                        </tr>
                        <?php
                        foreach ($kesimpulanefektif as  $kesimpulanefektifv) {
                        ?>
                            <tr>
                                <td><b><?= $kesimpulanefektifv['nama']  ?></b></td>
                                <td><?= $kesimpulanefektifv['ket']  ?></td>
                            </tr>
                        <?php     } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br>