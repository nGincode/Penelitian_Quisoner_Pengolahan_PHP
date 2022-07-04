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
        <div class="judul" onclick="toggle_visibility('Validitas')">Uji Validitas & Reabilitas

            <div style="float: right;" id="Validitashide">Hide</div>

        </div>
        <div id="Validitas" style="display: none ;" class="formbg-inner padding-horizontal--48  animate__animated animate__fadeInDown">
            <center>
                <h2>Uji Validitas & Reabilitas<br>
                    Nilai Taraf Nyata 5%</h2><br>
            </center><br>


            <div class="row">

                <h3>> Uji Validitas</h3><br>
                <?php
                $noprtanyaan = 10;
                if (count($isi) > 3) {
                    $allujivaliditas = [];
                    foreach ($soal as $z) {
                        if (isset($z['judul']['hitung'])) {

                            foreach ($soal as $y) {
                                if (isset($y['hitung'])) {
                                    if ($z['judul']['hitung'] == $y['hitung']) {
                ?>

                                        <div class="column">
                                            <b><?= $z['judul']['isi'] ?></b> (Pertanyaan <?= $noprtanyaan++ ?>)
                                            <table id="customers">
                                                <tr>
                                                    <th>Username</th>
                                                    <th>X</th>
                                                    <th>Y</th>
                                                    <th>XY</th>
                                                    <th>X<sup>2</sup></th>
                                                    <th>Y<sup>2</sup></th>
                                                </tr>

                                                <?php

                                                $x_jwbprt = 0;
                                                $y_scorejwb = 0;
                                                $xy_scorejwb_jwbprt = 0;
                                                $xpangkat2 = 0;
                                                $ypangkat2 = 0;
                                                foreach ($isi as $x) {
                                                    $usernm = $x['jawaban'][3]['pertanyaan_4'];

                                                    $scorejwb = 0;
                                                    foreach ($x['jawaban'] as $no_w => $w) {
                                                        if ($z['judul']['bagian'] == $w['bagian']) {
                                                            $no_wwww = $no_w + 1;
                                                            $scorejwb += $w['pertanyaan_' . $no_wwww];
                                                            if (isset($w['pertanyaan_' . $y['id']])) {
                                                                $prtnyvalid = $y['id'];
                                                                $jwbprt = $w['pertanyaan_' . $y['id']];
                                                            }
                                                        }
                                                    }
                                                    if (isset($jwbprt)) {
                                                        $x_jwbprt += $jwbprt;
                                                        $y_scorejwb += $scorejwb;
                                                        $xy_scorejwb_jwbprt += $scorejwb * $jwbprt;
                                                        $xpangkat2 += pow($jwbprt, 2);
                                                        $ypangkat2 += pow($scorejwb, 2);
                                                ?>
                                                        <tr>
                                                            <td><?= $usernm ?></td>
                                                            <td><?= $jwbprt  ?></td>
                                                            <td><?= $scorejwb ?></td>
                                                            <td><?= $scorejwb * $jwbprt  ?></td>
                                                            <td><?= pow($jwbprt, 2)  ?></td>
                                                            <td><?= pow($scorejwb, 2)  ?></td>
                                                        </tr>
                                                <?php
                                                    }
                                                } ?>
                                                <tr>
                                                    <td>Total</td>
                                                    <td><?= $x_jwbprt  ?></td>
                                                    <td><?= $y_scorejwb ?></td>
                                                    <td><?= $xy_scorejwb_jwbprt  ?></td>
                                                    <td><?= $xpangkat2  ?></td>
                                                    <td><?= $ypangkat2  ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Total<sup>2</sup></td>
                                                    <td><?= pow($x_jwbprt, 2)  ?></td>
                                                    <td><?= pow($y_scorejwb, 2) ?></td>
                                                    <td><?= pow($xy_scorejwb_jwbprt, 2)  ?></td>
                                                    <td><?= pow($xpangkat2, 2)  ?></td>
                                                    <td><?= pow($ypangkat2, 2)  ?></td>
                                                </tr>
                                            </table>
                                            <div>
                                                <br>
                                                <div style="float: right;">
                                                    <b>Rumus :</b><br>
                                                    <img width="300px" src="https://www.gurupendidikan.co.id/wp-content/uploads/2019/10/Rumus-product-moment.jpg">
                                                </div>
                                                <b>Diketahui :</b><br>
                                                N = <?= count($isi) ?><br>
                                                X = <?= $x_jwbprt ?><br>
                                                Y = <?= $y_scorejwb ?><br>
                                                XY = <?= $xy_scorejwb_jwbprt ?><br>
                                                X<sup>2</sup> = <?= $xpangkat2 ?><br>
                                                Y<sup>2</sup> = <?= $ypangkat2 ?><br><br>

                                                <b>Penyelesaian :</b><br>
                                                <table>
                                                    <tr>
                                                        <td rowspan="4">rxy =</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td> (<?= count($isi) ?>)(<?= $xy_scorejwb_jwbprt ?>)</td>
                                                        <td> - </td>
                                                        <td> (<?= $x_jwbprt ?>)(<?= $y_scorejwb ?>)</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td colspan="3">
                                                            <hr>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            &radic;[(<?= count($isi) ?>)(<?= $xpangkat2 ?>) (<?= $x_jwbprt ?>)<sup>2</sup>]
                                                        </td>
                                                        <td> - </td>
                                                        <td> [(<?= count($isi) ?>)(<?= $ypangkat2 ?>) - <?= $y_scorejwb ?><sup>2</sup>]</td>
                                                    </tr>


                                                    <tr>
                                                        <td rowspan="4">rxy =</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td> <?= $hasil1 = (count($isi) * $xy_scorejwb_jwbprt - $x_jwbprt * $y_scorejwb) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <hr>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <?= $hasil2 = (sqrt(count($isi)  * $xpangkat2 - pow($x_jwbprt, 2)) * sqrt(count($isi) * $ypangkat2 - pow($y_scorejwb, 2))); ?> </td>
                                                    </tr>
                                                </table>
                                                <br>
                                                r Hitung (rxy) = <?php if ($hasil1 && $hasil2) {
                                                                        echo $rhitung = $hasil1 / $hasil2;
                                                                    } else {
                                                                        echo $rhitung = 0;
                                                                    }  ?><br>
                                                <?php
                                                $rtabel;
                                                foreach ($rtbl as $rtblv) {
                                                    if ($rtblv['n'] == count($isi) - 2) {
                                                        $rtabel = $rtblv['rtable'];
                                                    }
                                                }
                                                ?>
                                                r Table : <?= $rtabel ?><br>
                                                Maka rHitung
                                                <?php if ($rhitung > $rtabel) {
                                                    $keet = 'VALID';
                                                    echo '> rTable = <b style="color: green;">VALID</b>';
                                                } else {
                                                    $keet = 'Tidak VALID';
                                                    echo '< rTable =  <b style="color: red;">Tidak VALID</b>';
                                                }
                                                $ujivaliditas['pertanyaan'] = $prtnyvalid;
                                                $ujivaliditas['ket'] = $keet;
                                                ?>
                                                <!-- rxy=<?= (15 * 1054 - 43 * 334) / (sqrt(15 * 145 - pow(43, 2)) * sqrt(15 * 8230 - pow(334, 2))) ?> -->

                                            </div>
                                        </div>


                    <?php
                                        $allujivaliditas[] = $ujivaliditas;
                                    }
                                }
                            }
                            echo '<div class="column" style="width:100%"></div>';
                        }
                    }
                    ?>

                <?php  } else {
                    echo '<h3>Responden Terlalu Sedikit</h3>';
                }  ?>


                <div class="column" style="width:100%">
                    <br><br><br>
                    <h3>> Uji Reabilitas</h3><br>
                    <b>Rumus Varian:</b> <br>
                    <img src="http://4.bp.blogspot.com/-CkwHXN_gzmc/UqL3cfUxUBI/AAAAAAAAAno/DeEmyDjfCWg/s1600/varians.png" width="300"><br>
                    Maka Rumus Varian yang digunakan adalah yg ke <b>2</b><br><br>
                    <b>Pertanyaan yang akan di uji yaitu : </b> <?php
                                                                $variabelvalid = [];
                                                                $datavalid = [];
                                                                if (isset($allujivaliditas)) {
                                                                    foreach ($allujivaliditas as  $allujivaliditasv2) {
                                                                        if ($allujivaliditasv2['ket'] == "VALID") {

                                                                            foreach ($soal as $rels) {
                                                                                if (isset($rels['id'])) {
                                                                                    if ($rels['id'] == $allujivaliditasv2['pertanyaan']) {
                                                                                        $variabelvalid1['bagian'] = $rels['bagian'];
                                                                                        $variabelvalid1['hubungan'] = $rels['hubungan'];
                                                                                    }
                                                                                }
                                                                            }
                                                                            $variabelvalid1['id'] = $allujivaliditasv2['pertanyaan'];
                                                                            foreach ($soal as $rels) {
                                                                                if (isset($variabelvalid1['bagian'])) {
                                                                                    if (isset($rels['judul']['isi'])) {
                                                                                        if ($rels['judul']['bagian'] == $variabelvalid1['bagian']) {
                                                                                            $variabelvalid1['bagian_nama'] = $rels['judul']['isi'];
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                            $variabelvalid2 = [];
                                                                            foreach ($isi as $relisi) {
                                                                                foreach ($relisi['jawaban'] as $relisj) {
                                                                                    if (isset($relisj['pertanyaan_' . $allujivaliditasv2['pertanyaan']])) {
                                                                                        $variabelvalid2[] = $relisj['pertanyaan_' . $allujivaliditasv2['pertanyaan']];
                                                                                    }
                                                                                }
                                                                            }
                                                                            $variabelvalid1['nilai'] = $variabelvalid2;

                                                                            $variabelvalid[] = $variabelvalid1;

                                                                            echo ' Pertanyaan ' . $allujivaliditasv2['pertanyaan'];
                                                                            $datavalid[] = $allujivaliditasv2['pertanyaan'];
                                                                        }
                                                                    }
                                                                } ?> <br><br>
                    <?php
                    $jmlulangrel = [];
                    foreach ($variabelvalid as $jmlulangrel1) {
                        $jmlulangrel[] = $jmlulangrel1['bagian'];
                    }

                    $kesimpulanreabilitas = [];
                    // foreach (array_unique($jmlulangrel) as $relulang) {

                    $variabelnya = ['x1', 'x2', 'y'];
                    foreach ($variabelnya as $variabelnyav) {

                        $pertnyanjdl = [];

                        foreach ($variabelvalid as  $allujivaliditasv2) {
                            if ($variabelnyav == $allujivaliditasv2['hubungan']) {
                                $pertnyanjdl[] = ['hubungan' => $allujivaliditasv2['hubungan'], 'nama' => $allujivaliditasv2['bagian_nama'], 'bagian' => $allujivaliditasv2['bagian'], 'id' => $allujivaliditasv2['id']];
                            }
                        }

                    ?>
                        <div class="column">
                            <b>Pertanyaan <?= strtoupper($variabelnyav) ?></b>
                            <table id="customers">
                                <tr>
                                    <th style="text-align: center;">NO</th>
                                    <?php

                                    $sak = [];
                                    for ($o = 0; $o < count($pertnyanjdl); $o++) {
                                        foreach ($variabelvalid as  $allujivaliditasv3) {
                                            $nilai = [];
                                            foreach ($allujivaliditasv3['nilai'] as $nilaiv) {
                                                //perbagian
                                                // if ($allujivaliditasv3['bagian'] == $pertnyanjdl[$o]['bagian'] && $allujivaliditasv3['id'] == $pertnyanjdl[$o]['id']) {
                                                if ($allujivaliditasv3['id'] == $pertnyanjdl[$o]['id']) {
                                                    $nilai[] = [
                                                        $allujivaliditasv3['id'] => $nilaiv
                                                    ];
                                                }
                                            }
                                            if ($nilai) {
                                                $sak[] = $nilai;
                                            }
                                        }
                                    ?>
                                        <th style="text-align: center;"><?= $pertnyanjdl[$o]['id'] ?></th>
                                    <?php }
                                    ?>
                                    <th style="text-align: center;">Total</th>
                                </tr>
                                <?php
                                $nohal = 1;
                                $butirtotalres = [];
                                for ($o1 = 0; $o1 < count($pertnyanjdl); $o1++) {
                                    //hanya perualngan nilai 
                                    foreach ($sak[0] as $noper => $vk) {
                                        if (isset($vk[$pertnyanjdl[$o1]['id']])) {
                                            $totalreab = 0;
                                            $totalreab += $vk[$pertnyanjdl[$o1]['id']];

                                ?>
                                            <tr>
                                                <td><?= $nohal++ ?></td>
                                                <td><?= $vk[$pertnyanjdl[$o1]['id']]; ?></td>
                                                <?php for ($o2 = 1; $o2 < count($sak); $o2++) {
                                                    if (isset($sak[$o2][$noper][$pertnyanjdl[$o2]['id']])) {
                                                        $totalreab += $sak[$o2][$noper][$pertnyanjdl[$o2]['id']]
                                                ?>
                                                        <td><?= $sak[$o2][$noper][$pertnyanjdl[$o2]['id']] ?></td>
                                                <?php }
                                                } ?>
                                                <td><?= $totalreab; ?></td>
                                            </tr>
                                <?php
                                            $butirtotalres[] = $totalreab;
                                        }
                                    }
                                } ?>
                                <tr>
                                    <th style="text-align: right;">Var</th>
                                    <?php
                                    $butirvar = 0;
                                    $totalbutirvar = 0;
                                    for ($nofoot = 0; $nofoot < count($pertnyanjdl); $nofoot++) {


                                        $ttll = 0;
                                        foreach ($sak as $vk1) {

                                            foreach ($vk1 as $vk2) {
                                                if (isset($vk2[$pertnyanjdl[$nofoot]['id']])) {
                                                    $ttll += $vk2[$pertnyanjdl[$nofoot]['id']];
                                                }
                                            }
                                        }
                                        $ratares = $ttll / count($sak[0]);

                                        $ttll1 = 0;
                                        foreach ($sak as $vk3) {
                                            foreach ($vk3 as $vk4) {
                                                if (isset($vk4[$pertnyanjdl[$nofoot]['id']])) {
                                                    $ttll1 += pow($vk4[$pertnyanjdl[$nofoot]['id']] - $ratares, 2);
                                                }
                                            }
                                        }
                                        $butirvar += round($ttll1 / (count($sak[0]) - 1), 2);


                                    ?>
                                        <th style="text-align: right;"><?= round($ttll1 / (count($sak[0]) - 1), 2) ?></th>
                                    <?php }


                                    $ttlbutirtotalresvrr = 0;
                                    foreach ($butirtotalres as $butirtotalresvrr) {
                                        $ttlbutirtotalresvrr += $butirtotalresvrr;
                                    }
                                    if ($ttlbutirtotalresvrr) {
                                        $ratares2 = $ttlbutirtotalresvrr / count($sak[0]);
                                    } else {
                                        $ratares2 = 0;
                                    }

                                    $ttll2 = 0;
                                    foreach ($butirtotalres as  $butirtotalresv) {
                                        $ttll2 += pow($butirtotalresv - $ratares2, 2);
                                    }

                                    if ($ttll2) {
                                        $totalbutirvar += round($ttll2 / (count($sak[0]) - 1), 2);
                                    } else {
                                        $totalbutirvar += 0;
                                    }
                                    ?>
                                    <th style="text-align: right;"><?php
                                                                    if ($ttll2) {
                                                                        echo round($ttll2 / (count($sak[0]) - 1), 2);
                                                                    } else {
                                                                        echo 0;
                                                                    } ?> </th>
                                </tr>
                                <tr>
                                    <th colspan="<?= count($sak) ?>">∑ Var Butir</th>
                                    <th style="text-align: right;"><?= $butirvar ?> </th>
                                    <th style="text-align: right;"></th>
                                </tr>
                            </table><br>
                            <b>Diketahui :</b><br>
                            N = <?= count($sak) ?><br>
                            ∑ Varian Butir = <?= $butirvar ?><br>
                            Total Varian = <?= $totalbutirvar ?><br>
                            <br>
                            <b>Rumus Cronbanch Alpha : </b><br>
                            <img src="https://4.bp.blogspot.com/-mijVu4YCgjA/WhI7dE9yP4I/AAAAAAAAGVs/t5A5ehi9j5YFA7FMjWvAOWiI1j4i6dm6ACEwYBhgL/s1600/Cronbanch%2BAlpha.png"><br>

                            <b>Maka :</b><br>
                            ri = (<?= count($sak) ?> / <?= count($sak) - 1 ?>) * (1 - (<?= $butirvar ?> / <?= $totalbutirvar ?>) )<br>
                            ri = <?php
                                    if (count($sak) && (count($sak) - 1)) {
                                        $jmlsk = (count($sak) / (count($sak) - 1));
                                        echo $hasilreabilitas = round(abs($jmlsk * (1 - ($butirvar / $totalbutirvar))), 2);
                                    } else {
                                        echo  $hasilreabilitas = 0.0;
                                    } ?><br><br>
                            <b>Penyelesaian :</b><br>
                            <img width="350" src="https://karyaguru.files.wordpress.com/2014/01/tabel-kriteria-reliabilitas.jpg">
                            <br>Maka hasilnya adalah
                            <?php if ($hasilreabilitas > 0.9) {
                                echo '<b style="color:green">Reabilitas Sangat Tinggi</b>';
                                $ketreabilitas = '<b style="color:green">Reabilitas Sangat Tinggi</b>';
                            } elseif ($hasilreabilitas >= 0.7) {
                                echo '<b style="color:#97ad09">Reabilitas Tinggi</b>';
                                $ketreabilitas =  '<b style="color:#97ad09">Reabilitas Tinggi</b>';
                            } elseif ($hasilreabilitas >= 0.4) {
                                echo '<b style="color:#708100">Reabilitas Sedang</b>';
                                $ketreabilitas =  '<b style="color:#708100">Reabilitas Sedang</b>';
                            } elseif ($hasilreabilitas >= 0.2) {
                                echo '<b style="color:#ffa700">Reabilitas Rendah</b>';
                                $ketreabilitas =  '<b style="color:#ffa700">Reabilitas Rendah</b>';
                            } elseif ($hasilreabilitas <= 0.2) {
                                echo '<b style="color:red">Reabilitas Sangat Rendah</b>';
                                $ketreabilitas =  '<b style="color:red">Reabilitas Sangat Rendah</b>';
                            } ?>

                        </div>
                    <?php
                        $kesimpulanreabilitas[] = array(
                            'no' => $variabelnyav,
                            'ket' => $ketreabilitas
                        );
                    } ?>
                </div>




            </div>

        </div>


        <div class="formbg-inner padding-horizontal--48">
            <div class="row" style="position: relative; margin-top:-30px;">



                <div class="column" style="width:100%">
                    <h4>Kesimpulan Validitas</h4><br>
                    <table id="customers" style="max-width: 300px;">
                        <tr>
                            <th style="text-align: center;">Pertanyaan</th>
                            <th style="text-align: center;">Status</th>
                        </tr>
                        <?php
                        $jmldatavalid = 0;
                        $jmldatatdkvalid = 0;

                        if (isset($allujivaliditas)) {
                            foreach ($allujivaliditas as  $allujivaliditasv) {
                                if (isset($allujivaliditasv['pertanyaan'])) { ?>
                                    <tr>
                                        <td><b><?= $allujivaliditasv['pertanyaan']  ?></b></td>
                                        <td><?php if ($allujivaliditasv['ket'] == 'VALID') {
                                                echo '<b style="color:green">VALID</b>';

                                                $jmldatavalid++;
                                            } else {
                                                echo '<b style="color:red">Tidak VALID</b>';
                                                $jmldatatdkvalid++;
                                            }  ?></td>
                                    </tr>
                        <?php }
                            }
                        } ?>
                    </table>
                    <p>Jumlah Data Valid : <?= $jmldatavalid ?></p>
                    <p>Jumlah Data Tidak Valid : <?= $jmldatatdkvalid ?></p>
                </div>

                <div class="column" style="width:100%">
                    <h4>Kesimpulan Reabilitas</h4><br>
                    <table id="customers" style="max-width: 300px;">
                        <tr>
                            <th style="text-align: center;">Variabel</th>
                            <th style="text-align: center;">Status</th>
                        </tr>
                        <?php

                        foreach ($kesimpulanreabilitas as  $kesimpulanreabilitasv) {



                        ?>
                            <tr>
                                <td><b><?= $kesimpulanreabilitasv['no']  ?></b></td>
                                <td><?= $kesimpulanreabilitasv['ket']  ?></td>
                            </tr>
                        <?php
                        } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br>