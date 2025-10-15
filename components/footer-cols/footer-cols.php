<?php 
    $footer_cols_img = $logoNav;
?>

<div class="footer-cols">
    <footer class="main-section">
        <div class="main-container footer-cols__cols">
            <div>
                <a href="/" class="footer-logo">
                    <img src="<?php echo $footer_cols_img; ?>" alt="">
                </a>
                <div class="social-links">
                    <?php foreach ($brandSocialMedia as $social): ?>
                        <a href="<?php echo $social['link'] ?>" target="_blank"><i class="fab"><?php echo $social['icon'] ?></i></a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="menus-wrapper">
                <div>
                    <h3>Sitemap</h3>
                    <div class="footer-cols-links-wrapper">
                        <?php foreach ($links as $link): ?>
                            <a href="<?php echo $link['link']; ?>"><span><?php echo $link['name']; ?></span></a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div>
                    <h3>Contacto</h3>
                    <div class="footer-cols-links-wrapper">
                        <a href="#"><i class="fas"></i><span>Phone</span></a>
                        <a href="#"><i class="fas"></i><span>Email</span></a>
                        <a href="#"><i class="fas"></i><span>Schedule</span></a>
                        <a href="#"><i class="fas"></i><span>Map marker</span></a>
                        <a href="#"><i class="fab"></i><span>Facebook</span></a>
                        <a href="#"><i class="fab"></i><span>Whatsapp</span></a>
                        <a href="#"><i class="fab"></i><span>Instagram</span></a>
                        <a href="#"><i class="fab"></i><span>Tiktok</span></a>
                        <a href="#"><i class="fab"></i><span>Linkedin</span></a>
                    </div>
                </div>
                <div>
                    <h3>Legal</h3>
                    <div class="footer-cols-links-wrapper">
                        <a href="/aviso-de-privacidad" target="_blank"><span>Aviso de privacidad</span></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="footer-cols-last-section">
        <p class="footer-text">© <?php echo date("Y")." ".$brand; ?> | Todos los derechos reservados. Sitio desarrollado por: <a href="https://dinametra.com" target="_blank">Dinametra</a></p>
    </div>
</div>