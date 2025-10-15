<?php
    include('use/brand_info.php');
    $PAGE_TITLE = $brand.' | Aviso de privacidad';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $PAGE_TITLE ?></title>
    <?php include('use/head/head.php') ?>
</head>
<body>
    <div id="root">
        <?php include('use/body/navbar.php') ?>
        <section class="main-section">
            <div class="main-container small privacy">
                <h2>Aviso de Privacidad</h2>
                <p>
                    <strong><?php echo $brand ?></strong>, es responsable del tratamiento de sus datos personales.
                </p>
                <p>
                    La información que recabamos será utilizada para brindarle los servicios y productos que solicite, dar seguimiento a sus solicitudes, mantener comunicación comercial y, en su caso, enviarle información promocional relacionada con nuestra oferta.
                </p>
                <p>
                    Los datos personales que recolectamos incluyen, de forma enunciativa mas no limitativa, nombre, correo electrónico, teléfono y cualquier otra información que usted nos proporcione voluntariamente.
                </p>
                <p>
                    Nos comprometemos a no transferir su información personal a terceros sin su consentimiento, salvo en los casos previstos por la ley.
                </p>
                <p>
                    Usted tiene derecho a acceder, rectificar y cancelar sus datos personales, así como a oponerse al tratamiento de los mismos o revocar el consentimiento que nos haya otorgado. Para ejercer estos derechos, puede contactarnos por los medios dispuestos en este sitio web.
                </p>
                <p><small>Fecha de última actualización: 05 de octubre de 2025</small></p>
            </div>
        </section>
        <?php include('use/body/footer-cols.php') ?>
    </div>
    <?php include('use/body/body-pixels.php') ?>
</body>
</html>