<html>

<head>
    <meta charset="utf-8">
    <title>Penelitian Fembi Nur Ilham Universitas Bengkulu</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="icon.jpg" sizes="16x16">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                                $filesoal = file_get_contents("data/json/soal.json");
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

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_3" name="pertanyaan_<?= $value['id'] ?>" value="3" class="ioption-3" required>
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

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_1" name="pertanyaan_<?= $value['id'] ?>" value="Ya" class="ioption-1" required>
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
                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_1" name="pertanyaan_<?= $value['id'] ?>" value="Pria" class="ioption-1" required>
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

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_3" name="pertanyaan_<?= $value['id'] ?>" value="21x - 30x" class="ioption-3" required>
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

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_3" name="pertanyaan_<?= $value['id'] ?>" value="Sore" class="ioption-3" required>
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

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_1" name="pertanyaan_<?= $value['id'] ?>" value="Feed" class="ioption-1" required>
                                                        <label for="option_input_<?= $value['id'] ?>_1" class="option option-1">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">Feed</span>
                                                        </label>

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_2" name="pertanyaan_<?= $value['id'] ?>" value="Instastory" class="ioption-2">
                                                        <label for="option_input_<?= $value['id'] ?>_2" class="option option-2">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">Instastory</span>
                                                        </label>

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_3" name="pertanyaan_<?= $value['id'] ?>" value="Reels" class="ioption-3">
                                                        <label for="option_input_<?= $value['id'] ?>_3" class="option option-3">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">Reels</span>
                                                        </label>
                                                    <?php } elseif ($value['radio'] == 'tau') { ?>

                                                        <input type="radio" required id="option_input_<?= $value['id'] ?>_1" name="pertanyaan_<?= $value['id'] ?>" value="Media Sosial" class="ioption-1">
                                                        <label for="option_input_<?= $value['id'] ?>_1" class="option option-1">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">Media Sosial</span>
                                                        </label>

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_2" name="pertanyaan_<?= $value['id'] ?>" value="Orang Lain" class="ioption-2">
                                                        <label for="option_input_<?= $value['id'] ?>_2" class="option option-2">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">Orang Lain</span>
                                                        </label>
                                                    <?php } elseif ($value['radio'] == 'pekerjaan') { ?>

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_1" name="pertanyaan_<?= $value['id'] ?>" value="Pegawai Negeri" class="ioption-1" required>
                                                        <label for="option_input_<?= $value['id'] ?>_1" class="option option-1">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">Pegawai Negeri</span>
                                                        </label>

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_2" name="pertanyaan_<?= $value['id'] ?>" value="Pegawai Swasta" class="ioption-2">
                                                        <label for="option_input_<?= $value['id'] ?>_2" class="option option-2">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">Pegawai Swasta</span>
                                                        </label>

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_3" name="pertanyaan_<?= $value['id'] ?>" value="Pengusaha" class="ioption-3">
                                                        <label for="option_input_<?= $value['id'] ?>_3" class="option option-3">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">Pengusaha</span>
                                                        </label>


                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_4" name="pertanyaan_<?= $value['id'] ?>" value="Belum Bekerja" class="ioption-4">
                                                        <label for="option_input_<?= $value['id'] ?>_4" class="option option-4">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">Belum Bekerja</span>
                                                        </label>
                                                    <?php } elseif ($value['radio'] == 'daerah') { ?>

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_1" name="pertanyaan_<?= $value['id'] ?>" value="Sumatera" class="ioption-1">
                                                        <label for="option_input_<?= $value['id'] ?>_1" class="option option-1">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">Sumatera</span>
                                                        </label>

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_2" name="pertanyaan_<?= $value['id'] ?>" value="Jawa" class="ioption-2">
                                                        <label for="option_input_<?= $value['id'] ?>_2" class="option option-2">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">Jawa</span>
                                                        </label>

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_3" name="pertanyaan_<?= $value['id'] ?>" value="Kalimantan" class="ioption-3" required>
                                                        <label for="option_input_<?= $value['id'] ?>_3" class="option option-3">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">Kalimantan</span>
                                                        </label>

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_4" name="pertanyaan_<?= $value['id'] ?>" value="Sulawesi" class="ioption-4">
                                                        <label for="option_input_<?= $value['id'] ?>_4" class="option option-4">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">Sulawesi</span>
                                                        </label>

                                                        <input type="radio" id="option_input_<?= $value['id'] ?>_5" name="pertanyaan_<?= $value['id'] ?>" value="Papua" class="ioption-5">
                                                        <label for="option_input_<?= $value['id'] ?>_5" class="option option-5">
                                                            <div class="dot"></div>
                                                            <span style="margin-left: 5px;">Papua</span>
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

    <script>
        window.onload = function() {
            //hide the preloader
            document.querySelector(".loaderbg").style.display = "none";
        }
    </script>
    <style>
        .loaderbg {
            position: relative;
            z-index: 9999;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: linear-gradient(to top, #48c6ef 0%, #6f86d6 100%);
        }

        .loader {
            width: 16em;
            height: 8em;
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
    $fileisi = file_get_contents("data/json/isi.json");
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
        $ceknama = '';
        $jawabanfile[] = array('jawaban' => $jawaban, 'status' => true);
    }



    if ($ceknama == '') {
        $jsonjawaban = json_encode($jawabanfile);
        $cek = file_put_contents("data/json/isi.json", $jsonjawaban);
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