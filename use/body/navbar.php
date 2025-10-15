<?php

$logoNav = "/assets/logo.png";

$links = [
    ['name' => 'Inicio',
    'link' => '#inicio'],

    ['name' => 'Proyecto',
    'link' => '#proyecto'],

    ['name' => 'Amenidades',
    'link' => '#amenidades'],

    ['name' => 'Villas',
    'link' => '#villas'],

    ['name' => 'Contacto',
    'link' => '#contacto'],
];

?>
<nav>
    <div class="main-container">
        <a href="/" class="brand-logo">
            <img src="<?php echo $logoNav; ?>" alt="Logo de <?php echo $brand; ?>">
        </a>
        <div class="nav-menu">
            <div class="nav-links">
                <?php foreach ($links as $link): ?>
                    <a href="<?php echo $link['link']; ?>"><?php echo $link['name']; ?></a>
                <?php endforeach; ?>
            </div>
            <a class="main-button secondary-button" href="#contacto"><span><?php echo $CTA_NAME ?></span><i class="far"></i></a>
        </div>
        <button class="bars-button far"></button>
    </div>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", (event) => {
        const nav = document.querySelector('nav');
        const menuBtn = document.querySelector('.bars-button');
        menuBtn.addEventListener('click', () => {
            nav.classList.toggle('show-menu');
            if ( nav.classList.contains('show-menu') ) {
                menuBtn.innerHTML = '';
            } else {
                menuBtn.innerHTML = '';
            }
        });
        window.addEventListener('scroll', () => {
            if( window.scrollY > 100 ) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        })
    });
</script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    // 1. Seleccionar solo los enlaces que apuntan a anclas (#)
    const linksToTrack = document.querySelectorAll('.nav-links a[href^="#"]');

    // Si no hay enlaces que rastrear, no hacemos nada más
    if (linksToTrack.length === 0) {
        return;
    }
    
    // 2. Crear un array con las secciones correspondientes a esos enlaces
    const sectionsToTrack = Array.from(linksToTrack).map(link => {
        const id = link.getAttribute('href');
        return document.querySelector(id);
    }).filter(section => section !== null); // Filtra por si un enlace apunta a un id que no existe

    // 3. Función que se ejecutará en cada evento de scroll
    const setActiveLink = () => {
        let currentSectionId = '';
        const offset = 150; // Un margen para que el enlace se active un poco antes

        // 4. Encontrar la sección que está actualmente en la vista
        sectionsToTrack.forEach(section => {
            const sectionTop = section.offsetTop;
            if (window.scrollY >= sectionTop - offset) {
                currentSectionId = section.id;
            }
        });

        // 5. Actualizar la clase "active" en los enlaces
        linksToTrack.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === '#' + currentSectionId) {
                link.classList.add('active');
            }
        });
    };

    // 6. Añadir el listener para el evento 'scroll'
    window.addEventListener('scroll', setActiveLink);

    // 7. Ejecutar la función una vez al cargar la página
    setActiveLink();
});
</script>