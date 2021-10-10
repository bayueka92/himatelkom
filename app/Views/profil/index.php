<?= $this->extend('main_layout'); ?>

<?= $this->section('main_content'); ?>
<div style="background-color:#f1f2f6;padding-bottom:1.5%;clip-path: polygon(0% 0, 600% 0%, 0% 100%, 0 100%);">
    <div style="background-color:#00826c;padding-bottom:0.5%;clip-path: polygon(0% 0, 600% 0%, 0% 100%, 0 100%);">
        <img src=<?php echo base_url() . "/img/hima_backdrop.jpg" ?>
        class="asyncImage img-fluid" alt="Responsive image" style="clip-path: polygon(0% 0, 600% 0%, 0% 100%, 0
        100%);border-radius:0px 0px 0% 0%;">
    </div>
</div>

<link href="<?= base_url();?>/css/styles.css" rel="stylesheet" />

<!------ NAVIGASI HIMA -->
<!--profil hima-->
<style>
    .kartu {
        width: 800px;
        margin: 0 auto;
        margin-top: 70px;
        box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, .03);
        transition: all .3s;
        background-color: #f89501;
        border: solid 8px #ffb74a;
        /*border-top-right-radius: 80px;*/
        /*border-bottom-left-radius: 80px;*/
    }

    .kartu:hover {
        background-color: #1f8a45;
        border: solid 8px #4fd47e;
        /*border-top-left-radius: 80px;*/
        /*border-bottom-right-radius: 80px;*/
        border-top-right-radius: 0px;
        border-bottom-left-radius: 0px;
    }

    .foto {
        padding: 30px;
        margin-left: 10px;
        margin-top: 10px;
    }

    tbody {
        font-size: 40px;
        
        color: white;
    }

    .biodata {
        margin-top: 30px;
    }
</style>
<style>
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
</style>
<style>
    ._3emE9--dark-theme .-S-tR--ff-downloader {
        background: rgba(30, 30, 30, .93);
        border: 1px solid rgba(82, 82, 82, .54);
        box-shadow: 0 4px 7px rgba(30, 30, 30, .55);
        color: #fff
    }

    ._3emE9--dark-theme .-S-tR--ff-downloader ._6_Mtt--header ._2VdJW--minimize-btn {
        background: #3d4b52
    }

    ._3emE9--dark-theme .-S-tR--ff-downloader ._6_Mtt--header ._2VdJW--minimize-btn:hover {
        background: #131415
    }

    ._3emE9--dark-theme .-S-tR--ff-downloader ._10vpG--footer {
        background: rgba(30, 30, 30, .93)
    }

    ._2mDEx--white-theme .-S-tR--ff-downloader {
        background: #fff;
        border: 1px solid rgba(82, 82, 82, .54);
        box-shadow: 0 4px 7px rgba(30, 30, 30, .55);
        color: #314c75
    }

    ._2mDEx--white-theme .-S-tR--ff-downloader ._6_Mtt--header {
        
    }

    ._2mDEx--white-theme .-S-tR--ff-downloader ._2dFLA--container ._2bWNS--notice {
        border: 0;
        color: rgba(0, 0, 0, .88)
    }

    ._2mDEx--white-theme .-S-tR--ff-downloader ._10vpG--footer {
        background: #fff
    }

    .-S-tR--ff-downloader {
        display: block;
        overflow: hidden;
        position: fixed;
        bottom: 20px;
        right: 7.1%;
        width: 330px;
        height: 180px;
        background: rgba(30, 30, 30, .93);
        border-radius: 2px;
        color: #fff;
        z-index: 99999999;
        border: 1px solid rgba(82, 82, 82, .54);
        box-shadow: 0 4px 7px rgba(30, 30, 30, .55);
        transition: .5s
    }

    .-S-tR--ff-downloader._3M7UQ--minimize {
        height: 62px
    }

    .-S-tR--ff-downloader._3M7UQ--minimize .nxuu4--file-info,
    .-S-tR--ff-downloader._3M7UQ--minimize ._6_Mtt--header {
        display: none
    }

    .-S-tR--ff-downloader ._6_Mtt--header {
        padding: 10px;
        font-size: 17px;
        font-family: sans-serif
    }

    .-S-tR--ff-downloader ._6_Mtt--header ._2VdJW--minimize-btn {
        float: right;
        background: #f1ecec;
        height: 20px;
        width: 20px;
        text-align: center;
        padding: 2px;
        margin-top: -10px;
        cursor: pointer
    }

    .-S-tR--ff-downloader ._6_Mtt--header ._2VdJW--minimize-btn:hover {
        background: #e2dede
    }

    .-S-tR--ff-downloader ._13XQ2--error {
        color: red;
        padding: 10px;
        font-size: 12px;
        line-height: 19px
    }

    .-S-tR--ff-downloader ._2dFLA--container {
        position: relative;
        height: 100%
    }

    .-S-tR--ff-downloader ._2dFLA--container .nxuu4--file-info {
        padding: 6px 15px 0;
        font-family: sans-serif
    }

    .-S-tR--ff-downloader ._2dFLA--container .nxuu4--file-info div {
        margin-bottom: 5px;
        width: 100%;
        overflow: hidden
    }

    .-S-tR--ff-downloader ._2dFLA--container ._2bWNS--notice {
        margin-top: 21px;
        font-size: 11px
    }

    .-S-tR--ff-downloader ._10vpG--footer {
        width: 100%;
        bottom: 0;
        position: absolute;
    }

    .-S-tR--ff-downloader ._10vpG--footer ._2V73d--loader {
        -webkit-animation: n0BD1--rotation 3.5s linear forwards;
        animation: n0BD1--rotation 3.5s linear forwards;
        position: absolute;
        top: -120px;
        left: calc(50% - 35px);
        border-radius: 50%;
        border: 5px solid #fff;
        border-top-color: #a29bfe;
        height: 70px;
        width: 70px;
        display: flex;
        justify-content: center;
        align-items: center
    }

    .-S-tR--ff-downloader ._10vpG--footer ._24wjw--loading-bar {
        width: 100%;
        height: 18px;
        background: #dfe6e9;
        border-radius: 5px
    }

    .-S-tR--ff-downloader ._10vpG--footer ._24wjw--loading-bar ._1FVu9--progress-bar {
        height: 100%;
        background: #8bc34a;
        border-radius: 5px
    }

    .-S-tR--ff-downloader ._10vpG--footer ._2KztS--status {
        margin-top: 10px
    }

    .-S-tR--ff-downloader ._10vpG--footer ._2KztS--status ._1XilH--state {
        float: left;
        font-size: .9em;
        letter-spacing: 1pt;
        text-transform: uppercase;
        width: 100px;
        height: 20px;
        position: relative
    }

    .-S-tR--ff-downloader ._10vpG--footer ._2KztS--status ._1jiaj--percentage {
        float: right
    }
</style>
</head>

<!-- END NAVIGASI HIMA -->
<!----- ABOUT HIMA-->

<div class="container" style="margin-top:8%;">
    <div class="row">
        <div class="col-12 mx-auto col-md-3 mt-4">
            <img src=<?php echo base_url() . "/img/logo_hima.png"; ?>
            class="rounded mx-auto d-block" alt="..." style="width:200px;height:auto;">
        </div>

        <div class="col-12 mx-auto col-md-9 mt-4">
            <h5 class="mt-0 mb-1 text-left mx-4">HIMPUNAN MAHASISWA TELEKOMUNIKASI PENS</h5>
            <hr class="mx-4">
            <p class="mt-0 mb-1 text-left mx-4 text-muted">HIMA TELKOM PENS bertujuan untuk mewujudkan dan membina
                rasa
                kekeluargaan
                antar seluruh civitas akademika PENS, sebagai wadah pengembangan potensi,
                kecendekiawanan, kemandirian, profesionalisme, rasa tanggung jawab sosial
                dan kebangsaan dari mahasiswa serta menjadi organisasi yang bermanfaat bagi
                masyarakat. HIMA TELKOM berasaskan Pancasila dan Undang-Undang Dasar 1945.
                HIMA TELKOM bersifat kekeluargaan, independen, demokratis, profesional dan
                proaktif.</p>
        </div>
    </div>
</div>

<script src="js/bootstrap.min.js"></script>
<!-- VISI MISI-start -->
<div class="container mx-auto" style="margin-top:12%;margin-bottom:12%;padding:0 2% 0 2%;">

    <p class="h3 mx-4" style="">VISI</p>
    <div class=" mx-4" style="background-color:#00826c;width:70pt;height:5px;margin:1% 0% 2% 0%;"></div>


    <center>
        <blockquote class=" mx-4 blockquote text-left">
            <p style="margin:0;">HIMA TELKOM sebagai wadah pengembangan Mahasiswa Teknik Telekomunikasi yang
                kolaboratif dan kontributif dalam ranah internal maupun eksternal</p>
        </blockquote>
    </center>


    <p class="h3 mx-4" style="margin-top:4%;">MISI</p>
    <div class="mx-4" style="background-color:#00826c;width:70pt;height:5px;margin:1% 0% 2% 0%;"></div>


    <center>
        <blockquote class=" mx-4 blockquote text-left">
            <ul class="container mx-auto" style="margin:0;">
                <li>Pengelolaan organisasi yang profesional</li>
                <li>Optimalisasi pengembangan minat bakat, softskill dan hardskill</li>
                <li>Menjaga keharmonisan elemen HIMA TELKOM melalui komunikasi aktif dan intensif</li>
                <li>Meningkatkan peran serta Mahasiswa Aktif Teknik Telekomunikasi terhadap lingkungan dan
                    masyarakat</li>
                <li>Mengembangkan wadah kolaborasi untuk berinovasi dan berkreasi</li>
            </ul>
        </blockquote>
    </center>

</div>
<!-- VISI MISI-end -->
<!-- Departemen -->
<section class="page-section bg-light py-5" id="portfolio">
    <div class="container my-4">
        <div class="text-center">
            <h3 class="text-uppercase">Departemen HIMA TELKOM PENS</h3>
            <p class="blockquote" style="color:#00826c;" class="mt-0">Kepengurusan 2020/2021</p>
            <br>
        </div>
        <div class="row" style="margin-bottom:2%;">
            <div class="col-lg-12 col-sm-12 mb-4">
                <div class="portfolio-item  rounded-lg">
                    <a class="portfolio-link" data-toggle="modal" href="#bph">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-info-circle fa-3x"></i></div>
                        </div>
                        <img class="img-fluid"
                            src="<?= base_url();?>/img/portfolio/bph.png"
                            alt="" />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">BPH</div>
                        
                        <div class="blockquote text-muted"><small>Badan Pengurus Harian</small></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#psdm">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-info-circle fa-3x"></i></div>
                        </div>
                        <img class="img-fluid"
                            src="<?= base_url();?>/img/portfolio/psdm.png"
                            alt="" />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">PSDM</div>
                        <div class="blockquote text-muted"><small>Departemen<br>Pengembangan Sumber Daya
                            Mahasiswa</small></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#dagri">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-info-circle fa-3x"></i></div>
                        </div>
                        <img class="img-fluid"
                            src="<?= base_url();?>/img/portfolio/dagri.png"
                            alt="" />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">DAGRI</div>
                        <div class="blockquote text-muted"><small>Departemen<br>Dalam Negeri</small></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#kwu">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-info-circle fa-3x"></i></div>
                        </div>
                        <img class="img-fluid"
                            src="<?= base_url();?>/img/portfolio/kwu.png"
                            alt="" />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">KWU</div>
                        <div class="blockquote text-muted"><small>Departemen<br>Kewirausahaan</small></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#senor">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-info-circle fa-3x"></i></div>
                        </div>
                        <img class="img-fluid"
                            src="<?= base_url();?>/img/portfolio/senor.png"
                            alt="" />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">SENOR</div>
                        <div class="blockquote text-muted"><small>Departemen<br>Seni dan Olahraga</small></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#kominfo">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-info-circle fa-3x"></i></div>
                        </div>
                        <img class="img-fluid"
                            src="<?= base_url();?>/img/portfolio/kominfo.png"
                            alt="" />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">KOMINFO</div>
                        <div class="blockquote text-muted"><small>Departemen<br>Komunikasi dan Informasi</small></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#lugri">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-info-circle fa-3x"></i></div>
                        </div>
                        <img class="img-fluid"
                            src="<?= base_url();?>/img/portfolio/lugri.png"
                            alt="" />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">LUGRI</div>
                        <div class="blockquote text-muted"><small>Departemen<br>Luar Negeri</small></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-sm-12 mb-lg-0">
                <div class="portfolio-item  rounded-lg">
                    <a class="portfolio-link" data-toggle="modal" href="#ristek">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-info-circle fa-3x"></i></div>
                        </div>
                        <img class="img-fluid"
                            src="<?= base_url();?>/img/portfolio/ristek.png"
                            alt="" />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">RISTEK</div>
                        <div class="blockquote text-muted"><small>Departemen<br>Riset dan Teknologi</small></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Komunitas -->
<section class="page-section my-4" id="about">
    <div class="container">
        <div class="text-center" style="margin-bottom:2%;">
            <h3 class="text-uppercase">Komunitas</h3>
            <p class="blockquote" style="color:#00826c;" class="mt-0">Yuk, Kenalan dengan kami!</p>
            <br>
        </div>
        <ul class="timeline">
            <li>
                <div class="timeline-image" style="color: #00826c"><img class="rounded-circle img-fluid"
                        src="<?= base_url();?>/img/about/eos.png"
                        alt="" /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>EOS</h4>
                        <h6 class="subheading" style="color:#00826c;">EEPIS On Sky</h6>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted">Komunitas EOS berfokus
                            pada bidang penyiaran berupa podcast yang disajikan secara menarik dengan media
                            perantara Spotify dan Anchor.</p>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-image" style="color: #00826c"><img class="rounded-circle img-fluid"
                        src="<?= base_url();?>/img/about/jurnal.png"
                        alt="" /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>T-Journalism</h4>
                        <h6 class="subheading" style="color:#00826c;">Telecommunication Journalism</h6>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted">Komunitas T-Journalism ditujukan untuk Mahasiswa Aktif Teknik Telekomunikasi yang ingin menggeluti bidang Jurnalistik
                            seperti penulisan berita, feature, opini, dan artikel di media massa.
                        </p>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-image"><img class="rounded-circle img-fluid"
                        src="<?= base_url();?>/img/about/musik-removebg-preview.png"
                        alt="" /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>Music</h4>
                        <h6 class="subheading" style="color:#00826c;">Music</h6>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted">Komunitas Musik ditujukan untuk menyalurkan minat dan bakat
                            mahasiswa Teknik Telekomunikasi PENS dalam bidang seni berupa vokal dan permainan alat
                            musik.
                        </p>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-image"><img class="rounded-circle img-fluid"
                        src="<?= base_url();?>/img/about/game.png"
                        alt="" /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>E-Sport</h4>
                        <h6 class="subheading" style="color:#00826c;">Electronic Sports</h6>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted">Komunitas E-Sport ditujukan untuk menyalurkan dan mengembangkan minat bakat
                            mahasiswa Teknik Telekomunikasi dalam game online yang diselenggarakan oleh HIMA TELKOM.
                        </p>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-image p-4"><img class="rounded-circle img-fluid"
                        src="<?= base_url();?>/img/about/dsc.png"
                        alt="" /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>DSC</h4>
                        <h6 class="subheading" style="color:#00826c;">Data Science Club</h6>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted">Komunitas DSC bertujuan untuk meningkatkan minat dan bakat
                            mahasiswa Politeknik Elektronika Negeri Surabaya dalam hal pemanfaatan dan pengolahan data
                            science.
                        </p>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-image"><img class="rounded-circle img-fluid"
                        src="<?= base_url();?>/img/about/teneur.png"
                        alt="" /></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>Teneur</h4>
                        <h6 class="subheading" style="color:#00826c;">Telkom Entrepeneur</h6>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted">Komunitas Teneur ditujukan untuk mahasiswa telkom
                            sebagai wadah pengembangan minat dan bakat di bidang kewirausahaan.
                        </p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>
<!-- Testimoni -->
<section class="page-section bg-light py-5" id="team">
    <div class="container my-4">
        <div class="text-center">
            <h3 class="text-uppercase">Apa kata mereka tentang HIMA TELKOM?</h3>
            <p class="blockquote" style="color:#00826c;" class="mt-0">Dari perwakilan 3 angkatan terakhir</p>
            <br>
        </div>
        <div class="row mt-2">
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle"
                        src="<?= base_url();?>/img/team/gulo.jpeg"
                        alt="" />
                    <h4>Melki Mario Gulo</h4>
                    <p class="text-muted">Angkatan 2017</p>
                    <p style="height:180px;"><i>"Prodi Teknik Telekomunikasi PENS banyak memberi ilmu kepada saya baik dalam
                        bidang teknikal
                        maupun non-Teknikal. Sehingga cukup rasanya untuk membawa bekal ilmu tersebut dalam kehidupan
                        bermasyarakat."</i></p>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle"
                        src="<?= base_url();?>/img/team/faris.jpeg"
                        alt="" />
                    <h4>Syah Fareizi</h4>
                    <p class="text-muted">Angkatan 2018</p>
                    <p style="height:180px;"><i>"Selama menjadi bagian dari HIMA TELKOM saya banyak bertemu orang orang
                        hebat
                        yang tidak berhenti
                        belajar, baik softskill maupun hardskill di HIMA TELKOM menjadi tempat yang sempurna untuk
                        sebagai seorang mahasiswa dapat berkembang. Hijau kami akan terus tumbuh."</i></p>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle"
                        src="<?= base_url();?>/img/team/algie.jpeg"
                        alt="" />
                    <h4>Algie Putra Handaya</h4>
                    <p class="text-muted">Angkatan 2019</p>
                    <p style="height:180px;"><i>"Menjadi bagian dari HIMA TELKOM merupakan salah satu hal terbaik dalam
                        hidup saya. Banyak ilmu yang bisa dipetik disini baik dari bidang akademik maupun non-akademik
                        yang juga bisa menjadi bekal untuk dibawa ke dunia kerja nantinya."</i></p>

                </div>
            </div>
        </div>
        <!--
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <p class="large text-muted">"Semangat buat Mahasiswa Telekomunikasi !!! Jangan lupa dipundakmu ada
                    tanggung jawab untuk menjadi orang yang sukses di masa depan."</p>
            </div>
        </div>
        -->
    </div>
</section>
<!-- Departemen Muncul-->
<!-- selayang pandang BPH-->
<div class="portfolio-modal modal fade" id="bph" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal"><img
                    src="<?= base_url();?>/img/close-icon.svg" style="width:30px;height:auto;"
                    alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project Details Go Here-->
                            <h2 class="text-uppercase" style="color:#00826c;">BPH</h2>
                            <p class="text-muted" style="color:#00826c;">Badan Pengurus Harian</p>
                            <img class="img-fluid d-block mx-auto"
                                src="<?= base_url();?>/img/portfolio/bph.png"
                                alt="" />
                            <p>Badan Pengurus Harian ( BPH ) merupakan badan yang melakukan fungsi kontrol,
                                audit internal, dan koordinasi terhadap sistem manajemen dan keuangan serta menjaga
                                kedinamisan hubungan internal dan eksternal HIMA TELKOM.</p>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- selayang pandang PSDM -->
<div class="portfolio-modal modal fade" id="psdm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal"><img
                    src="<?= base_url();?>/img/close-icon.svg" style="width:30px;height:auto;"
                    alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project Details Go Here-->
                            <h2 class="text-uppercase" style="color:#00826c;">PSDM</h2>
                            <p class="text-muted" style="color:#00826c;">Departemen Pengembangan Sumber Daya Mahasiswa</p>
                            <img class="img-fluid d-block mx-auto"
                                src="<?= base_url();?>/img/portfolio/psdm.png"
                                alt="" />
                            <p>Departemen Pengembangan Sumber Daya Mahasiswa (psdm) HIMA TELKOM adalah departemen yang
                                bertanggung jawab dalam mengembangkan
                                potensi seluruh sumber daya mahasiswa Teknik Telekomunikasi PENS dalam bidang softskill,
                                sehingga mampu meningkatkan kualitas dari mahasiswa Teknik Telekomunikasi yang sesuai
                                dengan pola pengembangan sumber daya mahasiswa Teknik Telekomunikasi PENS. </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- selayang pandang DAGRI -->
<div class="portfolio-modal modal fade" id="dagri" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal"><img
                    src="<?= base_url();?>/img/close-icon.svg" style="width:30px;height:auto;"
                    alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project Details Go Here-->
                            <h2 class="text-uppercase" style="color:#00826c;">DAGRI</h2>
                            <p class="text-muted" style="color:#00826c;">Departemen Dalam Negeri</p>
                            <img class="img-fluid d-block mx-auto"
                                src="<?= base_url();?>/img/portfolio/dagri.png"
                                alt="" />
                            <p>Departemen Dalam Negeri (dagri) HIMA TELKOM adalah departemen yang berfokus pada internal
                                mahasiswa telkom dalam
                                pelayanan mahasiswa Teknik Telekomunikasi yang bersifat aspiratif dan
                                pengembangan rasa memiliki antar sesama anggota himpunan mahasiswa telekomunikasi.</p>

 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- selayang pandang KWU -->
<div class="portfolio-modal modal fade" id="kwu" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal"><img
                    src="<?= base_url();?>/img/close-icon.svg" style="width:30px;height:auto;"
                    alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project Details Go Here-->
                            <h2 class="text-uppercase" style="color:#00826c;">KWU</h2>
                            <p class="text-muted" style="color:#00826c;">Departemen Kewirausahaan</p>
                            <img class="img-fluid d-block mx-auto"
                                src="<?= base_url();?>/img/portfolio/kwu.png"
                                alt="" />
                            <p>Departemen Kewirausahaan (kwu) HIMA TELKOM adalah departemen yang bertanggung jawab dalam
                                pengembangan skill
                                entrepreneurship mahasiswa Telkom serta menjadi roda finansial utama HIMA TELKOM.</p>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- selayang pandang SENOR -->
<div class="portfolio-modal modal fade" id="senor" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal"><img
                    src="<?= base_url();?>/img/close-icon.svg" style="width:30px;height:auto;"
                    alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project Details Go Here-->
                            <h2 class="text-uppercase" style="color:#00826c;">SENOR</h2>
                            <p class="text-muted" style="color:#00826c;">Departemen Seni dan Olahraga</p>
                            <img class="img-fluid d-block mx-auto"
                                src="<?= base_url();?>/img/portfolio/senor.png"
                                alt="" />
                            <p>Departemen Seni dan Olahraga (senor) HIMA TELKOM adalah departemen yang mewadahi dalam
                                pengembangan minat dan bakat
                                khususnya dalam bidang seni dan olahraga yang dibutuhkan oleh mahasiswa Telkom.</p>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- selayang pandang KOMINFO -->
<div class="portfolio-modal modal fade" id="kominfo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal"><img
                    src="<?= base_url();?>/img/close-icon.svg" style="width:30px;height:auto;"
                    alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project Details Go Here-->
                            <h2 class="text-uppercase" style="color:#00826c;">KOMINFO</h2>
                            <p class="text-muted" style="color:#00826c;">Departemen Komunikasi dan Informasi</p>
                            <img class="img-fluid d-block mx-auto"
                                src="<?= base_url();?>/img/portfolio/kominfo.png"
                                alt="" />
                            <p>Departemen Komunikasi dan Informasi (kominfo) HIMA TELKOM adalah departemen yang
                                bertanggung jawab dalam media penyebaran
                                informasi HIMA TELKOM yang kredibel dalam lingkup internal maupun
                                eksternal melalui berbagai media informasi serta menjadi wadah
                                dalam pengembangan bidang jurnalistik HIMA TELKOM.</p>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- selayang pandang LUGRI -->
<div class="portfolio-modal modal fade" id="lugri" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal"><img
                    src="<?= base_url();?>/img/close-icon.svg" style="width:30px;height:auto;"
                    alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project Details Go Here-->
                            <h2 class="text-uppercase" style="color:#00826c;">LUGRI</h2>
                            <p class="text-muted" style="color:#00826c;">Departemen Luar Negeri</p>
                            <img class="img-fluid d-block mx-auto"
                                src="<?= base_url();?>/img/portfolio/lugri.png"
                                alt="" />
                            <p>Departemen Luar Negeri (lugri) HIMA TELKOM adalah departemen yang bertanggung jawab pada
                                hubungan baik dengan pihak di luar himpunan
                                serta membangun citra positif sebagai wadah implementasi lambang HIMA TELKOM.</p>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- selayang pandang PSDM -->
<div class="portfolio-modal modal fade" id="ristek" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal"><img
                    src="<?= base_url();?>/img/close-icon.svg" style="width:30px;height:auto;"
                    alt="Close modal" /></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project Details Go Here-->
                            <h2 class="text-uppercase" style="color:#00826c;">RISTEK</h2>
                            <p class="text-muted" style="color:#00826c;">Departemen Riset dan Teknologi</p>
                            <img class="img-fluid d-block mx-auto"
                                src="<?= base_url();?>/img/portfolio/ristek.png"
                                alt="" />
                            <p>Departemen riset dan teknologi (Ristek) adalah departemen yang bertanggung jawab dalam
                                pengembangan hardskill mahasiswa Telkom dalam bidang ilmu pengetahuan maupun
                                perkembangan teknologi demi kemajuan akreditasi Prodi Teknik Telekomunikasi. </p>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection();
