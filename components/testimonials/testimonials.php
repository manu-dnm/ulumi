<?php 
    $swiperName = 'swiperTestimonials';

    $testimonialSlides = [
        [
            'img' => 'user-1.png',
            'name' => 'Juan Pérez',
            'descripcion' => 'CEO de Empresa X',
            'testimonial' => 'Este producto ha transformado la manera en que trabajamos. ¡Altamente recomendado!'
        ],
        [
            'img' => 'user-2.png',
            'name' => 'María García',
            'descripcion' => 'Diseñadora UX',
            'testimonial' => 'La experiencia fue increíble. Muy intuitivo y fácil de usar.'
        ],
        [
            'img' => 'user-2.png',
            'name' => 'María García',
            'descripcion' => 'Diseñadora UX',
            'testimonial' => 'La experiencia fue increíble. Muy intuitivo y fácil de usar.'
        ],
        [
            'img' => 'user-2.png',
            'name' => 'María García',
            'descripcion' => 'Diseñadora UX',
            'testimonial' => 'La experiencia fue increíble. Muy intuitivo y fácil de usar.'
        ],
        [
            'img' => 'user-3.png',
            'name' => 'Carlos Ruiz',
            'descripcion' => 'Gerente de Proyecto',
            'testimonial' => 'El soporte fue excepcional y nos ayudó en todo momento.'
        ]
    ];
?>
<style>
    .swiper[swiper="<?php echo $swiperName; ?>"] .swiper-pagination {
        position: relative;
        bottom: unset;
        top: unset;
        left: unset;
        right: unset;
        margin-top: 2rem;
    }
    .swiper[swiper="<?php echo $swiperName; ?>"] .swiper-pagination-bullet-active {
        background-color: <?php echo $brandColor; ?> 
    }
</style>
<div class="swiper-container">
     <div class="swiper no-cut same-height" swiper="<?php echo $swiperName; ?>">
        <div class="swiper-wrapper">
            <?php foreach ($testimonialSlides as $slide): ?>
                <div class="swiper-slide">
                    <div class="testimonial-card">
                        <div class="user">
                            <img src="/assets/<?php echo $slide['img'] ?>" alt="">
                            <p class="user-name">
                                <span><?php echo htmlspecialchars($slide['name']); ?></span><br>
                                <?php echo htmlspecialchars($slide['descripcion']); ?>
                            </p>
                        </div>
                        <p class="testimonial-text">
                            <?php echo htmlspecialchars($slide['testimonial']); ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-pagination" swiper-pagination="<?php echo $swiperName ?>"></div>
    </div>
    <div class="swiper-btns show-mobile">
        <button class="swiper-btn fal" swiper-prev="<?php echo $swiperName ?>"></button>
        <button class="swiper-btn fal" swiper-next="<?php echo $swiperName ?>"></button>
    </div>
</div>

<script>
    new Swiper('[swiper="<?php echo $swiperName; ?>"]', {
        slidesPerView: 1.2,
        spaceBetween: 16,
        centeredSlides: true,
        initialSlide: 1,
        breakpoints: {
            1080: {
                slidesPerView: 3,
                spaceBetween: 32,
                centeredSlides: false,
                initialSlide: 0,
            }
        },
        navigation: {
            prevEl: '[swiper-prev="<?php echo $swiperName ?>"]',
            nextEl: '[swiper-next="<?php echo $swiperName ?>"]',
        },
        pagination: {
            el: '[swiper-pagination="<?php echo $swiperName ?>"]',
        },
    })
</script>