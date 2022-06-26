<?php


$filesoal = file_get_contents("../json/soal.json");
$soal = json_decode($filesoal, TRUE);


$fileisi = file_get_contents("../json/isi.json");
$isi = json_decode($fileisi, TRUE);


$filertable = file_get_contents("../json/rtable.json");
$rtbl = json_decode($filertable, TRUE);
?>


<div class="formbg-outer">
    <div class="formbg">
        <div class="formbg-inner padding-horizontal--48">
            <center>
                <h2>Data Jawaban Kuisoner</h2>
            </center><br>

            <?php


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
                                                        $total += (int)$c['jawaban'][$d]['pertanyaan_' . $d + 1] ?>
                                                        <td><?= $c['jawaban'][$d]['pertanyaan_' . $d + 1] ?></td>
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
                <div style="float: right;">Total Jawaban : <?php echo count($isi) ?></div>
            <?php } else {
                echo '<h3>Tidak ditemukan</h3>';
            } ?>
        </div>
    </div>
</div>
<br><br><br>