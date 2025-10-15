<?php
    include('use/brand_info.php');
    $PAGE_TITLE = $brand.' | '.$brandDescription;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $PAGE_TITLE ?></title>
    <?php include('use/head/head.php') ?>
</head>
<body>
    <div id="root">
        <?php include('use/body/navbar.php') ?>
        <?php include('use/body/hero.php') ?>
        <section id="proyecto" class="main-section snd-color">
            <div class="main-container">
                <div class="cols">
                    <div class="col">
                        <h2>Conoce<br><span>ULUMI</span></h2>
                        <div class="divider"></div>
                        <p class="textbox">72 villas residenciales premium que combinan modularidad, wellness y plusvalía en el corazón de la selva de Tulum.</p>
                        <div class="icons-grid mt-4">
                            <img src="assets/conoce-icon-1.png" alt="">
                            <img src="assets/conoce-icon-2.png" alt="">
                            <img src="assets/conoce-icon-3.png" alt="">
                            <img src="assets/conoce-icon-4.png" alt="">
                        </div>
                    </div>
                    <div class="col">
                        <img src="assets/conoce_image.jpg" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section class="main-section">
            <div class="main-container">
                <div class="title-centered">
                    <h2><span>Para ti</span></h2>
                    <div class="divider"></div>
                </div>
                <?php include("use/body/tabs_para_ti.php") ?>
            </div>

            <div class="main-container black">
                <div>
                    <h2><span>Confianza que se construye</span></h2>
                    <h3>Respaldo de desarrolladora y socios con trayectoria</h3>
                    <div class="divider white"></div>
                    <p>Ulumi cuenta con la experiencia de Tierra Noroeste, con proyectos en México y Texas</p>
                </div>
                <div>
                    <img class="icons" src="assets/icons-vertical.png" alt="">
                </div>
                <div>
                    <img src="assets/confianza_image.png" alt="">
                </div>
            </div>
        </section>
        <section class="main-section disponibilidad-section snd-color">
            <div class="main-container">
                <div class="title-centered">
                    <h2 class="small"><span>Disponibilidad en preventa</span></h2>
                    <div class="divider"></div>
                </div>
                <p class="text-centered textbox"><strong>Primera fase</strong> con precio preferente desde <strong>$4.2M MXN</strong></p>
                <div class="cols">
                    <div class="col">
                        <div class="card-disp">
                            <h2 class="span">Disponibles<br><span>TBD</span></h2>
                            <div class="cta-wrapper center"><?php include("use/body/cta.php") ?></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card-disp">
                            <h2 class="span">Disponibles<br><span>TBD</span></h2>
                            <div class="cta-wrapper center"><?php include("use/body/cta.php") ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="amenidades" class="main-section gray">
            <div class="main-container">
                <div class="title-centered white">
                    <h2>Más de <span>2,000 m<sup>2</sup></span> en amenidades</h2>
                    <div class="divider white"></div>
                </div>
                <?php include("use/body/swiper_amenidades.php") ?>
            </div>
        </section>
        <section id="villas" class="main-section tabs-villas-section">
            <div class="main-container">
                <div class="title-centered">
                    <h2 class="small">Encuentra la<br><span>villa ideal para ti</span></h2>
                    <div class="divider"></div>
                </div>
                <?php include("use/body/tabs_villas.php") ?>
            </div>
        </section>
        <section class="main-section gray tray-section">
            <div class="main-container">
                <div class="title-centered white">
                    <h2 class="small">Nuestro respaldo<br><span>Trayectoria y experiencia comprobada</span></h2>
                    <div class="divider white"></div>
                </div>
                <?php include("use/body/swiper_trayectoria.php") ?>
            </div>
        </section>
        <?php include("use/body/contact-cols.php") ?>
        <?php include('use/body/footer-cols.php') ?>
    </div>
    <?php include('use/body/body-pixels.php') ?>
</body>
</html>