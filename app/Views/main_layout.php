<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="<?php echo base_url() . "/img/logo_hima.png"; ?>">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url("demo_hima/assets/css/style.css"); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/coliff/bootstrap-rfs/bootstrap-rfs.css">
    <title>
        <?= $title; ?>
    </title>
    <style>
        .btn-alumni {
            border: 1px solid #00826c;
            color: #00826c;
        }

        .btn-alumni:hover {
            background: #00826c;
            color: #fff;
        }

        .btn-alumni-filled {
            background: #00826c;
            color: #fff;
        }

        .btn-alumni-filled:hover {
            background: #005b52;
            color: #fff;
        }

        .material-icons.md-24 {
            color: #555;
            font-size: 24px;
        }

        .extend_card {
            border-radius: 20px;
            padding: 8%;
            width: 18rem;
            border: 0;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.1);
            transition: padding 0.1s;
            margin: 4% 0 4% 0;
        }

        .extend_card:hover {
            padding: 4%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.2);

        }

        .kegiatan {
            overflow: hidden;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.1);
            border: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        .pootl {
            text-align: left;
        }

        .pootr {
            text-align: right;
        }

        @media screen and (max-width: 667px) {
            .pootl {
                padding-bottom: 1%;
                text-align: center;
            }

            .pootr {
                padding-top: 1%;
                text-align: center;
            }
        }
    </style>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffffff;z-index: 1;">
        <a class="navbar-brand" href="#" style="vertical-align: middle;margin:1%;">
            <img src=<?php echo base_url() . "/img/logo_hima.png"; ?>
            width="40" height="40" class="d-inline-block align-middle" alt="" style="display:inline-block;">
            <span class="navbar-brand mb-0 h1 align-middle"
                style="display:inline-block;color:#00826c;font-family: 'Roboto', sans-serif;margin-left:2%;font-size:12pt;"><?= strtoupper($title); ?></span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="">
            <ul class="navbar-nav ml-auto nav justify-content-center"
                style="font-family: 'Roboto:400',sans-serif;font-size:12pt;margin:0 1% 0 1%;">
                <li class="nav-item">
                    <a class="nav-link" style="text-align:center"
                        href="<?= base_url();?>">

                        <span
                            style="<?php if ($halaman=="index") {?>color:#00826c;font-family: 'Roboto',sans-serif;font-weight:500;<?php }?>">
                            Beranda
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="text-align:center"
                        href="<?= base_url();?>/berita/p/1">
                        <span
                            style="<?php if ($halaman=="berita") {?>color:#00826c;font-family: 'Roboto',sans-serif;font-weight:500;<?php }?>">
                            Berita
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="text-align:center"
                        href="<?= base_url();?>/profil">
                        <span
                            style="<?php if ($halaman=="profil") {?>color:#00826c;font-family: 'Roboto',sans-serif;font-weight:500;<?php }?>">
                            Profil
                        </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" style="text-align:center"
                        href="<?= base_url();?>#kontak"> <span
                            style="<?php if ($halaman=="kontak") {?>color:#00826c;font-family: 'Roboto',sans-serif;font-weight:500;<?php }?>">
                            Kontak
                        </span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="text-align:center" href="/alumni"><span
                            class="btn-alumni rounded-pill py-2 px-3" style="">Database
                            Alumni</span></a>
                </li>
            </ul>





        </div>
    </nav>
</head>

<body>



    <?= $this->renderSection('main_content'); ?>



    <div class="foot container-fluid" style="padding:20px 2% 20px 2%;background:#f1f2f6;">
    <div class="row" style="margin:0%;color:#9f9f9f;">
            <div class="col-12 col-md-6 pootl">
                &copy; 2021 Himpunan Mahasiswa Telekomunikasi PENS
            </div>
            <div class="col-12 col-md-6 pootr">
                <a href="https://www.facebook.com/himatelkom.eepis" target="_blank"><img src="<?php echo base_url("/img/facebook.svg"); ?>"
                    style="width:auto;height:24px" class="rounded ml-1 mr-1" alt="..."></a>
                <a href="https://www.instagram.com/himatelkom/?hl=id" target="_blank"><img src="<?php echo base_url("/img/instagram.svg"); ?>"
                    style="width:auto;height:24px" class="rounded ml-1 mr-1" alt="..."></a>
                <a href="https://twitter.com/HimaTelkom?s=20" target="_blank"><img src="<?php echo base_url("/img/twitter.svg"); ?>"
                    style="width:auto;height:24px" class="rounded ml-1 mr-1" alt="..."></a>


            </div>
        </div>
    </div>

    <!--A new look will appear soon-->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script>
        (() => {
            'use strict';
            // Page is loaded
            const objects = document.getElementsByClassName('asyncImage');
            Array.from(objects).map((item) => {
                // Start loading image
                const img = new Image();
                img.src = item.dataset.src;
                // Once image is loaded replace the src of the HTML element
                img.onload = () => {
                    item.classList.remove('asyncImage');
                    return item.nodeName === 'IMG' ?
                        item.src = item.dataset.src :
                        item.style.backgroundImage = `url(${item.dataset.src})`;
                };
            });
        })();
    </script>
</body>

</html>