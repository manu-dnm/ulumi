<?php

$openIcon = '';
$closeIcon = '';

$faqs = [
    (object)[
        'pregunta' => 'FAQ',
        'respuesta' => 'ANS'
    ],
    (object)[
        'pregunta' => 'FAQ',
        'respuesta' => 'ANS'
    ],
    (object)[
        'pregunta' => 'FAQ',
        'respuesta' => 'ANS'
    ],
    (object)[
        'pregunta' => 'FAQ',
        'respuesta' => 'ANS'
    ],
    (object)[
        'pregunta' => 'FAQ',
        'respuesta' => 'ANS'
    ],
    // Añadir más preguntas y respuestas si es necesario
];
?>

<div class="faqs">
    <?php foreach ($faqs as $faq): ?>
        <button class="faq">
            <div class="faq-head">
                <h3><?php echo htmlspecialchars($faq->pregunta); ?></h3>
                <span class="fas"><?php echo $openIcon; ?></span>
            </div>
            <div class="faq-answer">
                <p><?php echo htmlspecialchars($faq->respuesta); ?></p>
            </div>
        </button>
    <?php endforeach; ?>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const faqs = document.querySelectorAll('.faq');
        
        faqs.forEach(faq => {
            faq.addEventListener('click', () => {
                // Alternar la clase 'active'
                faq.classList.toggle('active');
                
                // Obtener el span y cambiar su contenido
                const span = faq.querySelector('span');
                if (faq.classList.contains('active')) {
                    span.textContent = '<?php echo $closeIcon ?>';
                } else {
                    span.textContent = '<?php echo $openIcon ?>';
                }
            });
        });
    });
</script>
