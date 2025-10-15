<?php
    include('use/brand_info.php');
    $PAGE_TITLE = $brand.' | Muchas gracias';
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
        <section id="inicio" class="hero">
            <div class="main-container">
                <div class="hero-content">
                    <h1>Muchas gracias por escribirnos</h1>
                    <p>Pronto, uno de nuestros agentes se pondrá en contacto contigo.</p>
                </div>
            </div>
        </section>
        <?php include('use/body/footer-cols.php') ?>
    </div>
    <?php include('use/body/body-pixels.php') ?>
</body>
</html>