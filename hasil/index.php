<?php
require_once '../vendor/autoload.php';

$filesoal = file_get_contents("../data/json/soal.json");
$soal = json_decode($filesoal, TRUE);


$fileisi = file_get_contents("../data/json/isi.json");
$isi = json_decode($fileisi, TRUE);


$filertable = file_get_contents("../data/json/rtable.json");
$rtbl = json_decode($filertable, TRUE);
?>
<html>

<head>
    <meta charset="utf-8">
    <title>Penelitian Fembi Nur Ilham Universitas Bengkulu</title>
    <link rel="icon" href="../icon.jpg" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <style>
        .loaderbg {
            position: fixed;
            width: 100%;
            z-index: 9999;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: linear-gradient(to top, #48c6ef 0%, #6f86d6 100%);
        }

        .loader {
            width: 21em;
            height: 10em;
            position: relative;
            overflow: hidden;
        }

        .loader::before,
        .loader::after {
            content: '';
            position: absolute;
            bottom: 0;
        }

        .loader::before {
            width: inherit;
            height: 0.2em;
            background-color: hsla(0, 0%, 85%);
        }

        .loader::after {
            box-sizing: border-box;
            width: 50%;
            height: inherit;
            border: 0.2em solid hsla(0, 0%, 85%);
            border-radius: 50%;
            left: 25%;
        }

        .loader span {
            position: absolute;
            width: 5%;
            height: 10%;
            background-color: white;
            border-radius: 50%;
            bottom: 0.2em;
            left: -5%;
            animation: 2s linear infinite;
            transform-origin: 50% -3em;
            animation-name: run, rotating;
        }

        .loader span:nth-child(2) {
            animation-delay: 0.075s;
        }

        .loader span:nth-child(3) {
            animation-delay: 0.15s;
        }

        @keyframes run {
            0% {
                left: -5%;
            }

            10%,
            60% {
                left: calc((100% - 5%) / 2);
            }

            70%,
            100% {
                left: 100%;
            }
        }

        @keyframes rotating {

            0%,
            10% {
                transform: rotate(0deg);
            }

            60%,
            100% {
                transform: rotate(-1turn);
            }
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script>
        window.onload = function() {
            //hide the preloader
            document.querySelector(".loaderbg").style.display = "none";
        }
    </script>
</head>

<body>
    <div class="loaderbg">
        <div class="loader">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="login-root">
        <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
            <div class="loginbackground box-background--white padding-top--64">
                <div class="loginbackground-gridContainer">
                    <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
                        <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
                        </div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
                        <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
                        <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
                        <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
                        <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
                        <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
                        <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
                        <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
                        <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
                    </div>
                </div>
            </div>
            <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
                <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
                    <center>
                        <h1><a href="http://fembinurilham.my.id/" rel="dofollow" style="color: #26263e;">PENGELOLAHAN KUISONER<br>by Fembi Nur Ilham</a></h1>
                    </center>
                </div>
                <div class="formbg-outer">
                    <div class="formbg">
                        <div class="judul" onclick="toggle_visibility('dataresponden')">Data Quisoner
                            <div style="float: right;" id="datarespondenhide">Hide</div>
                        </div>
                        <div id="dataresponden" style="display: none;" class="formbg-inner padding-horizontal--48  animate__animated animate__fadeInDown">
                            <center>
                                <h2>Data Jawaban Kuisoner</h2>
                            </center><br>

                            <?php

                            $hasiljawaban = [];

                            $jmlpertanyaan = 1;
                            $bagian = [];
                            $hitungstatus = [];
                            foreach ($soal as $key => $v) {
                                if (isset($v['id'])) {
                                    $jmlpertanyaan++;
                                }
                                if (isset($v['judul']['bagian'])) {
                                    if (isset($v['judul']['hitung'])) {
                                        $hitungstatus[] = $v['judul']['hitung'];
                                    }
                                    $bagian[] = array('id' => $v['judul']['bagian'], 'isi' => $v['judul']['isi'], 'hitung' => $v['judul']['hitung'] ?? false);
                                }
                            }

                            $x11 = 0;
                            $x12 = 0;
                            $x13 = 0;
                            $x14 = 0;
                            $x15 = 0;
                            if ($isi) {
                                $bagian1 = 1;
                                for ($a = 0; $a < count($bagian); $a++) {

                            ?>
                                    <br>
                                    <h3><b><?= $bagian[$a]['isi'] ?></b></h3>
                                    <div style=" overflow-y: auto;">
                                        <table id="customers">
                                            <tr>
                                                <th>Username</th>

                                                <?php
                                                for ($n = 0; $n < $jmlpertanyaan - 1; $n++) {
                                                    if (isset($isi[0]['jawaban'][$n]['bagian'])) {
                                                        if ($bagian[$a]['id'] == $isi[0]['jawaban'][$n]['bagian']) {
                                                ?>
                                                            <?php if ($n != 3) { ?>
                                                                <th><?= $bagian1++; ?></th>
                                                            <?php } else {
                                                                $bagian1++;
                                                            } ?>

                                                <?php }
                                                    }
                                                } ?>

                                                <?php foreach ($soal as $cekhitung) {
                                                    if (isset($cekhitung['judul']['hitung'])) {
                                                        if ($cekhitung['judul']['hitung'] == $bagian[$a]['hitung']) {
                                                            echo '<th>Total</th>';
                                                        }
                                                    }
                                                } ?>
                                            </tr>




                                            <?php
                                            foreach ($isi as $c) { ?>
                                                <?php $total = 0;
                                                if ($c['status']) { ?>
                                                    <tr>
                                                        <td><?= $c['jawaban'][3]['pertanyaan_4'] ?></td>

                                                        <?php for ($d = 0; $d < $jmlpertanyaan - 1; $d++) { ?>
                                                            <?php if (isset($c['jawaban'][$d]['bagian'])) { ?>
                                                                <?php if ($bagian[$a]['id'] == $c['jawaban'][$d]['bagian']) { ?>
                                                                    <?php if ($d != 3) {
                                                                        $ddd = $d + 1;
                                                                        $total += (int)$c['jawaban'][$d]['pertanyaan_' . $ddd];
                                                                        // $total += 'pertanyaan_' . $ddd;
                                                                    ?>
                                                                        <td><?= $c['jawaban'][$d]['pertanyaan_' . $ddd] ?></td>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        <?php } ?>


                                                        <?php foreach ($soal as $cekhitung) {
                                                            if (isset($cekhitung['judul']['hitung'])) {
                                                                if ($cekhitung['judul']['hitung'] == $bagian[$a]['hitung']) {
                                                                    echo '<td style="background-color: #00000059;">' . $total . '</td>';
                                                                }
                                                            }
                                                        } ?>

                                                    </tr>
                                                <?php } ?>
                                            <?php  } ?>
                                        </table>
                                    </div>
                                <?php } ?>
                            <?php } else {
                                echo '<h3>Tidak ditemukan</h3>';
                            } ?>
                        </div>

                        <div class="formbg-inner padding-horizontal--48">
                            <div class="row" style="position: relative; margin-top:-30px;">

                                <div style="float: right;font-weight:bolder;">Total Quisoner : <?= count($isi) ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br><br>





















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













                <?php

                //rank
                function rank_avg($value, $array, $order = 0)
                {
                    // sort
                    if ($order) sort($array);
                    else rsort($array);
                    // add item for counting from 1 but 0
                    array_unshift($array, $value + 1);
                    // select all indexes vith the value
                    $keys = array_keys($array, $value);
                    if (count($keys) == 0) return NULL;
                    // calculate the rank
                    return array_sum($keys) / count($keys);
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
                                    <table id="customers" border="1px">
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

                                        $array_x1 = [];
                                        $array_x2 = [];
                                        $array_y = [];
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
                                            $array_x1[] = $jumlahx1;


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
                                            $array_x2[] = $jumlahx2;


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
                                            $array_y[] = $jumlahy;
                                        } ?>

                                        <?php
                                        foreach ($isi as $noaa => $a) {
                                        ?>
                                            <tr>
                                                <?php

                                                foreach ($a['jawaban'] as $b) {
                                                    if (isset($b['pertanyaan_4'])) { ?>
                                                        <td><?= $b['pertanyaan_4'] ?></td>
                                                <?php }
                                                } ?>
                                                <?php

                                                $rnkx1 = rank_avg($array_x1[$noaa], $array_x1);
                                                $rnkx2 = rank_avg($array_x2[$noaa], $array_x2);
                                                $rnky = rank_avg($array_y[$noaa], $array_y);

                                                echo '<td>' . $array_x1[$noaa] . ' </td>';
                                                echo '<td>' . $array_x2[$noaa] . ' </td>';
                                                echo '<td>' . $array_y[$noaa] . ' </td>';
                                                echo '<td>' . $rnkx1 . ' </td>';
                                                echo '<td>' . $rnkx2 . ' </td>';
                                                echo '<td>' . $rnky . ' </td>';
                                                echo '<td>' .  $rnkx1 - $rnky . ' </td>';
                                                echo '<td>' . pow($rnkx1 - $rnky, 2) . ' </td>';
                                                echo '<td>' .  $rnkx2 - $rnky . ' </td>';
                                                echo '<td>' . pow($rnkx2 - $rnky, 2) . ' </td>';

                                                $d1 += pow($rnkx1 - $rnky, 2);
                                                $d2 += pow($rnkx2 - $rnky, 2);
                                                ?>

                                            </tr>

                                        <?php } ?>


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
                                    rs = <?= $hasilnyax1 = round(1 - ($d1bil1 / $d1bil2), 3)  ?><br>
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

                                                            ?>
                                    <br><br>
                                    <b>Uji Signifikan 5%</b><br>
                                    <b>Diketahui :</b><br>
                                    rs = <?= $hasilnyax1 ?><br>
                                    n = <?= count($isi) ?><br>
                                    <b>Rumus :</b><br>
                                    Untuk n > 30<br>
                                    <img src="http://4.bp.blogspot.com/_lKlbyrdPRCo/S9eKLwSbLOI/AAAAAAAAAbU/pRV9IdN0MSI/s320/z+spearman.gif"><br>
                                    Untuk n ≤ 30 <br>
                                    <img src="http://3.bp.blogspot.com/_lKlbyrdPRCo/S9eKLXk43jI/AAAAAAAAAbE/l2ApddSzyvA/s320/t+spearman.gif"><br>
                                    <b>Penyelesaian :</b><br>
                                    z = <?= $hasilnyax1 ?> √<?= count($isi) ?> - 1<br>
                                    z = <?= $hasilnyax1 ?> √<?= count($isi) - 1 ?><br>
                                    zhitung = <?= $zhitung = round($hasilnyax1 * sqrt(count($isi) - 1), 2) ?><br><br>

                                    ztabel = 5% = 0,05<br>
                                    2 arah (2 Tailed) = 0,025<br>
                                    Maka ztabel adalah 1,9 + 0,06 = 1,96 <a href="../data/tables.xls">Cek</a><br>

                                    Maka Kesimpulannya zhitung
                                    <?php if ($zhitung <= 1.96) {
                                        $sig = true;
                                        echo '= ' . $zhitung . ' < ztabel = 1.96  (<b style="color:red">Tidak Signifikan</b>)';
                                    } else {
                                        $sig = false;
                                        echo '= ' . $zhitung . ' > ztabel = 1.96 (<b style="color:green">Signifikan</b>)';
                                    }

                                    $kesmpulan[] = array(
                                        'nama' => 'X1',
                                        'x' => $rankspearmkes,
                                        'sig' => $sig
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
                                    rs = <?= $hasilnyax2 = round(1 - ($d1bil11 / $d1bil12), 3)  ?><br>
                                    <img src="https://2.bp.blogspot.com/-jdTucUHYxz4/TaGFnBhqrHI/AAAAAAAAAds/XUIUhvLyF5k/s1600/tabel%2Barti%2Bkorelasi.PNG"><br>
                                    Maka korelasinya adalah <?php if ($hasilnyax2 >= 1) {
                                                                echo '<b style="color:green">Sempurna</b>';
                                                                $rankspearmkes2 = '<b style="color:green">Sempurna</b>';
                                                            } elseif ($hasilnyax2 >= 0.75 && $hasilnyax2 < 1) {
                                                                echo '<b style="color:#97ad09">Sangat Kuat</b>';
                                                                $rankspearmkes2 =  '<b style="color:#97ad09">Sangat Kuat</b>';
                                                            } elseif ($hasilnyax2 >= 0.50 && $hasilnyax2 < 0.75) {
                                                                echo '<b style="color:#708100">Kuat</b>';
                                                                $rankspearmkes2 =  '<b style="color:#708100">Kuat</b>';
                                                            } elseif ($hasilnyax2 >= 0.25 && $hasilnyax2 < 0.50) {
                                                                echo '<b style="color:#ffa700">Cukup</b>';
                                                                $rankspearmkes2 =  '<b style="color:#ffa700">Cukup</b>';
                                                            } elseif ($hasilnyax2 < 0.25 && $hasilnyax2 < 0.25) {
                                                                echo '<b style="color:red">Sangat Lemah</b>';
                                                                $rankspearmkes2 =  '<b style="color:red">Sangat Lemah</b>';
                                                            } elseif ($hasilnyax2 <= 0) {
                                                                echo '<b style="color:red">Tidak Ada</b>';
                                                                $rankspearmkes2 =  '<b style="color:red">Tidak Ada</b>';
                                                            }
                                                            ?>
                                </div>

                                <br><br>
                                <b>Uji Signifikan 5%</b><br>
                                <b>Diketahui :</b><br>
                                rs = <?= $hasilnyax2 ?><br>
                                n = <?= count($isi) ?><br>
                                <b>Rumus :</b><br>
                                Untuk n > 30<br>
                                <img src="http://4.bp.blogspot.com/_lKlbyrdPRCo/S9eKLwSbLOI/AAAAAAAAAbU/pRV9IdN0MSI/s320/z+spearman.gif"><br>
                                Untuk n ≤ 30 <br>
                                <img src="http://3.bp.blogspot.com/_lKlbyrdPRCo/S9eKLXk43jI/AAAAAAAAAbE/l2ApddSzyvA/s320/t+spearman.gif"><br>
                                <b>Penyelesaian :</b><br>
                                z = <?= $hasilnyax2 ?> √<?= count($isi) ?> - 1<br>
                                z = <?= $hasilnyax2 ?> √<?= count($isi) - 1 ?><br>
                                zhitung = <?= $zhitung2 = round($hasilnyax2 * sqrt(count($isi) - 1), 2) ?><br><br>

                                ztabel = 5% = 0,05<br>
                                2 arah (2 Tailed) = 0,025<br>
                                Maka ztabel adalah 1,9 + 0,06 = 1,96 <a href="../data/tables.xls">Cek</a><br>

                                Maka Kesimpulannya zhitung
                                <?php if ($zhitung2 <= 1.96) {
                                    $sig2 = true;
                                    echo '= ' . $zhitung2 . ' < ztabel = 1.96  (<b style="color:red">Tidak Signifikan</b>)';
                                } else {
                                    $sig2 = false;
                                    echo '= ' . $zhitung2 . ' > ztabel = 1.96 (<b style="color:green">Signifikan</b>)';
                                }


                                $kesmpulan[] = array(
                                    'nama' => 'X2',
                                    'x' => $rankspearmkes2,
                                    'sig' => $sig2
                                );
                                ?>


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
                                            <th style="text-align: center;">Sig</th>
                                        </tr>
                                        <?php
                                        foreach ($kesmpulan as  $kesmpulanv) {


                                        ?>
                                            <tr>
                                                <td><b><?= $kesmpulanv['nama']  ?> -> Y</b></td>
                                                <td><?= $kesmpulanv['x']  ?></td>
                                                <td><?= $kesmpulanv['sig'] ? '<b style="color:green">Signifikan</b>' :  '<b style="color:green">Signifikan</b>'  ?></td>
                                            </tr>
                                        <?php     } ?>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <input type="button" onclick="printDiv('rank')" value="Print" />
                    </div>
                </div>
                <script>
                    function printDiv(divName) {
                        var printContents = document.getElementById(divName).innerHTML;
                        var originalContents = document.body.innerHTML;

                        document.body.innerHTML = printContents;

                        window.print();

                        document.body.innerHTML = originalContents;
                    }
                </script>
                <br><br><br>















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























            </div>
        </div>
    </div>

    <style>
        sup {
            color: black;
        }

        td {
            text-align: center;
        }

        /* Create three equal columns that float next to each other */
        .column {
            display: table;
            float: left;
            width: 31.7%;
            min-width: 400px;
            margin: 10px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive layout - makes the three columns stack on top of each other instead of next to each other on smaller screens (600px wide or less) */
        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
            }
        }


        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        .judul {
            width: 100%;
            width: 100%;
            padding: 20px;
            font-weight: bolder;
            border-bottom: solid #00800082;
            cursor: pointer;
            transition: 0.5s;
        }

        .judul:hover {
            border-radius: 0px 0px 10px 10px;
            background-color: #04AA6D;
        }
    </style>

    <script type="text/javascript">
        function toggle_visibility(id) {
            var e = document.getElementById(id);
            if (e.style.display == 'block') {
                e.style.display = 'none';
                document.getElementById(id + 'hide').innerHTML = 'Hide';
            } else {
                e.style.display = 'block';
                document.getElementById(id + 'hide').innerHTML = 'Show';
            }
        }
    </script>
</body>

</html>