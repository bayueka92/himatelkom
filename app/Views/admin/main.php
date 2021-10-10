<!doctype html>
<html lang="en" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon"
        href="<?php echo base_url() . "/img/logo_hima.png"; ?>">

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

        html,
        body {
            height: 100%;
            scroll-behavior: smooth;
        }
    </style>


</head>

<body class="h-100">


    <div class="container-fluid h-100 pl-0">
        <div class="row justify-content-center h-100">
            <div class="col-md-3 col-12 hidden-md-down pr-0">
                <nav class="nav flex-column navbar-dark bg-dark" style="height:100%;">
                    <a class="navbar-brand p-4" href="/admin/berita/p/1" style="vertical-align: middle;margin:1%;">
                        <img src=<?php echo base_url() . "/img/logo_hima.png"; ?>
                        width="40" height="40" class="d-inline-block align-middle" alt="" style="display:inline-block;">
                        <span class="navbar-brand mb-0 h1 align-middle"
                            style="display:inline-block;color:#fff;font-family: 'Roboto', sans-serif;margin-left:2%;font-size:12pt;"><?= strtoupper($title); ?></span>
                    </a>
                    <a class="px-4 nav-link text-white <?php if ($halaman=="berita") {?>bg-info<?php } else {
    echo"bg-dark";
}?>"
                        href="/admin/berita/p/1">Berita</a>
                    <a class="px-4 nav-link text-white <?php if ($halaman=="kegiatan") {?>bg-info<?php } else {
    echo"bg-dark";
}?>"
                        href="/admin/kegiatan/p/1">Kegiatan</a>
                    <a class="px-4 nav-link text-white <?php if ($halaman=="alumni") {?>bg-info<?php } else {
    echo"bg-dark";
}?>"
                        href="/admin/alumni/p/1?o=desc&d=null&v=0">Alumni</a>
                    <a class="px-4 nav-link text-white disabled text-muted <?php if ($halaman=="tnc") {?>bg-info<?php } else {
    echo"bg-dark";
}?>"
                        href="#">Video TNC Terbaru</a>
                    <div class="dropdown-divider mx-4"></div>
                    <a class="px-4 nav-link text-white disabled text-muted <?php if ($halaman=="list") {?>bg-info<?php } else {
    echo"bg-dark";
}?>"
                        href="#">Daftar Admin</a>
                        <a class="px-4 nav-link text-white <?php if ($halaman=="keluar") {?>bg-info<?php } else {
    echo"bg-dark";
}?>"
                        href="/admin/keluar">Keluar</a>
                </nav>
            </div>
            <div class="col-md-9 col-12" style="position: relative;height:100%;;overflow-y: scroll;" data-spy="scroll"
                class="h-180" data-offset="50">

                <?= $this->renderSection('main_content'); ?>

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