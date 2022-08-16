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
                        'sig' => $sig,
                        'skor' => $zhitung . ($zhitung > 1.96 ? ' > ' : ' < ') . '1.96'
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
                    'sig' => $sig2,
                    'skor' => $zhitung2 . ($zhitung > 1.96 ? ' > ' : ' < ') . '1.96'
                );
                ?>


            </div>
        </div>


        <div class="formbg-inner padding-horizontal--48">
            <div class="row" style="position: relative; margin-top:-30px;">
                <div class="column" style="width:100%">
                    <h4>Kesimpulan</h4><br>
                    <table id="customers" style="max-width:400px;">
                        <tr>
                            <th style="text-align: center;">Variabel</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">Sig</th>
                            <th style="text-align: center;">Nilai Sig</th>
                        </tr>
                        <?php
                        foreach ($kesmpulan as  $kesmpulanv) {


                        ?>
                            <tr>
                                <td><b><?= $kesmpulanv['nama']  ?> -> Y</b></td>
                                <td><?= $kesmpulanv['x']  ?></td>
                                <td><?= $kesmpulanv['sig'] ? '<b style="color:green">Signifikan</b>' :  '<b style="color:green">Signifikan</b>'  ?></td>
                                <td><?= $kesmpulanv['skor'] ?></td>
                            </tr>
                        <?php     } ?>
                    </table>
                </div>
            </div>
        </div>

        <!-- <input type="button" onclick="printDiv('rank')" value="Print" /> -->
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