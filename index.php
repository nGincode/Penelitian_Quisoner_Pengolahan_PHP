<html>

<head>
    <meta charset="utf-8">
    <title>Penelitian Fembi Nur Ilham Universitas Bengkulu</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="icon.jpg" sizes="16x16">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
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
                        <h1><a href="http://fembinurilham.my.id/" rel="dofollow" style="color: #26263e;">KUISONER PENELITIAN<br>Fembi Nur Ilham</a></h1>
                    </center>
                </div>
                <div class="formbg-outer">
                    <div class="formbg">
                        <div class="formbg-inner padding-horizontal--48">
                            <span class="padding-bottom--15">
                                <h3><b>Selamat Datang</b></h3>
                            </span>
                            Yth. Bapak/Ibu/Sdr/i Responden<br>
                            Ditempat<br>
                            <br>
                            Assalamualaikum Warahmatullahi Wabarakatuh<br><br>
                            <p style="text-align:justify">
                                Dengan segala kerendahan hati, perkenalkan saya Fembi Nur Ilham mahasiswa Program Studi Agribisnis Fakultas Pertanian Universitas Bengkulu.<br><br>

                                Saat ini saya sedang menyelesaikan tugas akhir penulisan skripsi dengan judul :<br>
                                <b>"Efektivitas Cyber Extension Pada Media Sosial Instagram Pada @hidroponikuntuksemua"</b><br>
                                Tugas akhir ini dalam rangka menyelesaikan studi pada program sarjana pertanian Universitas Bengkulu.<br><br>

                                Pada kesempatan ini saya memohon kesediaan Bapak/Ibu/Sdr/i meluangkan waktu dan pikiran untuk memberikan jawaban dari beberapa pernyataan pada kuesioner penelitian ini. Kueisoner ini digunakan untuk kepentingan penelitian skripsi, kerahasiaan identitas Bapak/Ibu/Sdr/i akan tetap terjaga. Bantuan dari Bapak/Ibu/Sdr/i merupakan hal yang sangat berharga bagi saya, oleh karena itu atas kesediaan dan partisipasi yang baik dalam mengisi daftar kuesioner ini, saya ucapkan terima kasih.
                            </p>

                            Wassalamualaikum Warahmatullahi Wabarakatuh
                            <br><br>
                            <form id="stripe-login" method="POST" action="">


                                <?php
                                $filesoal = file_get_contents("json/soal.json");
                                $soal = json_decode($filesoal, TRUE);

                                foreach ($soal as $key => $value) {
                                ?>

                                    <?php if (isset($value['judul'])) {
                                    ?>
                                        <div class="field padding-bottom--24">
                                            <center>
                                                <hr>
                                                <br>
                                                <h3>
                                                    <b>
                                                        <?= $value['judul']['bagian'] ?>. <?= $value['judul']['isi'] ?>
                                                    </b>
                                                </h3>
                                                <h6><?= $value['judul']['subjudul'] ?></h6>
                                                <br>
                                                <hr>
                                            </center>
                                        </div>
                                    <?php } ?>

                                    <?php if (isset($value['pertanyaan'])) {
                                    ?>

                                        <?php if (isset($value['radio'])) { ?>
                                            <div class="field padding-bottom--24">
                                                <label><?= $value['id'] . '.) ' . $value['pertanyaan'] ?></label>
                                                <div class="wrapper">

                                                    <?php if ($value['radio'] == 5) { ?>
                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_1" name="pertanyaan_<?= $value['id'] ?>" value="5" class="ioption-1">
                                                        <label for="option_input_<?= $value['id'] ?>_1" class="option option-1">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">Sangat Setuju</span>
                                                        </label>

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_2" name="pertanyaan_<?= $value['id'] ?>" value="4" class="ioption-2">
                                                        <label for="option_input_<?= $value['id'] ?>_2" class="option option-2">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">Setuju</span>
                                                        </label>

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_3" name="pertanyaan_<?= $value['id'] ?>" value="3" class="ioption-3" required checked>
                                                        <label for="option_input_<?= $value['id'] ?>_3" class="option option-3">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">Ragu Ragu</span>
                                                        </label>

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_4" name="pertanyaan_<?= $value['id'] ?>" value="2" class="ioption-4">
                                                        <label for="option_input_<?= $value['id'] ?>_4" class="option option-4">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">Tidak Setuju</span>
                                                        </label>

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_5" name="pertanyaan_<?= $value['id'] ?>" value="1" class="ioption-5">
                                                        <label for="option_input_<?= $value['id'] ?>_5" class="option option-5">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">Sangat Tidak Setuju</span>
                                                        </label>
                                                    <?php } elseif ($value['radio'] == 2) { ?>

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_1" name="pertanyaan_<?= $value['id'] ?>" value="Ya" class="ioption-1" required checked>
                                                        <label for="option_input_<?= $value['id'] ?>_1" class="option option-1">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">Ya</span>
                                                        </label>

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_2" name="pertanyaan_<?= $value['id'] ?>" value="Tidak" class="ioption-2">
                                                        <label for="option_input_<?= $value['id'] ?>_2" class="option option-2">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">Tidak</span>
                                                        </label>

                                                    <?php } elseif ($value['radio'] == 'jk') { ?>
                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_1" name="pertanyaan_<?= $value['id'] ?>" value="Pria" class="ioption-1" checked required>
                                                        <label for="option_input_<?= $value['id'] ?>_1" class="option option-1">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">Pria</span>
                                                        </label>

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_2" name="pertanyaan_<?= $value['id'] ?>" value="Wanita" class="ioption-2">
                                                        <label for="option_input_<?= $value['id'] ?>_2" class="option option-2">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">Wanita</span>
                                                        </label>

                                                    <?php } elseif ($value['radio'] == 'kira') { ?>

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_1" name="pertanyaan_<?= $value['id'] ?>" value="< 10x" class="ioption-1">
                                                        <label for="option_input_<?= $value['id'] ?>_1" class="option option-1">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">
                                                                < 10x</span>
                                                        </label>

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_2" name="pertanyaan_<?= $value['id'] ?>" value="10x - 20x" class="ioption-2">
                                                        <label for="option_input_<?= $value['id'] ?>_2" class="option option-2">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">
                                                                10x - 20x</span>
                                                        </label>

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_3" name="pertanyaan_<?= $value['id'] ?>" value="21x - 30x" class="ioption-3" required checked>
                                                        <label for="option_input_<?= $value['id'] ?>_3" class="option option-3">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">21x - 30x</span>
                                                        </label>

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_4" name="pertanyaan_<?= $value['id'] ?>" value="31x - 40x" class="ioption-4">
                                                        <label for="option_input_<?= $value['id'] ?>_4" class="option option-4">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">31x - 40x</span>
                                                        </label>

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_5" name="pertanyaan_<?= $value['id'] ?>" value="> 40x" class="ioption-5">
                                                        <label for="option_input_<?= $value['id'] ?>_5" class="option option-5">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">> 40x</span>
                                                        </label>
                                                    <?php } elseif ($value['radio'] == 'waktu') { ?>

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_1" name="pertanyaan_<?= $value['id'] ?>" value="Pagi" class="ioption-1">
                                                        <label for="option_input_<?= $value['id'] ?>_1" class="option option-1">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">Pagi</span>
                                                        </label>

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_2" name="pertanyaan_<?= $value['id'] ?>" value="Siang" class="ioption-2">
                                                        <label for="option_input_<?= $value['id'] ?>_2" class="option option-2">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">Siang</span>
                                                        </label>

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_3" name="pertanyaan_<?= $value['id'] ?>" value="Sore" class="ioption-3" required checked>
                                                        <label for="option_input_<?= $value['id'] ?>_3" class="option option-3">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">Sore</span>
                                                        </label>

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_4" name="pertanyaan_<?= $value['id'] ?>" value="Malam" class="ioption-4">
                                                        <label for="option_input_<?= $value['id'] ?>_4" class="option option-4">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">Malam</span>
                                                        </label>

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_5" name="pertanyaan_<?= $value['id'] ?>" value="Tengah Malam" class="ioption-5">
                                                        <label for="option_input_<?= $value['id'] ?>_5" class="option option-5">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">Tengah Malam</span>
                                                        </label>
                                                    <?php } elseif ($value['radio'] == 'jenis') { ?>

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_1" name="pertanyaan_<?= $value['id'] ?>" value="Feed" class="ioption-1" required checked>
                                                        <label for="option_input_<?= $value['id'] ?>_1" class="option option-1">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">Feed</span>
                                                        </label>

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_2" name="pertanyaan_<?= $value['id'] ?>" value="Instastory" class="ioption-2">
                                                        <label for="option_input_<?= $value['id'] ?>_2" class="option option-2">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">Instastory</span>
                                                        </label>

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_3" name="pertanyaan_<?= $value['id'] ?>" value="Reels" class="ioption-2">
                                                        <label for="option_input_<?= $value['id'] ?>_3" class="option option-2">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">Reels</span>
                                                        </label>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <?php if (isset($value['text'])) { ?>
                                            <div class="field padding-bottom--24">
                                                <label for="text_<?= $value['id'] ?>"><?= $value['id'] . '.) ' . $value['pertanyaan'] ?></label>
                                                <input type="text" id="text_<?= $value['id'] ?>" required placeholder="Jawaban Anda" name="pertanyaan_<?= $value['id'] ?>">
                                            </div>
                                        <?php } ?>

                                    <?php } ?>

                                <?php
                                } ?>


                                <div class="field padding-bottom--24">
                                    <input type="submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['pertanyaan_1'])) {

    $no = 1;
    $bagian = [];
    foreach ($soal as $key1 => $v) {
        if (isset($v['id'])) {
            $no++;
        }

        if (isset($v['judul']['bagian'])) {
            $bagian[] = array('id' => $v['judul']['bagian'], 'isi' => $v['judul']['isi']);
        }
    }


    $jawaban = [];
    for ($i = 1; $i < $no; $i++) {

        foreach ($soal as  $r) {
            if (isset($r['id'])) {
                if ($r['id'] == $i) {
                    $bagian = $r['bagian'];
                }
            }
        }

        $jawaban[] = array(
            'pertanyaan_' . $i => $_POST['pertanyaan_' . $i],
            'bagian' => $bagian

        );
    }

    $jawabanfile = [];
    $fileisi = file_get_contents("json/isi.json");
    $isi = json_decode($fileisi, TRUE);
    if ($isi) {
        $ceknama = '';
        foreach ($isi as $hsl) {
            if ($hsl['jawaban'][3]['pertanyaan_4'] == $jawaban[3]['pertanyaan_4']) {
                $ceknama .= 1;
            }
        }
        if ($ceknama == '') {
            if (isset($isi['pertanyaan_1'])) {
                $jawabanfile[] = $isi;
            } else {
                foreach ($isi as $key2 => $val) {
                    $jawabanfile[] = $val;
                }
            }
            $jawabanfile[] = array('jawaban' => $jawaban, 'status' => true);
        }
    } else {
        $ceknama == '';
        $jawabanfile[] = array('jawaban' => $jawaban, 'status' => true);
    }



    if ($ceknama == '') {
        $jsonjawaban = json_encode($jawabanfile);
        $cek = file_put_contents("json/isi.json", $jsonjawaban);
        if ($cek) {
            echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Terima Kasih Banyak Telah Mengisi',
            showConfirmButton: false,
            timer: 3000
            })</script>";
        } else {
            echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Maaf Data Tidak Berhasil Masuk',
            showConfirmButton: false,
            timer: 3000
            })</script>";
        }
    } else {

        echo "<script>Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Username Telah Ada',
            showConfirmButton: false,
            timer: 3000
            })</script>";
    }
} ?>