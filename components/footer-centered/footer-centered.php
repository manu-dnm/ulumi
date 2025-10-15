<?php
$logoFooter = $logoNav;
?>

<footer class="main-section footer-centered">
    <div class="main-container">
        <a class="logo-footer" href="/"><img src="<php echo $logoFooter ?>" alt=""></a>
        <div class="footer-links">
            <?php foreach ($links as $link): ?>
                <a href="<?php echo $link['link']; ?>"><?php echo $link['name']; ?></a>
            <?php endforeach; ?>
        </div>
        <div class="footer-social">
            <a class="fab" href="https://www.facebook.com/profile.php?id=61562908110434" target="_blank"></a>
            <a class="fab" href="https://www.instagram.com/carseco.mx/?hl=es-la" target="_blank"></a>
        </div>
        <p class="footer-text"><a target="_blank" href="/aviso-de-privacidad">Aviso de privacidad</a></p>
        <p class="footer-text">© 2025 Carseco | Derechos Reservados</p>
    </div>
</footer>