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

                <?php
                $fileisi = file_get_contents("../data/json/isi.json");
                $isi = json_decode($fileisi, TRUE);

                if (count($isi) > 3) {
                ?>
                    <?php include 'dataresponden.php'; ?>
                    <?php include 'validitas&reabilitas.php'; ?>
                    <?php include 'rankspearman.php'; ?>
                    <?php include 'efektivitas.php'; ?>
                <?php  } else {
                    echo '<center><h1><b>Responden Terlalu Sedikit</b></h1></center>';
                } ?>
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